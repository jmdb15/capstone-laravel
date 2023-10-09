@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')
@php
  $cuser = auth()->user();
  $show = ($cuser->id == $user->id) ? true : false;
  $def = 'https://avatars.dicebear.com/api/initials/'.$user->name.'.svg';
@endphp

<section id="mid" class="flex flex-col grow md:basis-2/3 h-fit m-2 md:m-8" >
  {{-- Personal Details --}}
    <div class="flex flex-col bg-gray-50 min-h-64 h-[440px] md:h-96 rounded-md " x-data="{open: false, id:'', modal_type: 'Change Password'}">
      <img src="{{url('images/cssp_white.png')}}" class="object-cover w-full overflow-y-hidden h-[40%] md:h-[60%]" alt="">
      <div class="flex flex-col relative h-[40%] md:flex-row pt-4">
        {{-- left side --}}
        <div class="relative basis-1/4 md:basis-1/3 flex flex-col justify-center items-center">
          <img src="{{ ($user->image) ? asset('storage/student/'.$user->image) : $def }}" class="-mt-24 w-[23%] md:w-[60%] lg:w-[45%] md:-mt-36 rounded-full aspect-square cursor-pointer hover:brightness-105" alt="Dp" id="image_area">
          @if ($show)
            <form class="h-fit w-full grid place-items-center " action="/update" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <input type="file" accept="image/*" name="image" id="profile_input" class="hidden">
              <button class="mt-4 py-1 px-3 rounded-md bg-green-500 text-white hover:bg-green-600" type="submit">Change Profile</button>
            </form>
          @endif
        </div>
        {{-- middle part --}}
        <div class="mt-3 pb-4 md:mt-0 md:pb-0 flex text-center flex-col lg:basis-1/3 xl:1/2 md:text-start md:basis-2/3 ">
          <h2 class="text-3xl">{{$user->name}}</h2>
          <p class="text-md text-gray-500">{{$user->email}}</p>
          <p class="text-md text-gray-500">{{$user->id}}</p>
        </div>
        {{-- right side --}}
        <div class="basis-1/3 hidden md:flex justify-end items-center pr-4 ">
          @if ($show)
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-slate-500 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 h-min text-center inline-flex items-center dark:bg-slate-600 dark:hover:bg-slate-500 dark:focus:ring-slate-600" type="button">
              <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
          @endif
          <!-- Dropdown menu -->
          <div id="dropdown" class="z-10 hidden bg-gray-100 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-800 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                  <a 
                    type="button"
                    data-modal-target="authentication-modal" 
                    data-modal-toggle="authentication-modal" 
                    x-on:click='open = !open, id="{{$user->id}}"'
                    class="block px-4 py-2 hover:bg-gray-200 hover:cursor-pointer dark:hover:bg-gray-700 dark:hover:text-white">
                      Change Password
                  </a>
                  {{-- <button 
                    x-on:click='open2 = !open2, id="{{$user->id}}", image="{{$user->image}}"'
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Change Password
                  </button> --}}
                </li>
              </ul>
          </div>
          <x-changepass />

        </div>
      </div>
    </div>

    {{-- FORM FOR FORUM QUESTION --}}
    <div id="post_query" class="w-[80%] px-4 pt-4 pb-8 mx-auto mt-8 shadow-md rounded-md bg-gray-100">
      <form action="/go-ask" method="post" class="w-full relative">
        @csrf
        
        <label for="message" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">Do you have a question?</label>
        <textarea id="message" name="query" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ask everyone..."></textarea>

        <button class="send absolute bottom-3 right-3 bg-blue-600 p-2 rounded-full" title="Send" id="send">
          <svg class="rotate-90" fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
          </svg>
        </button>

      </form>
    </div>

    {{-- QUERIES POSTED --}}
    <section class="flex flex-col h-fit mt-10">
      @if (count($posts) == 0)
        <h1 class="mx-auto text-4xl text-center text-white mt-10 ">You have no questions posted yet.</h1>
      @else
        @foreach ($posts as $post)
          @php $def_profile = 'https://avatars.dicebear.com/api/initials/'.$post->users->name.'.svg'; @endphp
            <div class="my-2 mx-auto" x-data="{open2: false, see: {{$see}} }">
              <div class="max-w-md p-6 overflow-hidden rounded-t-lg shadow bg-gray-100 dark:bg-gray-900 dark:text-gray-100 h-min">
                <article>
                  <div class="flex items-center mb-8 space-x-4">
                    <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full dark:bg-gray-500">
                    <div>
                      <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                      <time datetime="2021-02-18" class="text-xs dark:text-gray-400">{{$post->query_date}}</time>
                    </div>
                  </div>
                  <p class="mt-4 dark:text-gray-400">{{$post->query}}</p>
                </article>
              </div>
              <x-commentbox :comments="$post->comments" :curqid="$post->id" />
            </div>
          @endforeach   
        @endif
    </section>

</section>

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
      span = document.getElementById(`span${cid}`);
      svg = document.getElementById(`heart${cid}`);
      document.getElementById('namee').value = namee;
      document.getElementById('uid').value = uid;
      document.getElementById('cid').value = cid;
      document.getElementById('qid').value = qid;
      document.getElementById('cominput').value = document.getElementById(`txtarea${qid}`).value;
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
    const timeElapsed = Date.now();
    let today = new Date(timeElapsed);    
    today = today.toDateString();
    $('#new-comment-name'+qid).html(namee)
    $('#new-comment-date'+qid).html(today);
    $('#new-comment-msg'+qid).html(document.getElementById(`txtarea${qid}`).value);
    document.getElementById(`txtarea${qid}`).value = '';
  }
</script>
@include('partials.__footer')