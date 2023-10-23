@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

{{-- Main/Middle Section --}}

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg"  
        x-data="{ open: false, image:'', id: '', name: '', email: '', type: '', created_at: '', modal_type:'' }">
        <div class="flex items-center justify-between px-2 py-2 bg-white border-b-2">
          <h4 class="ml-2 text-xl">Student Queries</h4>
        </div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Query Content
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <x-forum_tr :post="$post" />
              @endforeach
            </tbody>
          </table>
          <button 
  id="TABLE-TOGGLE"
  data-modal-target="table-modal"
  data-modal-toggle="table-modal"
  class="hidden w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Small modal
  </button>
          {{-- <div class="bg-white p-2">
            {{$users->links('vendor.pagination.tailwind')}}
          </div> --}}
    </div>
    
  </div>
</div>
</section>

<x-forum_table_modal />
<x-messages />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
  function callForTable(id, query){
    $('#tboy').empty();
    $('#TABLE-TOGGLE').click();
    $('#fortitle').html(query);
    $.ajax({
      url: '/forum-modal',
      type: 'POST',
      data:{ id: id },
      success:function(data){
        for (const d of data) {
          $('#tboy').append(createTableRow(d.id, d.users.image, d.users.name, d.users.email, d.comment, d.comment_date));
        }
      }
    }); 
  }

  function createTableRow(id, img, name, email, comment, date){
    image = (img) ? img : 'https://avatars.dicebear.com/api/initials/' + name + '.svg';
    tr =  `<tr id="tr${id}" class="bg-white border-b hover:bg-gray-50">
              <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                  <img class="w-10 h-10 rounded-full" 
                    src="${image}"
                    alt="${name}'s image">
                  <div class="pl-3">
                      <div class="text-base font-semibold">${name}</div>
                      <div class="font-normal text-gray-500">${email}</div>
                  </div>  
              </th>
              <td class="px-6 py-4 w-[384px] max-w-lg">
                <strong>${comment}</strong>
              </td>
              <td class="px-6 py-4">
                  ${date}
              </td>
              <td class="px-6 py-4">
                <!-- <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                <span class="text-gray-400 text-md">|</span> -->
                <button class="font-medium text-red-600 hover:underline" onclick="deleteCom(${id})">Delete</button>
              </td>
            </tr>`;
    return tr;
  }

  function deleteCom(id){
    $.ajax({  
      url: '/forum-modal',
      type: 'POST',
      data:{ id: id,
      type: 'delete'},
      success:function(data){
        document.querySelector(`#tr${id}`).style.display = 'none';
        console.log(data)
      }
    });
  }
  function deleteQry(id){
    $.ajax({  
      url: '/create-post/action',
      type: 'POST',
      data:{ id: id,
      for: 'query'},
      success:function(data){
        document.querySelector(`#ptr${id}`).style.display = 'none';
        console.log(data)
      }
    });
  }
</script>

@include('partials.__admin_footer')