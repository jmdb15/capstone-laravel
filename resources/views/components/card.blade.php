@php    use Carbon\Carbon; use Illuminate\Support\Facades\DB;
        $date = Carbon::parse($post->created_at);
        $date = $date->format('l, F j, Y g:i A');
@endphp

<div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
  <div class="p-5 pb-2">
    <div class="flex relative">
        <img src="{{ url('images/Untitled-1.ico') }}" class="aspect-square max-h-10 mr-2" alt="">
        <div class="flex flex-col">
            <h5 class="-mt-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">CSSP Admin</h5>
            <p class="text-[#acaeb4] text-[.8rem] -mt-1">{{$date}}</p>
        </div>
    </div>
    <p class="ml-5 mt-3 font-normal text-black dark:text-gray-400">{{$post->caption}}</p>
    {{-- <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Read more
          <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a> --}}
  </div>  
  <div class="flex justify-end px-4">
      <button id="dropdownButton" data-dropdown-toggle="dropdown{{$post->id}}" class="absolute top-4 right-4 inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
          <span class="sr-only">Open dropdown</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
          </svg>
      </button>
      <!-- Dropdown menu -->
      <div id="dropdown{{$post->id}}" class="z-40 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2" aria-labelledby="dropdownButton">
            <li id="copylinkbtn{{$post->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" 
                onclick="copylink({{$post->id}})">
                Copy link
            </li>
            {{-- <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
            </li> --}}
          </ul>
      </div>
    </div>
    <div class="mt-3">
        @if ($post->links != null)
            <x-carousel :post="$post" />
        @endif
    </div>
</div>