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
          <div class="bg-white p-2">
            {{$posts->appends(request()->input())->links('vendor.pagination.tailwind')}}
          </div>

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

  <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>

  <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-[500] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" onclick="hideBd()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this <span id="diswat"></span>?</h3>
                <button id="confirm-del" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button onclick="hideBd()" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
  </div>
  <div id="backdrop" class="w-screen h-screen fixed inset-0 z-[51] bg-gray-900 opacity-40 hidden"></div>

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
    $('#fortitle').html(query);
    $.ajax({
      url: '/forum-modal',
      type: 'POST',
      data:{ id: id },
      success:function(data){
        for (const d of data) {
          $('#tboy').append(createTableRow(d.id, d.users.image, d.users.name, d.users.email, d.comment, d.comment_date));
        }
        $('#TABLE-TOGGLE').click();
      }
    }); 
  }

  function createTableRow(id, img, name, email, comment, date){
    image = (img) ? `{{asset('storage/student/${img}')}}` : 'https://avatars.dicebear.com/api/initials/avatar.svg';
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
                <button class="font-medium text-red-600 hover:underline" onclick="confirmDel(${id}, 'comment')">Delete</button>
              </td>
            </tr>`;
    return tr;
  }
  function confirmDel(id, type){
    localStorage.setItem('log_id', id);
    document.querySelector('#diswat').innerText = type;
    document.querySelector('#popup-modal').classList.toggle('hidden');
    document.querySelector('#popup-modal').classList.toggle('flex');
    document.querySelector('#backdrop').classList.toggle('hidden');
    del = document.querySelector('#confirm-del');
    if(type == 'query'){
      del.addEventListener('click', deleteQry)
    } else {
      del.addEventListener('click', deleteCom)
    }
  }
  function hideBd(){
      document.querySelector('#backdrop').classList.toggle('hidden');
  }
  function deleteCom(){
    document.querySelector('#backdrop').classList.toggle('hidden');
    id = localStorage.getItem('log_id');
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
    console.log('delete Comment' +id)
  }
  function deleteQry(){
    document.querySelector('#backdrop').classList.toggle('hidden');
    id = localStorage.getItem('log_id');
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
    console.log('delete Query' + id)
  }
</script>

@include('partials.__admin_footer')