@include('partials.__header')
<body class="bg-gray-200 dark:bg-slate-700" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

{{-- Main/Middle Section --}}
<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14 dark:bg-slate-600">

      
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            
          <x-report_table :reports="$reports" />
          <x-edit_report />

  </div>
</div>

<button id="show-modal-btn" class="hidden" data-modal-target="editUserModal" data-modal-show="editUserModal">Hidden button</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
<script>
  let reportId = '';

  function setReportId(id){
    let stat = document.getElementById('p-'+id).innerHTML;
    stat = (stat == 'Took Action') ? stat : 'Read';
    document.getElementById('greenc-'+id).classList.toggle('bg-green-500')
    reportId = id;
    $.ajax({
      url: '/reports',
      type: 'GET',
      data: {
        id : reportId
      },
      success: function (data) {
        document.getElementById('sender-name').innerHTML = data.report.sender.name;
        document.getElementById('sender-email').innerHTML = data.report.sender.email;
        document.getElementById('sender-image').src = data.report.sender.image && `{{asset('storage/student/thumbnail/${data.report.sender.image}')}}` || 'https://avatars.dicebear.com/api/initials/avatar.svg';
        document.getElementById('offender-image').src = data.report.users.image && `{{asset('storage/student/thumbnail/${data.report.users.image}')}}` || 'https://avatars.dicebear.com/api/initials/avatar.svg';
        document.getElementById('offender-name').innerHTML = data.report.users.name;
        document.getElementById('offender-email').innerHTML = data.report.users.email;
        document.getElementById('report-content').innerHTML = `This content includes <strong><em>${data.report.content}</em></strong>.`;
        if(data.report.queries_id){
          document.getElementById('rep-content-text').innerHTML = data.content.query;
          document.getElementById('rep-content-img').classList.remove('hidden');
          document.getElementById('rep-content-img').src = `{{asset('storage/student/questions/${data.content.image}')}}`;
          document.getElementById('take-action').addEventListener('click', function(){
            takeAction(data.report.queries_id, 'query');
          })
        }else{
          document.getElementById('rep-content-text').innerHTML = data.content.comment;
          document.getElementById('rep-content-img').classList.add('hidden');
          document.getElementById('take-action').addEventListener('click', function(){
            takeAction(data.report.comments_id, 'comment');
          })
        }
        document.querySelector('#show-modal-btn').click();
      },error: function(e){
        alert('The content was already deleted therefore cant be found.')
      }
    });
  }

  function takeAction(id, type){
    $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    console.log(type, id);
    $.ajax({
      url: '/take-action',
      type: 'POST',
      data: {
        reportId : reportId,
        id : id,
        type : type
      },
      success: function (data) {
        console.log(data.code);
        console.log(data.message);
      }
    });
  }

  function deleteReport(id){
    $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
      url: '/reports',
      type: 'GET',
      data: {
        id : id,
        type: 'delete'
      },
      success: function (data) {
        document.getElementById('tr-'+id).remove();
        console.log(data);
      }
    });
  }
</script>
@include('partials.__admin_footer')