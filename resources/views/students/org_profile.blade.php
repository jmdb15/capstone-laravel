@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])
@php
  $def = 'https://avatars.dicebear.com/api/initials/avatar.svg';
@endphp

{{-- Personal Details --}}
    <div class="flex flex-col bg-gray-50 min-h-64 h-[440px] w-[96%] md:h-96 rounded-md ">
      <img src="{{url('images/cssp_white.png')}}" class="object-cover w-full overflow-y-hidden h-[40%] md:h-[60%]" alt="">
      <div class="flex flex-col relative h-[40%] md:flex-row pt-4">
        {{-- left side --}}
        <div class="relative basis-1/4 md:basis-1/3 flex flex-col justify-center items-center">
          <img src="{{ ($user->image) ? asset('storage/student/thumbnail/'.$user->image) : $def }}" class="-mt-24 w-[23%] md:w-[60%] lg:w-[45%] md:-mt-36 rounded-full aspect-square" alt="Dp">
        </div>
        {{-- middle part --}}
        <div class="relative mt-3 pb-4 md:mt-0 md:pb-0 flex text-center flex-col lg:basis-2/3 xl:1/2 md:text-start md:basis-2/3 ">
          <div class="flex items-center gap-x-10 justify-center md:justify-normal">
            <h2 class="text-3xl font-medium flex">
              {{$user->name}}
            </h2>
            
          </div>
          <p class="text-md text-gray-500">{{$user->email}}</p>
        </div>
        </div>
      </div>
    </div>

      <div class="flex flex-col gap-3 mt-4 mx-2">
        @forelse ($posts as $post)
          <x-card :post="$post" />
        @empty
          <h1 class="mx-auto text-2xl text-center text-gray-800 mt-6 mb-10 ">The organization has not posted anything yet.</h1>
        @endforelse
      </div>

  {{-- View Image Modal --}}
<div id="imageModal" class="modal">
  <span id="viewImageCloseButton">&times;</span>
  <img class="modal-content" id="modalImage" src="" alt="Image" />
</div>
<x-messages />
  
@include('partials.__notifications', ['notifs' => $notifs])
<script>
  function openModal(imageSrc) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("modalImage");
    modalImg.src = imageSrc.src;
    modal.style.display = "grid";
    document.getElementById("viewImageCloseButton").onclick = function() {
      modal.style.display = "none";
    }
  }
  
  function hideBd(){
    document.querySelector('#backdrop').classList.toggle('hidden');
  }
</script>
@include('partials.__footer')