@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
    <div class="p-4 rounded-lg mt-14">
        <div class="flex justify-between w-full">
            <h2 class="text-4xl mb-5">About CSSP</h2>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg"  
          x-data="{ open: false, image:'', id: '', name: '', email: '', type: '', created_at: '', modal_type:'' }">
            <div class="flex gap-1">
              <div class="flex items-center justify-end px-2 py-2 bg-white border-b-2 w-full">
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
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Item ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Value
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($file->content as $row)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4">
                                <?php echo $row->itemid; ?>
                            </th>
                            <th scope="col" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img src="{{ url('images/'.$row->image) }}" class="w-10 h-10 rounded-full"  alt="">
                            </th>
                            <td scope="col" class="px-6 py-4"><div class="pl-3">
                                <div class="text-base font-semibold"><?php echo $row->value; ?></div>
                                <div class="font-normal text-gray-500"><?php echo $row->valuesecond; ?></div>
                            </td>
                            <td scope="col" class="px-6 py-4">
                                <a class="font-medium cursor-pointer text-blue-600 hover:underline">Edit</a>
                                <a class="hover:underline font-medium cursor-pointer text-md text-red-400">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('partials.__admin_footer')