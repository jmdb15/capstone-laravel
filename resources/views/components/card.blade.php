@php    use Carbon\Carbon; use Illuminate\Support\Facades\DB;
        $date = Carbon::parse($post->created_at);
        $date = $date->format('l, F j, Y g:i A');
        $image = ($post->users->type == 'organization') ? "http://127.0.0.1:8000/storage/student/" .$post->users->image : "http://127.0.0.1:8000/images/cssp.png";
        $author = ($post->users->type == 'admin') ? 'CSSP Admin' : $post->users->name;
@endphp

<div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow relative">
  <div class="p-5 pb-2">
    <div class="flex relative">
        <img src="{{$image}}" class="aspect-square rounded-full max-h-10 mr-2" alt="">
        <div class="flex flex-col">
            <h5 class="-mt-1 text-2xl font-bold tracking-tight text-gray-900">{{$author}}</h5>
            <p class="text-[#acaeb4] text-[.8rem] -mt-1">{{$date}} </p>
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
                <svg class="inline mr-1.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16"> 
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> 
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> 
                </svg>
                Copy link
            </li>
            {{-- <li id="report-{{$post->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100" >
                <svg class="inline fill-current group-hover:text-red-600 mr-1" fill="#ccc" width="20px" height="20px" viewBox="205 205 612 612" xmlns="http://www.w3.org/2000/svg"><path d="M512 768a256 256 0 1 1 0-512 256 256 0 0 1 0 512zm-27-168c-8 7-11 16-11 27s3 20 11 27c7 8 16 11 27 11s20-3 28-11c8-7 11-16 11-27s-3-20-11-27c-8-8-17-11-28-11s-20 4-27 11zm50-47l15-195h-76l15 195h46z"/></svg>
                Report
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

