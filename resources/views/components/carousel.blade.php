
  @php $links = explode('|', $post->links); @endphp
  <!-- Image wrapper -->
  @if (count($links) == 1)
      <figure class="max-w-lg grid place-items-center">
        <img class="h-auto max-w-full rounded-lg" src="{{url('storage/posts/'.$links[0])}}" alt="image description" onclick="openModal(this)">
        <figcaption class="mt-2 text-sm text-center text-white">{{$post->caption}}</figcaption>
      </figure>
  @else
    <div id="animation-carousel" class="relative w-full" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
          @foreach ($links as $img)
            <x-carouselitem :link="$img" />
          @endforeach
      </div>
    <!-- Slider indicators -->
      <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-6 left-1/2">
        @foreach ($links as $img)
          <button type="button" class="w-3 h-3 rounded-full bg-gray-500" aria-current="false" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration }}"></button>
        @endforeach
      </div>
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-400 group-hover:bg-gray-200 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
              <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
              </svg>
              <span class="sr-only">Previous</span>
          </span>
      </button>
      <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-400 group-hover:bg-gray-200 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
              <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="sr-only">Next</span>
          </span>
      </button>
    </div>
  @endif
