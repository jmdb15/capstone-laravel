<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title}}</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>

  
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite(['resources/css/app.css','resources/js/app.js']) 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
</head>
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
  @include('partials.__sidenavbar')

  <div class="container mt-[70px] sm:ml-[160px]">
    <div class="row">
      <div class="col-11">
        <div class="col-md-11 offset-1 my-5">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  <x-createevent />
  </div>

  <x-popover />

  <div id="toast-cont" class="fixed top-20 right-[40%] z-20 h-fit items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow toast-container hidden" >
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal" id="toast"></div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
  </div>


  {{-- HIDDEN BUTTONS --}}
  <button id="toggler" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
  Toggle modal
</button>

  <script>
    function showSuccessToast(text) {
      var toastcont = document.getElementById('toast-cont');
      var toast = document.getElementById('toast');
      toast.innerHTML = text;
      toastcont.style.display = 'flex'; // Display the toast
      // Automatically hide the toast after a few seconds (adjust the timeout as needed)
      setTimeout(function() {
          toastcont.style.display = 'none'; // Hide the toast
      }, 3000); // 3000 milliseconds (3 seconds)
    }

    flatpickr('#startpicker', {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:S',
        // Additional options as needed
    });
    flatpickr('#endpicker', {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:S',
        // Additional options as needed
    });
    
    $(document).ready(function() {
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#create_event').submit(function(e){
        e.preventDefault();
        var action = e.originalEvent.submitter.value;
        var id = document.querySelector('#eventid').value;
        if(action === "delete"){ //DELETE
          $.ajax({
              url:"/calendar/action",
              type:"POST",
              data:{
                  id:id,
                  type:"delete"
              },
              success:function(response)
              {
                  calendar.fullCalendar('refetchEvents');
                  showSuccessToast("Event Deleted Successfully");
              }
          });
        }else{
          type = (action === 'create') ? 'add' : 'update'; //UPDATE OR ADD
          disid = (action === 'create') ? '' : id ;
          var formData = $(this).serialize();
          var data = new URLSearchParams(formData);
          var title = data.get('title');
          var desc = data.get('description');
          var start = data.get('start');
          var end = data.get('end');
          $.ajax({
            url:'/calendar/action',
            type:"POST",
            data: {
              id:disid,
              title:title,
              description: desc,
              start:start,
              end:end,
              type:type 
            },
            success:function(data){
              calendar.fullCalendar('refetchEvents');
              showSuccessToast((action === 'create') ? 'Event added.' : 'Event Updated.');
            }
          })
        }
      });

      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header:{
          left: 'prev,next today',
          center: 'title',
          right:'month,agendaWeek,agendaDay'
        },
        events:'/calendar', //This is the url to send request to
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay){
          observe();
          $('#toggler').click();
          $('#modaltype').html('Create an Event');
          $('#title').val('');
          $('#description').val('');
          $('#startpicker').val(cformatDate(start._d));
          $('#endpicker').val('');
          document.querySelector('#foredit').style.display = 'none';
          document.querySelector('#forcreate').style.display = 'block';
          document.querySelector('#title').focus();
          observe();
        },
        editable:true,
        eventResize: function(event, delta){ //DO SOMETHING WHEN EVENT-VIEW IS RESIZED FROM TODAY VIEW
          var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
          var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: '/calendar/action',
            type:'POST',
            data:{
              title:title,
              description: 'sample2',
              start:start,
              end:end,
              id:id,
              type:'update'
            },
            success:function(data){
              calendar.fullCalendar('refetchEvents');
            }
          });
        },
        eventDrop: function(event, delta){//DO SOMETHING WHEN EVENT-VIEW IS DRAGGED N DROPPED
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/calendar/action",
                type:"POST",
                data:{
                    title: title,
                    description: 'sample2',
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    showSuccessToast("Event Updated Successfully");
                }
            })
        },
        eventClick:function(event){//DO SOMETHING WHEN EVENT-VIEW IS CLICKED
          observe();
          $('#toggler').click();
          $('#modaltype').html('Edit Event');
          $('#eventid').val(event.id);
          $('#title').val(event.title);
          $('#description').val(event.description);
          $('#startpicker').val(cformatDate(event.start));
          $('#endpicker').val(cformatDate(event.end));
          document.querySelector('#forcreate').style.display = 'none';
          document.querySelector('#foredit').style.display = 'block';
          observe();
        },
        initialView: 'dayGridMonth',
        eventRender: function(event, element) { //RENDER SOMETHING TO EVERY EVENT-VIEW ELEMENT
          element.attr('data-popover-target', 'popover-default'); //set to show popover above element
          
          element.on('mouseenter', function(e) {
            document.getElementById('poptitle').innerHTML = event.title;
            document.getElementById('popdesc').innerHTML = event.description;
            document.getElementById('start').innerHTML = cformatDate(event.start);
            document.getElementById('end').innerHTML = cformatDate(event.end);
          }).on('mouseleave', function() {
            // simulateHover(customPopover, false);
          });
        },
      });
    });
    //SIMULATE HOVER ACTION
    function simulateHover(targetElement, b) {
      const mouseEnterEvent = new MouseEvent('mouseenter', {
        bubbles: true,
        cancelable: true,
        view: window
      });
      const mouseLeaveEvent = new MouseEvent('mouseleave', {
        bubbles: true,
        cancelable: true,
        view: window
      });
      if(b)
        targetElement.dispatchEvent(mouseEnterEvent);
      else
        targetElement.dispatchEvent(mouseLeaveEvent);
    }
    // GET PROPER DATE
    function cformatDate(inputDate){
      const date = new Date(inputDate);

      const year = date.getFullYear();
      const month = (date.getMonth() + 1).toString().padStart(2, '0');
      const day = date.getDate().toString().padStart(2, '0');
      const hours = date.getHours().toString().padStart(2, '0');
      const minutes = date.getMinutes().toString().padStart(2, '0');
      const seconds = date.getSeconds().toString().padStart(2, '0');

      const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
      return formattedDate;
    }
    function yes(e){
      e.preventDefault();
      console.log("clicked");
    }
    function observe(){
      if(document.querySelector('#title').value !== '' &&
         document.querySelector('#description').value !== '' &&
         document.querySelector('#startpicker').value !== '' &&
         document.querySelector('#endpicker').value !== ''){
        document.querySelector('#forcreate').removeAttribute('disabled');
        document.querySelector('#forupdate').removeAttribute('disabled');
      }else{
        document.querySelector('#forcreate').setAttribute('disabled', 'disabled');
        document.querySelector('#forupdate').setAttribute('disabled', 'disabled');
      }
    }
    
  </script>

@include('partials.__admin_footer')