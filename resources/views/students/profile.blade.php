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
          <img src="{{ ($user->image) ? asset('storage/student/'.$user->image) : $def }}" class="-mt-24 w-[23%] md:w-[60%] lg:w-[45%] md:-mt-36 aspect-square cursor-pointer rounded-full ring-4 ring-gray-300 hover:brightness-105" alt="Dp" id="image_area">
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
      <form action="/go-ask" method="post" class="w-full relative" enctype="multipart/form-data">
        @csrf
        
        <label for="message" class="block mb-2 text-xl font-medium text-gray-700">Do you have a question?</label>
        <textarea id="message" name="question" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ask everyone..."></textarea>

        <button class="send absolute bottom-[10px] right-3 bg-blue-600 p-2 rounded-full" title="Send" id="send">
          <svg class="rotate-90" fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
          </svg>
        </button>
        
        <label for="user_img_qry" id="up_label" class="cursor-pointer absolute bottom-[10px] right-[35px] -translate-x-1/2 bg-gray-200 p-1.5 rounded-full hover:brightness-[98%]">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.5 3.75H8.5C7.77065 3.75 7.07118 4.03973 6.55546 4.55546C6.03973 5.07118 5.75 5.77065 5.75 6.5V6.75H5.5C4.77065 6.75 4.07118 7.03973 3.55546 7.55546C3.03973 8.07118 2.75 8.77065 2.75 9.5V17.5C2.75 18.2293 3.03973 18.9288 3.55546 19.4445C4.07118 19.9603 4.77065 20.25 5.5 20.25H15.5C16.2293 20.25 16.9288 19.9603 17.4445 19.4445C17.9603 18.9288 18.25 18.2293 18.25 17.5V17.25H18.5C19.2293 17.25 19.9288 16.9603 20.4445 16.4445C20.9603 15.9288 21.25 15.2293 21.25 14.5V6.5C21.25 5.77065 20.9603 5.07118 20.4445 4.55546C19.9288 4.03973 19.2293 3.75 18.5 3.75ZM7.25 6.5C7.25 6.16848 7.3817 5.85054 7.61612 5.61612C7.85054 5.3817 8.16848 5.25 8.5 5.25H18.5C18.8315 5.25 19.1495 5.3817 19.3839 5.61612C19.6183 5.85054 19.75 6.16848 19.75 6.5V12.7L17.48 10.79C17.4061 10.7257 17.3201 10.6768 17.2271 10.646C17.1341 10.6152 17.036 10.6032 16.9383 10.6106C16.8406 10.6181 16.7454 10.6448 16.6581 10.6893C16.5709 10.7339 16.4933 10.7953 16.43 10.87L15.36 12.13L11.36 8.25C11.2961 8.17377 11.2166 8.11204 11.127 8.06893C11.0373 8.02582 10.9395 8.00232 10.84 8C10.737 8.00389 10.6358 8.02898 10.5429 8.07372C10.45 8.11845 10.3673 8.18187 10.3 8.26L7.25 11.89V6.5ZM8.5 15.75C8.16848 15.75 7.85054 15.6183 7.61612 15.3839C7.3817 15.1495 7.25 14.8315 7.25 14.5V14.2L10.92 9.88L14.38 13.27L12.28 15.75H8.5ZM16.75 17.5C16.75 17.8315 16.6183 18.1495 16.3839 18.3839C16.1495 18.6183 15.8315 18.75 15.5 18.75H5.5C5.16848 18.75 4.85054 18.6183 4.61612 18.3839C4.3817 18.1495 4.25 17.8315 4.25 17.5V9.5C4.25 9.16848 4.3817 8.85054 4.61612 8.61612C4.85054 8.3817 5.16848 8.25 5.5 8.25H5.75V14.5C5.75 15.2293 6.03973 15.9288 6.55546 16.4445C7.07118 16.9603 7.77065 17.25 8.5 17.25H16.75V17.5ZM18.5 15.75H14.25L17.09 12.41L19.72 14.64C19.6903 14.9433 19.549 15.2247 19.3236 15.4298C19.0982 15.6349 18.8047 15.749 18.5 15.75Z" fill="#000000"/>
          </svg>        
        </label>
        <input onchange="queryUpload(this)" hidden class="absolute bottom-3 left-1/2 -translate-x-1/2 w-[60%] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" id="user_img_qry" name="image" type="file" accept="image/*">
   
        <div class="w-[60%] mx-auto mt-4">
          <img id="img_upload_area" alt="" class="hidden mx-auto max-h-[364px]">
        </div>

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
                <!-- DROPDOWN -->
                <div class="flex justify-end px-4 relative">
                  <button id="dropdownButton-{{$post->id}}" data-dropdown-toggle="dropdown-{{$post->id}}" class="absolute -top-2 -right-2 inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
                      <span class="sr-only">Open dropdown</span>
                      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                      </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdown-{{$post->id}}" class="z-40 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                      <ul class="py-2" aria-labelledby="dropdownButton-{{$post->id}}">
                        <li id="copylinkbtn{{$post->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                            onclick="copylink('{{$post->id}}')">
                            <svg class="inline mr-1.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16"> 
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> 
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> 
                            </svg>
                            Copy link
                        </li>
                        <li onclick="setEdit({{$post->id}})"
                          id="edit-{{$post->id}}" class="flex items-center cursor-pointer px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100" >
                          <svg width="16" height="16" viewBox="0 0 24 24" class="mr-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                            Edit question
                        </li>
                      </ul>
                  </div>
                </div>
              <!-- END DROPDOWN -->
                <article>
                  <div class="flex items-center mb-8 space-x-4">
                    <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full">
                    <div>
                      <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                      <time datetime="2021-02-18" class="text-xs">{{$post->query_date}}</time>
                    </div>
                  </div>
                  <p class="mt-4 py-1.5 pl-1" id="query-cont-{{$post->id}}">{{$post->query}}</p>
                  @if ($post->image)
                    <img src="{{asset('storage/student/questions/'. $post->image)}}" alt="" class="mx-auto max-h-[364px]">
                  @endif
                </article>
                <button class="hidden my-4 px-6 py-2 bg-green-400 rounded-lg hover:brightness-110" id="save-btn-{{$post->id}}" onclick="saveEdit({{$post->id}})">Save</button>
              </div>
              <x-commentbox :comments="$post->comments" :curqid="$post->id" />
            </div>
          @endforeach   
        @endif
    </section>
  </form>
  
  {{-- ORGANIZATION POST FORM --}}
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
  const profile_input = document.querySelector('#profile_input');
  const image_area = document.querySelector('#image_area');

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

  let reportFor = '';
    let reportType = '';
    let reportId = '';

    function setReportFor(type, id){
      reportFor = type;
      reportId = id;
    }

    function setReport(elem, type){
      reportType = type;
    }

    function confirmReport(){
      let content = reportType, queries_id = '', comments_id = '';
      if(reportFor == 'queries'){
        queries_id = reportId;
      }else{
        comments_id = reportId;
      }
       $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/send-report',
            type: 'POST',
            data: { 
              content : content, 
              queries_id : queries_id, 
              comments_id : comments_id 
            },
            success: function(data){
                console.log(data);
            }
        });
    }

    function queryUpload(elem){
      let imgArea = document.querySelector('#img_upload_area');
      const image = elem.files[0]
      if(image){
        imgArea.classList.remove('hidden');
        const reader = new FileReader();
        reader.onload = ()=> {
            const imgUrl = reader.result;
            imgArea.src = imgUrl;
        }
        reader.readAsDataURL(image)
        document.getElementById('up_label').className = 'cursor-pointer absolute bottom-[50px] -right-[6px] -translate-x-1/2 bg-gray-200 p-1.5 rounded-full hover:brightness-[98%] bottom-[10px]';
      }else{
        document.getElementById('up_label').className = 'cursor-pointer absolute bottom-[10px] right-[35px] -translate-x-1/2 bg-gray-200 p-1.5 rounded-full hover:brightness-[98%] bottom-[10px]';
        imgArea.classList.add('hidden');
      }
    }

  function setEdit(id){
    document.getElementById('query-cont-'+id).setAttribute('contenteditable', 'true');
    document.getElementById('query-cont-'+id).focus();
    document.getElementById('save-btn-'+id).classList.toggle('hidden');
  }
  
  function saveEdit(id){
    let query = document.getElementById('query-cont-'+id).innerHTML;
    document.getElementById('query-cont-'+id).removeAttribute('contenteditable');
    document.getElementById('save-btn-'+id).classList.toggle('hidden');
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url:'/go-ask',
      type:'POST',
      data: {
        id: id,
        query: query
      },
      success:function(data){
        console.log(data);
        document.querySelector('#toast-s-content').innerHTML = 'Update Successful';
        let elem = document.querySelector('#toast-success');
        elem.classList.toggle('hidden')
        elem.classList.toggle('flex')
        setTimeout(() => {
            elem.classList.toggle('hidden')
            elem.classList.toggle('flex')
        }, 3000);
      }
    })
  }

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
<x-messages />
@if(auth()->user()->type == 'organization')
  <x-createpost_modal />
  @endif
<x-report_modal />
@include('partials.__footer')