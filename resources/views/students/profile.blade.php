@include('partials.__header')
@vite(['resources/css/post.css'])
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])
@php
  $cuser = auth()->user();
  $show = ($cuser->id == $user->id) ? true : false;
  $def = 'https://avatars.dicebear.com/api/initials/avatar.svg';
@endphp

{{-- Personal Details --}}
    <div class="flex flex-col bg-gray-50 min-h-64 h-[440px] w-[96%] md:h-96 rounded-md ">
      <img src="{{url('images/banner.jpg')}}" class="object-cover w-full overflow-y-hidden h-[40%] md:h-[60%]" alt="">
      <div class="flex flex-col relative h-[40%] md:flex-row pt-4">
        {{-- left side --}}
        <div class="relative basis-1/4 md:basis-1/3 flex flex-col justify-center items-center">
          <img src="{{ ($user->image) ? asset('storage/student/'.$user->image) : $def }}" class="-mt-24 w-[23%] md:w-[60%] lg:w-[45%] md:-mt-36 rounded-full aspect-square cursor-pointer hover:brightness-105" alt="Dp" id="image_area">
          @if ($show)
            <form class="h-fit w-full grid place-items-center " action="/update" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <input type="file" accept="image/*" name="image" id="profile_input" class="hidden">
              <button class="mt-4 py-2 px-4 rounded-md bg-violet-300 text-white text-base hover:bg-violet-400 disabled:bg-gray-300 disabled:cursor-not-allowed" id="change-prof" type="submit" disabled>Change Profile</button>
            </form>
          @endif
        </div>
        {{-- middle part --}}
        <div class="relative mt-3 pb-4 md:mt-0 md:pb-0 flex text-center flex-col lg:basis-2/3 xl:1/2 md:text-start md:basis-2/3 ">
          <div class="flex items-center gap-x-10 justify-center md:justify-normal">
            <h2 class="text-3xl font-medium flex">
              {{$user->name}}
              @if (auth()->user()->trusted == 1)
              <span class="bg-green-400 rounded-full drop-shadow-md hover:brightness-105 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 31.25" x="0px" y="0px" class="h-10 w-10">
                  <g>
                    <path d="M20.042,18.22632a.5.5,0,0,0-.4375-.28662,3.04932,3.04932,0,0,1-2.761-2.3346l.345.03577a.52784.52784,0,0,0,.40625-.14453.49852.49852,0,0,0,.14257-.40625l-.13574-1.2749,1.23047-.36231a.50013.50013,0,0,0,.29785-.71826l-.6123-1.125.99707-.80762a.49985.49985,0,0,0,0-.77734l-.998-.8086.61328-1.13476A.49887.49887,0,0,0,18.832,7.364l-1.23047-.3623.13574-1.27539a.49977.49977,0,0,0-.5498-.55029l-1.28613.13623-.36231-1.23047a.50042.50042,0,0,0-.71875-.29785l-1.123.61132-.8086-.99707a.51759.51759,0,0,0-.77734,0l-.8086.99707-1.123-.61132a.50042.50042,0,0,0-.71875.29785L9.09863,5.31226,7.8125,5.176a.49035.49035,0,0,0-.40625.14355.49651.49651,0,0,0-.14355.40674l.13574,1.27539L6.168,7.364a.49887.49887,0,0,0-.29785.71729L6.4834,9.21606l-.998.8086a.49985.49985,0,0,0,0,.77734l.99707.80762-.6123,1.125a.50013.50013,0,0,0,.29785.71826l1.23047.36231-.13574,1.2749a.49852.49852,0,0,0,.14257.40625.52428.52428,0,0,0,.40625.14453l1.28614-.13477.36328,1.2378a.498.498,0,0,0,.28906.32177.50722.50722,0,0,0,.43164-.02441l1.12207-.61768.08948.11017A10.63762,10.63762,0,0,1,8.5166,20.35132a10.92306,10.92306,0,0,0,.21875-1.147.5007.5007,0,0,0-.60156-.54737,3.05424,3.05424,0,0,1-1.37109.00733,3.83538,3.83538,0,0,0,1.80664-1.59375.5.5,0,0,0-.85157-.52442A2.70033,2.70033,0,0,1,5.39648,17.9397a.50019.50019,0,0,0-.38086.80713,3.08829,3.08829,0,0,0,2.61426.98584,11.94327,11.94327,0,0,1-.30371,1.16992.62844.62844,0,0,0,.35742.85156.48866.48866,0,0,0,.15528.02344c.94989-.00043,3.17151-2.19342,4.25958-4.37549l.01385.01709a.50032.50032,0,0,0,.7754,0l.01385-.01709c1.08826,2.18213,3.31061,4.37549,4.25958,4.37549a.48866.48866,0,0,0,.15528-.02344.62844.62844,0,0,0,.35742-.85156,11.94327,11.94327,0,0,1-.30371-1.16992,3.06107,3.06107,0,0,0,2.61426-.98584A.49975.49975,0,0,0,20.042,18.22632Zm-3.17578.43066a.5007.5007,0,0,0-.60156.54737,11.04747,11.04747,0,0,0,.21875,1.14746,10.63982,10.63982,0,0,1-2.87659-3.81806l.08948-.11017,1.12207.61768a.5.5,0,1,0,.48242-.876l-1.48926-.81982a.49968.49968,0,0,0-.63086.124L12.5,16.31226l-.68066-.84278a.49954.49954,0,0,0-.63086-.124l-.94336.51953-.30567-1.04248a.49623.49623,0,0,0-.53418-.35645l-1.083.11622.11523-1.07569a.5.5,0,0,0-.35547-.53271L7.04492,12.6687l.51465-.94678a.50006.50006,0,0,0-.125-.62744l-.84082-.68115.84082-.68115a.49862.49862,0,0,0,.125-.62647l-.5166-.957L8.082,7.843A.5.5,0,0,0,8.4375,7.3103L8.32227,6.2356l1.085.11474a.49428.49428,0,0,0,.53222-.35547l.30567-1.03662.94531.51465a.50275.50275,0,0,0,.62793-.12451L12.5,4.50708l.68164.84131a.49986.49986,0,0,0,.62793.12451l.94531-.51465.30567,1.03662a.49823.49823,0,0,0,.53222.35547l1.085-.11474L16.5625,7.3103A.5.5,0,0,0,16.918,7.843l1.03906.30566-.5166.957a.49862.49862,0,0,0,.125.62647l.84082.68115-.84082.68115a.50006.50006,0,0,0-.125.62744l.51465.94678-1.03711.30518a.5.5,0,0,0-.35547.53271l.11523,1.07569-.44628-.04639a.48522.48522,0,0,0-.07471.00787.47447.47447,0,0,0-.04834-.0025c-.01074.00159-.01892.00842-.02936.01068a.4939.4939,0,0,0-.1123.04077.48819.48819,0,0,0-.06391.034.49361.49361,0,0,0-.09173.08423.47131.47131,0,0,0-.03827.04522.4793.4793,0,0,0-.05707.12.48507.48507,0,0,0-.01752.05585.44683.44683,0,0,0-.01562.04968.47509.47509,0,0,0,.00866.09c.00092.01263-.00372.02423-.00183.03692.00232.01575.00775.035.01032.05109.00226.00867.00256.01752.00525.026a4.63847,4.63847,0,0,0,2.53619,3.4776A3.03548,3.03548,0,0,1,16.86621,18.657ZM12.5,14.95435A4.54417,4.54417,0,0,1,8.73242,7.86987a.49973.49973,0,1,1,.82813.55957,3.54059,3.54059,0,1,0,1.78418-1.37011.5.5,0,1,1-.32618-.94532A4.54425,4.54425,0,1,1,12.5,14.95435Zm-.74219-3.103-.80371-.92041a.5004.5004,0,0,1,.75391-.6582l.40722.46728,1.16114-1.4707a.50025.50025,0,0,1,.78515.62011l-1.53418,1.94288a.50167.50167,0,0,1-.37988.18994h-.01269A.50087.50087,0,0,1,11.75781,11.85132Z"/>
                  </g>
                </svg>
              </span> 
            @endif
            </h2>
            
          </div>
          <p class="text-md text-gray-500">{{$user->email}}</p>
          <p class="text-md text-gray-500">{{$user->id}}</p>
        </div>
        {{-- right side --}}
        <div class="w-10 ml-4 md:flex justify-end items-center pr-4 absolute right-0 md:relative">
          @if ($show)
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 h-min text-center inline-flex items-center" type="button">
              <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
          @endif
          <!-- Dropdown menu -->
          <div id="dropdown" class="z-10 hidden bg-gray-100 divide-y divide-gray-100 rounded-lg shadow w-44">
              <ul class="py-2 text-sm text-gray-800" aria-labelledby="dropdownDefaultButton">
                <li>
                  <a 
                    type="button"
                    data-modal-target="authentication-modal" 
                    data-modal-toggle="authentication-modal" 
                    x-on:click='open = !open, id="{{$user->id}}"'
                    class="block px-4 py-2 hover:bg-gray-200 hover:cursor-pointer">
                      Change Password
                  </a>
                </li>
                @if (auth()->user()->email_verified_at == null)
                  <li>
                    <a href="/verify"
                      type="button"
                      class="block px-4 py-2 hover:bg-gray-200 hover:cursor-pointer">
                        Verify Account
                    </a>
                  </li>
                @endif
              </ul>
          </div>

        </div>
      </div>
    </div>

  @if(auth()->user()->type == 'student' && auth()->user()->email_verified_at != null)
    {{-- FORM FOR FORUM QUESTION --}}
    <div id="post_query" class="w-[96%] max-w-[562px] px-4 pt-4 pb-8 mx-auto mt-8 shadow-md rounded-md bg-gray-100">
      <form action="/go-ask" method="post" class="w-full relative">
        @csrf
        
        <label for="message" class="block mb-2 text-xl font-medium text-gray-700">Do you have a question?</label>
        <textarea id="message" name="question" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ask everyone..."></textarea>

        <button class="send absolute bottom-3 right-3 bg-blue-600 p-2 rounded-full" title="Send" id="send">
          <svg class="rotate-90" fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
          </svg>
        </button>

      </form>
    </div>

    <form method="POST" action="javascript:void(0)" id="querier" class="w-full p-0">
    @csrf
      <input type="hidden" name="name" id="namee">
      <input type="hidden" name="uid" id="uid">
      <input type="hidden" name="qid" id="qid">
      <input type="hidden" name="cid" id="cid">
      <input type="hidden" name="comment" id="cominput">

    {{-- QUERIES POSTED --}}
    <section class="flex flex-col h-fit mt-10 w-full">
      @if (count($posts) == 0)
        <h1 class="mx-auto text-2xl text-center text-gray-800 mt-2 mb-10 ">You have no questions posted yet.</h1>
      @else
        @foreach ($posts as $post)
          @php $def_profile = 'https://avatars.dicebear.com/api/initials/avatar.svg'; @endphp
            <div class="my-2 mx-auto w-[96%] max-w-[562px]" x-data="{open2: false, see: {{$see}} }">
              <div class="b4-card w-full p-6 overflow-hidden rounded-t-lg shadow bg-gray-100 h-min">
                <article>
                  <div class="flex items-center mb-8 space-x-4">
                    <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full">
                    <div>
                      <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                      <time datetime="2021-02-18" class="text-xs">{{$post->query_date}}</time>
                    </div>
                  </div>
                  <p class="mt-4">{{$post->query}}</p>
                </article>
              </div>
              <x-commentbox :comments="$post->comments" :curqid="$post->id" />
            </div>
          @endforeach   
        @endif
    </section>
  </form>
  
  @elseif (auth()->user()->type == 'organization')
      <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 w-[96%] my-10">
          <img src="{{url('images/cssp.png')}}" alt="CSSP logo" class="h-10 w-10">
          @error('image')
            <p class="text-red-500 text-sm mt-2 text-center mb-0">{{ $message }}</p>
          @enderror
          <input data-modal-target="create-post-modal" data-modal-toggle="create-post-modal" type="text" id="chat" class="hover:bg-gray-100 cursor-pointer block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Create post" />
      </div>

      <div class="flex flex-col gap-3 mx-2">
        @foreach ($posts as $post)
          <x-card :post="$post" />
        @endforeach
      </div>
  @endif

  {{-- View Image Modal --}}
<div id="imageModal" class="modal">
  <span id="viewImageCloseButton">&times;</span>
  <img class="modal-content" id="modalImage" src="" alt="Image" />
</div>
  <x-messages />
  
@include('partials.__notifications', ['notifs' => $notifs])
<script>
  // const selectImage = document.querySelector('.select_image');
  const profile_input = document.querySelector('#profile_input');
  const image_area = document.querySelector('#image_area');

  // selectImage.addEventListener('click', function(){
  //     inputFile.click();
  // })
  image_area.addEventListener('click', function(){
      profile_input.click();
  })

  profile_input.addEventListener('change',function(){
      document.querySelector('#change-prof').removeAttribute('disabled');
      const image = this.files[0]
      const reader = new FileReader();
      reader.onload = ()=> {
          const imgUrl = reader.result;
          image_area.src = imgUrl;
      }
      reader.readAsDataURL(image)
  })

  function reactsubmit(type, uid, namee, cid, qid){
    if((cid != 'null' && type == 'react') || (qid != 'null' && type=='comment')){
      let txtarea = document.getElementById(`txtarea${qid}`);
      span = document.getElementById(`span${cid}`);
      svg = document.getElementById(`heart${cid}`);
      document.getElementById('namee').value = namee;
      document.getElementById('uid').value = uid;
      document.getElementById('cid').value = cid;
      document.getElementById('qid').value = qid;
      document.getElementById('cominput').value = txtarea.value;
      if(document.getElementById(`txtarea${qid}`).value != ''){
        url = (type == 'react') ? "{{ url('ajax-request-react') }}" : "{{ url('ajax-request-comment') }}";
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: 'POST',
          url: url,
          data: $('#querier').serialize(),
          success: function(data){
            if(data == 'add'){
              svg.setAttribute('fill', "#f5356e");
              svg.setAttribute('stroke', "#f5356e");
              span.innerHTML = Number(span.innerText) + 1;
            }else if(data == 'commented'){
              console.log(data)
            }else{
              svg.setAttribute('fill', "#707277");
              svg.setAttribute('stroke', "#707277");
              span.innerHTML = Number(span.innerText) - 1;
            }
          },
          error:function(xhr){
            console.log(xhr.responseText);
          }
        });
      }
      if(type=='comment' && txtarea.value !== ''){
        const timeElapsed = Date.now();
        let today = new Date(timeElapsed);    
        today = today.toDateString();
    
        let newCom = `<div>
                    <div class="comments">
                      <div class="comment-react">
                          <button>
                              <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path id="heart" fill="#070400" stroke="#070400" stroke-linecap="round" stroke-width="2" d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z"></path>
                              </svg>
                          </button>
                        <hr>
                        <span>0</span>
                      </div>
                      <div class="comment-container">
                        <div class="user">
                          <div class="user-pic">
                            <img src="{{ auth()->user()->image ? asset('storage/student/'.auth()->user()->image) : 'https://avatars.dicebear.com/api/initials/avatar.svg'}}" alt="">
                          </div>
                          <div class="user-info">
                            <span>${namee}</span>
                            <p>${today}</p>
                          </div>
                        </div>
                        <p class="comment-content">${document.getElementById(`txtarea${qid}`).value}</p>
                      </div>
                    </div>
                  </div>`;
    
        const orig = document.querySelector(`#comment-container-${qid}`).innerHTML;
        document.querySelector(`#comment-container-${qid}`).innerHTML = '';
        document.querySelector(`#comment-container-${qid}`).innerHTML += newCom + orig;
        document.getElementById(`txtarea${qid}`).value = '';
      }
    }
  }
  function openModal(imageSrc) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("modalImage");

    // Set the source of the modal image to the clicked image
    modalImg.src = imageSrc.src;

    // Display the modal
    modal.style.display = "grid";

    // Function to close the modal when clicking the close button
    document.getElementById("viewImageCloseButton").onclick = function() {
      modal.style.display = "none";
    }
  }
  function hideBd(){
      document.querySelector('#backdrop').classList.toggle('hidden');
  }
  // Function to allow dropping in the drop zone
  function allowDrop(event) {
      event.preventDefault();
  }

  // Function to handle the drop event
  function handleDrop(event) {
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
<x-changepass />
<x-createpost_modal />
@include('partials.__footer')