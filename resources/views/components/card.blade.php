@php    use Carbon\Carbon; use Illuminate\Support\Facades\DB;
        $date = Carbon::parse($post->created_at);
        $date = $date->format('l, F j, Y g:i A');
@endphp

<div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow relative">
  <div class="p-5 pb-2">
    <div class="flex relative">
        <img src="{{ url('images/cssp.png') }}" class="aspect-square max-h-10 mr-2" alt="">
        <div class="flex flex-col">
            <h5 class="-mt-1 text-2xl font-bold tracking-tight text-gray-900">CSSP Admin</h5>
            <p class="text-[#acaeb4] text-[.8rem] -mt-1">{{$date}}</p>
        </div>
    </div>
    <p class="ml-5 mt-3 font-normal text-black">{{$post->caption}}</p>
  </div>  
  <div class="flex justify-end px-4">
      <button id="dropdownButton" data-dropdown-toggle="dropdown{{$post->id}}" class="absolute top-4 right-4 inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
          <span class="sr-only">Open dropdown</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
          </svg>
      </button>
      <!-- Dropdown menu -->
      <div id="dropdown{{$post->id}}" class="z-40 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
          <ul class="py-2" aria-labelledby="dropdownButton">
            <li id="copylinkbtn{{$post->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                onclick="copylink('{{$post->id}}')">
                Copy link
            </li>
          </ul>
      </div>
    </div>
    <div class="mt-3">
        @if ($post->links != null)
            <x-carousel :post="$post" />
        @endif
    </div>
</div>