@include('partials.__header')
@vite(['resources/css/post.css'])
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14">

        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50">
            <img src="{{url('images/cssp.png')}}" alt="CSSP logo" class="h-10 w-10">
            @error('image')
              <p class="text-red-500 text-sm mt-2 text-center mb-0">{{ $message }}</p>
            @enderror
            <input data-modal-target="create-post-modal" data-modal-toggle="create-post-modal" type="text" id="chat" class="hover:bg-gray-100 cursor-pointer block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Create post" />
        </div>
    <br>
    <x-messages />
    <x-post_table :posts="$posts"/>
    <x-createpost_modal />
    <x-showpostmodal />
  </div>
</div>

 <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this post?</h3>
                <button onclick="deletethis()" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button onclick="hideBd()" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
  </div>
  <div id="backdrop" class="w-screen h-screen fixed inset-0 z-[51] bg-gray-900 opacity-40 hidden"></div>
  
<x-messages />

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      $.ajaxSetup({
          headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    });
  function allowPost(){
    const capt = document.querySelector('#caption').value;
    if(capt !== ''){
      document.querySelector('#create-post-btn').removeAttribute('disabled');
    }else{
      document.querySelector('#create-post-btn').setAttribute('disabled', 'disabled');
    }
  }
  function showpost(id){
    localStorage.setItem('id', id);
    $.ajax({
      url:'/create-post',
      type: 'GET',
      data: {
        for: 'read',
          id: id
        },
      success:function(data){
        // console.log(data)
        $("#show-images").html('');
        if(data.caption != null){
          $('#modal-caption').val(data.caption);
        }
        if(data.links != null){
          files = data.links.split('|');
          showImagePost(files);
        }
        $('#show-post-button').click();
        document.querySelector('#modal-caption').focus();
      }
    });
  }
  function editpost(){
    const id = localStorage.getItem('id');
    const capt = $('#modal-caption').val();
    $.ajax({
      url:'/create-post',
      type: 'GET',
      data: {
          for: 'edit',
          id: id,
          caption: capt
        },
      success:function(data){
        location.reload();
      }
    });
  }
  function deletethis(){
    id = localStorage.getItem('log_id');
    document.querySelector('#backdrop').classList.toggle('hidden');
    $.ajax({
      url:'/create-post/action',
      type: 'POST',
      data: { 
          for: 'posts',
          id: id
        },
      success:function(data){
        console.log(' deleted');
        document.querySelector(`#tr-${id}`).style.display = 'none';
      }
    });
  }
  function confirmDel(id){
    localStorage.setItem('log_id', id);
    document.querySelector('#popup-modal').classList.toggle('hidden');
    document.querySelector('#popup-modal').classList.toggle('flex');
    document.querySelector('#backdrop').classList.toggle('hidden');
  }
  function hideBd(){
      document.querySelector('#backdrop').classList.toggle('hidden');
  }
  // Function to allow dropping in the drop zone
  function allowDrop(event) {
      event.preventDefault();
  }
  function allowEdit(elem){
    if(elem.value !== ''){
      document.querySelector('#edit-post-btn').removeAttribute('disabled');
    }else{
      document.querySelector('#edit-post-btn').setAttribute('disabled','disabled');
    }
  }
  // Function to handle the drop event
  function handleDrop(event) {
      document.querySelector('#create-post-btn').removeAttribute('disabled');
      event.preventDefault();
      const input = document.getElementById("dropzone-file");
      const imageContainer = document.getElementById("putsomething");
      
      // Clear the previous images
      imageContainer.innerHTML = '';

      // Get the dropped files
      const files = event.dataTransfer.files;
      let allDivs = '';
      // Display the dropped images
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
      
      // Clear the previous images
      imageContainer.innerHTML = '';

      // Get the dropped files
      const files = input.files;
      let allDivs = '';
      // Display the dropped images
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
                    <span class="close-button" onclick="seImageView()">&times;</span>
                      <img id="expanded-image" class="expanded-image">
                    </div>`;
    imageContainer.innerHTML = carous;
                                    
    initiateCarouselFuncs();
  }
</script>

@include('partials.__admin_footer')