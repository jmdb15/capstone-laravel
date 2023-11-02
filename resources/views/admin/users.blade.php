@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14">
    <h2 class="text-4xl mb-5">Users</h2>

     <div class="relative overflow-x-auto shadow-md sm:rounded-lg"  
      x-data="{ open: false, image:'', id: '', name: '', email: '', type: '', created_at: '', modal_type:'' }">
      <form action="/users" method="GET">
          @csrf
        <div class="flex items-center justify-between px-2 py-2 bg-white border-b-2">
            <div>
                <h4 class="ml-2 text-xl">Students</h4>
            </div>
            <label for="table-search-users" class="sr-only">Search</label>
            <div class="flex gap-4">
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex py-2 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3" type="button">
                    <span id="filter" class="text-sm">{{($type=='student') ? 'Students':'Organizations'}}</span>
                    <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
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
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" value="{{$s}}" id="table-search-users" name="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                </div>
                <button type="submit" class="mr-2 hover:scale-105">
                    <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        {{-- <rect width="24" height="24" fill="white"/> --}}
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" fill="#323232"/>
                    </svg>
                </button>
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
                            No accounts yet
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

@include('partials.__admin_footer')