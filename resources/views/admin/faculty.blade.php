@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
    <div class="p-4 rounded-lg mt-14">
        <div class="flex justify-between w-full">
            <h2 class="text-4xl mb-5">Faculty and Staff</h2>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg"  
          x-data="{ open: false, image:'', id: '', name: '', email: '', type: '', created_at: '', modal_type:'' }">
            <div class="flex gap-1">
                <div class="flex items-center justify-between px-2 py-2 bg-white border-b-2 w-full">
                  <div class="flex gap-x-4">
                      <button id="add-content" class="bg-blue-600 text-gray-100 rounded-md py-2 px-6 hover:brightness-110" data-modal-target="add-faculty-modal" data-modal-toggle="add-faculty-modal">Add</button>                
                  </div>
                  <div class="flex gap-x-2">
                      <div class="relative">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                              </svg>
                          </div>
                          <input type="text" value="" id="table-search-users" name="filtertext" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                      </div>
                      <button type="submit" name="search" class=" hover:scale-105">
                          <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              {{-- <rect width="24" height="24" fill="white"/> --}}
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" fill="#323232"/>
                          </svg>
                      </button>
                  </div>
              </div>
            </div>  
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($file->official as $row)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full" src="{{ strpos($row->image, 'http') !== false ? $row->image : asset('storage/faculty/'.$row->image) }}" alt="">  
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{$row->name}}</div>
                                <div class="font-normal text-gray-500">{{$row->email}}</div>
                            </th>
                            <td scope="col" class="px-6 py-4">
                                {{$row->position}}
                            </td>
                            <td scope="col" class="px-6 py-4">
                                {{$row->department}}
                            </td>
                            <td scope="col" class="px-6 py-4">
                                
                            </td>
                            <td scope="col" class="px-6 py-4">
                                <a class="hover:underline font-medium cursor-pointer text-blue-600" data-modal-target="edit-faculty-modal" data-modal-toggle="edit-faculty-modal" 
                                onclick="editFaculty('{{$row->name}}','{{$row->email}}','{{$row->position}}','{{$row->department}}', '{{$row->status}}')">Edit</a>
                                <a class="hover:underline font-medium cursor-pointer text-md text-red-400" onclick="deleteFaculty('{{$row->name}}')" data-modal-target="confirmation-modal" data-modal-toggle="confirmation-modal">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-white p-2">
                
            </div>
        </div>
    </div>
</div>


<div id="confirmation-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="confirmation-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this faculty?</h3>
                <button onclick="submitDelete()" data-modal-hide="confirmation-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="confirmation-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>


<form action="/delete-faculty" method="POST" id="delete-form" class="hidden">
    @csrf
    <input type="text" id="delete-name" name="fullname">
</form>

<script>
    function deleteFaculty(name){
        document.querySelector('#delete-name').value = name;
    }
    function submitDelete(){
        document.querySelector('#delete-form').submit();
    }
    function editFaculty(name, email, pos, dep, stat){
        document.querySelector('#edit-fullname').value = name;
        document.querySelector('#edit-email').value = email;
        document.querySelector('#edit-position').value = pos;
        document.querySelector('#edit-department').value = dep;
        document.querySelector('#edit-status').value = stat;
    }
    function queryUpload(type, elem){
      let imgArea = document.querySelector('#img_upload_area_'+type);
      const image = elem.files[0]
      if(image){
        imgArea.classList.remove('hidden');
        const reader = new FileReader();
        reader.onload = ()=> {
            const imgUrl = reader.result;
            imgArea.src = imgUrl;
        }
        reader.readAsDataURL(image)
      }else{
        imgArea.classList.add('hidden');
      }
    }
</script>
<x-messages />
<x-cms_editmodal />
<x-cms_addmodal />
@include('partials.__admin_footer')