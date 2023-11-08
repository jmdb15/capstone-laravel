@include('partials.__header')
@vite(['resources/css/post.css'])
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])

  @auth
    @if(auth()->user()->type == 'organization')
      <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 w-full mb-10">
          <img src="{{url('images/cssp.png')}}" alt="CSSP logo" class="h-10 w-10">
          @error('image')
            <p class="text-red-500 text-sm mt-2 text-center mb-0">{{ $message }}</p>
          @enderror
          <input data-modal-target="create-post-modal" data-modal-toggle="create-post-modal" type="text" id="chat" class="hover:bg-gray-100 cursor-pointer block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Create post" />
      </div>
    @endif
  @endauth
  
  <div class="flex flex-col gap-3 mx-2">
    @foreach ($posts as $post)
      <x-card :post="$post" />
    @endforeach
  </div>
 

  <x-toast />

{{-- View Image Modal --}}
<div id="imageModal" class="modal">
  <span id="viewImageCloseButton">&times;</span>
  <img class="modal-content" id="modalImage" src="" alt="Image" />
</div>

<x-messages />

@include('partials.__notifications', ['notifs' => $notifs])
@auth
  @if(auth()->user()->type == 'organization')
    <x-createpost_modal />  
  @endif
@endauth
<script defer>
  function openModal(imageSrc) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("modalImage");
    modalImg.src = imageSrc.src;
    modal.style.display = "grid";
    document.getElementById("viewImageCloseButton").onclick = function() {
      modal.style.display = "none";
    }
  }
  function copylink(v) {
    const textArea = document.createElement("textarea");
    cpylinkbtn = document.querySelector('#copylinkbtn' + v);
    textArea.value = '127.0.0.1:8000/post/' + v;
    document.body.appendChild(textArea);
    textArea.select();
    try {
      document.execCommand("copy");
    } catch (err) {
      console.error("Unable to copy to clipboard:", err);
    } finally {
      document.body.removeChild(textArea);
      cpylinkbtn.innerHTML = `<span> <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/> <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> </svg> 
                                  Copied</span>`;
    }
    setTimeout(() => {
      cpylinkbtn.innerText = 'Copy link';
    }, 2000);
  }
  function hideBd(){
      document.querySelector('#backdrop').classList.toggle('hidden');
  }
  // Function to allow dropping in the drop zone
  function allowDrop(event) {
      event.preventDefault();
  }
  function allowPost(){
    const capt = document.querySelector('#caption').value;
    if(capt !== ''){
      document.querySelector('#create-post-btn').removeAttribute('disabled');
    }else{
      document.querySelector('#create-post-btn').setAttribute('disabled', 'disabled');
    }
  }
  // Function to handle the drop event
  function handleDrop(event) {
      event.preventDefault();
      const input = document.getElementById("dropzone-file");
      const imageContainer = document.getElementById("putsomething");
      
      imageContainer.innerHTML = '';
      const files = event.dataTransfer.files;
      let allDivs = '';
      for (let i = 0; i < files.length; i++) {
          const file = files[i];
          const div = `<div class="carousel-item">
                          <img src="${URL.createObjectURL(file)}" alt="Image ${i}" onclick="openImageView(this)">
                       </div>`;
          allDivs += div;
      }
      const carous = `<div class="carousel">
                        <div class="carousel-container">
                          ${allDivs}
                        </div>
                      </div>
                      <div class="carousel-arrows">
                        <div class="arrow left-arrow" onclick="moveCarousel(-1)">&#9665;</div>
                        <div class="arrow right-arrow" onclick="moveCarousel(1)">&#9655;</div>
                      </div>

                      <div id="image-overlay" class="image-overlay">
                        <span class="close-button" onclick="closeImageView()">&times;</span>
                        <img id="expanded-image" class="expanded-image">
                      </div>`;
      imageContainer.innerHTML = carous;
                                      
      initiateCarouselFuncs();
      // Set the dropped files as the input's files
      input.files = files;
  }
  function displayImages() {
    document.querySelector('#create-post-btn').removeAttribute('disabled');
    const input = document.getElementById("dropzone-file");
    const imageContainer = document.getElementById("putsomething");
      
      imageContainer.innerHTML = '';
      const files = input.files;
      let allDivs = '';
      for (let i = 0; i < files.length; i++) {
          const file = files[i];
          const div = `<div class="carousel-item">
                          <img src="${URL.createObjectURL(file)}" alt="Image ${i}" onclick="openImageView(this)">
                       </div>`;
          allDivs += div;
      }
      const carous = `<div class="carousel">
                        <div class="carousel-container">
                          ${allDivs}
                        </div>
                      </div>
                      <div class="carousel-arrows">
                        <div class="arrow left-arrow" onclick="moveCarousel(-1)">&#9665;</div>
                        <div class="arrow right-arrow" onclick="moveCarousel(1)">&#9655;</div>
                      </div>

                      <div id="image-overlay" class="image-overlay">
                        <span class="close-button" onclick="closeImageView()">&times;</span>
                        <img id="expanded-image" class="expanded-image">
                      </div>`;
      imageContainer.innerHTML = carous;
                                      
      initiateCarouselFuncs();
  }

  function initiateCarouselFuncs(){
    const carouselContainer = document.querySelector(".carousel-container");
      let currentIndex = 0;

      document.querySelector(".carousel").addEventListener("click", (event) => {
          const item = event.target.closest(".carousel-item");
          if (item) {
              openImageView(item.querySelector("img"));
          }
      });

      function moveCarousel(direction) {
        currentIndex += direction;
        const itemWidth = document.querySelector(".carousel-item").offsetWidth;
        const transformValue = `translateX(${-currentIndex * itemWidth}px)`;
        carouselContainer.style.transform = transformValue;
      }

      function openImageView(clickedImage) {
        const imageOverlay = document.getElementById("image-overlay");
        const expandedImage = document.getElementById("expanded-image");

        expandedImage.src = clickedImage.src;
        imageOverlay.style.display = "block";
      }
      document.querySelector(".left-arrow").addEventListener("click", () => moveCarousel(-1));
      document.querySelector(".right-arrow").addEventListener("click", () => moveCarousel(1));
  }
  function closeImageView() {
    document.getElementById("image-overlay").style.display = "none";
  }
  function showImagePost(files){
    let imageContainer = document.getElementById("show-images");
    let allDivs = '';
      // Display the dropped images
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const div = `<div class="carousel-item">
                        <img src="{{ asset('storage/posts/${file}') }}" alt="Image ${i}" onclick="openImageView(this)">
                      </div>`;
        allDivs += div;
        
    }
    const carous = `<div class="carousel">
                      <div class="carousel-container">
                        ${allDivs}
                      </div>
                    </div>
                    <div class="carousel-arrows">
                      <div class="arrow left-arrow" onclick="moveCarousel(-1)">&#9665;</div>
                      <div class="arrow right-arrow" onclick="moveCarousel(1)">&#9655;</div>
                    </div>

                    <div id="image-overlay" class="image-overlay">
                      <span class="close-button" onclick="closeImageView()">&times;</span>
                      <img id="expanded-image" class="expanded-image">
                    </div>`;
    imageContainer.innerHTML = carous;
                                    
    initiateCarouselFuncs();
  }
</script>

@include('partials.__footer')