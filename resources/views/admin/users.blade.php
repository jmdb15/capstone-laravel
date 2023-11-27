@include('partials.__header')
<body class="bg-gray-200 dark:bg-slate-700" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14">
    <div class="flex justify-between w-full">
        <h2 class="text-4xl mb-5">Users</h2>
        <div class="w-56 flex justify-between">
            <form action="export-users" method="GET">
                <button type="submit" class="flex justify-between items-center gap-x-2 py-2 px-4 rounded-md bg-slate-400 cursor-pointer hover:brightness-105">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M3 14.25C3.41421 14.25 3.75 14.5858 3.75 15C3.75 16.4354 3.75159 17.4365 3.85315 18.1919C3.9518 18.9257 4.13225 19.3142 4.40901 19.591C4.68577 19.8678 5.07435 20.0482 5.80812 20.1469C6.56347 20.2484 7.56459 20.25 9 20.25H15C16.4354 20.25 17.4365 20.2484 18.1919 20.1469C18.9257 20.0482 19.3142 19.8678 19.591 19.591C19.8678 19.3142 20.0482 18.9257 20.1469 18.1919C20.2484 17.4365 20.25 16.4354 20.25 15C20.25 14.5858 20.5858 14.25 21 14.25C21.4142 14.25 21.75 14.5858 21.75 15V15.0549C21.75 16.4225 21.75 17.5248 21.6335 18.3918C21.5125 19.2919 21.2536 20.0497 20.6517 20.6516C20.0497 21.2536 19.2919 21.5125 18.3918 21.6335C17.5248 21.75 16.4225 21.75 15.0549 21.75H8.94513C7.57754 21.75 6.47522 21.75 5.60825 21.6335C4.70814 21.5125 3.95027 21.2536 3.34835 20.6517C2.74643 20.0497 2.48754 19.2919 2.36652 18.3918C2.24996 17.5248 2.24998 16.4225 2.25 15.0549C2.25 15.0366 2.25 15.0183 2.25 15C2.25 14.5858 2.58579 14.25 3 14.25Z" fill="#1C274C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.75C12.2106 16.75 12.4114 16.6615 12.5535 16.5061L16.5535 12.1311C16.833 11.8254 16.8118 11.351 16.5061 11.0715C16.2004 10.792 15.726 10.8132 15.4465 11.1189L12.75 14.0682V3C12.75 2.58579 12.4142 2.25 12 2.25C11.5858 2.25 11.25 2.58579 11.25 3V14.0682L8.55353 11.1189C8.27403 10.8132 7.79963 10.792 7.49393 11.0715C7.18823 11.351 7.16698 11.8254 7.44648 12.1311L11.4465 16.5061C11.5886 16.6615 11.7894 16.75 12 16.75Z" fill="#1C274C"/>
                </svg> Excel</button>
            </form>
            <form action="export-users-pdf" method="GET">
                <button type="submit" class="flex justify-between items-center gap-x-2 py-2 px-4 rounded-md bg-slate-400 cursor-pointer hover:brightness-105">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M3 14.25C3.41421 14.25 3.75 14.5858 3.75 15C3.75 16.4354 3.75159 17.4365 3.85315 18.1919C3.9518 18.9257 4.13225 19.3142 4.40901 19.591C4.68577 19.8678 5.07435 20.0482 5.80812 20.1469C6.56347 20.2484 7.56459 20.25 9 20.25H15C16.4354 20.25 17.4365 20.2484 18.1919 20.1469C18.9257 20.0482 19.3142 19.8678 19.591 19.591C19.8678 19.3142 20.0482 18.9257 20.1469 18.1919C20.2484 17.4365 20.25 16.4354 20.25 15C20.25 14.5858 20.5858 14.25 21 14.25C21.4142 14.25 21.75 14.5858 21.75 15V15.0549C21.75 16.4225 21.75 17.5248 21.6335 18.3918C21.5125 19.2919 21.2536 20.0497 20.6517 20.6516C20.0497 21.2536 19.2919 21.5125 18.3918 21.6335C17.5248 21.75 16.4225 21.75 15.0549 21.75H8.94513C7.57754 21.75 6.47522 21.75 5.60825 21.6335C4.70814 21.5125 3.95027 21.2536 3.34835 20.6517C2.74643 20.0497 2.48754 19.2919 2.36652 18.3918C2.24996 17.5248 2.24998 16.4225 2.25 15.0549C2.25 15.0366 2.25 15.0183 2.25 15C2.25 14.5858 2.58579 14.25 3 14.25Z" fill="#1C274C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.75C12.2106 16.75 12.4114 16.6615 12.5535 16.5061L16.5535 12.1311C16.833 11.8254 16.8118 11.351 16.5061 11.0715C16.2004 10.792 15.726 10.8132 15.4465 11.1189L12.75 14.0682V3C12.75 2.58579 12.4142 2.25 12 2.25C11.5858 2.25 11.25 2.58579 11.25 3V14.0682L8.55353 11.1189C8.27403 10.8132 7.79963 10.792 7.49393 11.0715C7.18823 11.351 7.16698 11.8254 7.44648 12.1311L11.4465 16.5061C11.5886 16.6615 11.7894 16.75 12 16.75Z" fill="#1C274C"/>
                </svg> PDF</button>
            </form>
        </div>
    </div>

     <div class="relative overflow-x-auto shadow-md sm:rounded-lg"  
      x-data="{ open: false, image:'', id: '', name: '', email: '', type: '', created_at: '', modal_type:'' }">
      <form action="/users" method="GET" id="filter-del-user">
          @csrf
        <div class="flex items-center justify-between px-2 py-2 bg-white border-b-2">
            <div>
                <h4 class="ml-2 text-xl">Students</h4>
            </div>
            <label for="table-search-users" class="sr-only">Search</label>
            <div class="flex gap-4">
                <button id="dropdownRadioButton-type" data-dropdown-toggle="dropdownRadio-type" class="inline-flex py-2 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3" type="button">
                    <span id="filter" class="text-sm">{{($type=='student') ? 'Students':'Organizations'}}</span>
                    <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu for USER TYPE-->
                <div id="dropdownRadio-type" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton-type">
                        <li class="cursor-pointer">
                            <div class="flex items-center cursor-pointer p-2 rounded hover:bg-gray-100">
                                <input {{($type=='student') ? 'checked':''}} id="filter-radio-example-1" type="radio" value="student" name="usertype" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="filter-radio-example-1" class="w-full ml-2 text-sm font-medium text-gray-900 rounded cursor-pointer">Students</label>
                            </div>
                        </li>
                        <li class="cursor-pointer">
                            <div class="flex items-center cursor-pointer p-2 rounded hover:bg-gray-100">
                                <input {{($type=='organization') ? 'checked':''}} id="filter-radio-example-2" type="radio" value="organization" name="usertype" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="filter-radio-example-2" class="w-full ml-2 text-sm font-medium text-gray-900 rounded cursor-pointer">Organizations</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <button id="dropdownRadioButton-verified" data-dropdown-toggle="dropdownRadio-verified" class="inline-flex py-2 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3" type="button">
                    <span id="filter" class="text-sm">{{($ver=='verified') ? 'Verified':'Unverified'}}</span>
                    <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu for VERIFIED ACCOUNTS-->
                <div id="dropdownRadio-verified" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton-verified">
                        <li class="cursor-pointer">
                            <div class="flex items-center cursor-pointer p-2 rounded hover:bg-gray-100">
                                <input {{($ver=='verified') ? 'checked':''}} id="filter-radio-verified" type="radio" value="verified" name="is_verified" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="filter-radio-verified" class="w-full ml-2 text-sm font-medium text-gray-900 rounded cursor-pointer">Verified</label>
                            </div>
                        </li>
                        <li class="cursor-pointer">
                            <div class="flex items-center cursor-pointer p-2 rounded hover:bg-gray-100">
                                <input {{($ver=='unverified') ? 'checked':''}} id="filter-radio-unverified" type="radio" value="unverified" name="is_verified" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="filter-radio-unverified" class="w-full ml-2 text-sm font-medium text-gray-900 rounded cursor-pointer">Unverified</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" value="{{$s}}" id="table-search-users" name="filtertext" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                </div>
                <button type="submit" name="search" class=" hover:scale-105">
                    <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        {{-- <rect width="24" height="24" fill="white"/> --}}
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" fill="#323232"/>
                    </svg>
                </button>
                <button type="submit" name="delete" id="delete-all" class="hidden">Delete</button> 
                <button type="button"  class="-ml-2 hover:underline text-red-500 hover:text-red-600 mx-2" onclick="confirmDelAll()">Delete All</button>
            </div>
        </div>
    </form>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Account Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Badge
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <x-tr :user="$user" />
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th colspan="4" class="text-center px-6 py-4 text-gray-900">
                            No accounts matched
                        </th>
                    </tr>
                @endforelse
            </tbody>
          </table>
          <div class="bg-white p-2">
                {{$users->appends(request()->input())->links('vendor.pagination.tailwind')}}
          </div>
          <x-orig_modal />
     </div>
  </div>
</div>

<x-messages />
<button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="absolute left-72 hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" id="h3-modal"></h3>
                <button id="confirmDeleteAll" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" onclick="deleteAll()">
                    Yes, Delete All
                </button>
                <button id="confirmDelete" data-modal-hide="popup-modal" type="button" class=" text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" onclick="deleteOnlyUser()">
                    Yes, I'm sure
                </button>
                <button onclick="hideBd()" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
  </div>
  <div id="backdrop" class="w-screen h-screen fixed inset-0 z-[51] bg-gray-900 opacity-40 hidden"></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script defer>
    function handleImageError(elem){
        elem.src = 'https://avatars.dicebear.com/api/initials/avatar.svg';
    }
    function deleteAll(){
        document.querySelector('#delete-all').click();
    }
    function confirmDelAll(){
        document.querySelector('#confirmDeleteAll').style.display = 'inline';
        document.querySelector('#confirmDelete').style.display = 'none';
        document.querySelector('#h3-modal').innerText = "Are you certain that you wish to delete all of these users?";
        document.querySelector('#popup-modal').classList.toggle('hidden');
        document.querySelector('#popup-modal').classList.toggle('flex');
        document.querySelector('#backdrop').classList.toggle('hidden');
    };
    function confirmDel(id){
        localStorage.setItem('id',id);
        document.querySelector('#confirmDeleteAll').style.display = 'none';
        document.querySelector('#confirmDelete').style.display = 'inline';
        document.querySelector('#h3-modal').innerText = 'Are you sure you want to delete this user?';
        document.querySelector('#popup-modal').classList.toggle('hidden');
        document.querySelector('#popup-modal').classList.toggle('flex');
        document.querySelector('#backdrop').classList.toggle('hidden');
    };
    function hideBd(){
      document.querySelector('#backdrop').classList.toggle('hidden');
    }
    function deleteOnlyUser(){
        let id = localStorage.getItem('id');
        document.querySelector('#backdrop').classList.toggle('hidden');
        $.ajax({
            url:'/users',
            type:'GET',
            data:{id:id},
            success:function(data){
                console.log(data)
                document.querySelector('#tr-'+id).classList.toggle('hidden');
            }
        })
    }
</script>
@include('partials.__admin_footer')