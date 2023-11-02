@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/avatar.svg';
@endphp
<body class="bg-gray-200 h-screen w-screen grid place-items-center overflow-y-scroll overflow-x-hidden" x-data="{nos: false}" :class="{'no-scroll': nos}">
  
<div class="w-screen h-[70px] bg-violet-500 fixed top-0 left-0 z-[49]">
    <nav class="container relative flex flex-wrap items-center justify-between h-full mx-auto lg:justify-between xl:px-0" x-data="{openMobile: false, open: false}">
        <div class="flex flex-wrap items-center justify-between w-full lg:w-auto">
              <a href="/" class="flex items-center space-x-2 text-2xl font-medium text-indigo-500">
                  <img alt="logo" src="{{ url('images/CSSP.png') }}" class="h-14 w-14 aspect-square" width="36" height="36" decoding="async" data-nimg="1" loading="lazy" style="color:transparent" />
              </a>
            <h2 class="text-xl ml-3">TALK to RAJAH</h2>
            <button x-on:click="openMobile = !openMobile, nos = !nos" aria-label="Toggle Menu" class="px-2 py-1 ml-auto z-50 text-gray-800 rounded-md transition-all lg:hidden hover:bg-violet-600  focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none" id="headlessui-disclosure-button-:R17:" type="button" aria-expanded="false" 
            data-headlessui-state="">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                </svg>
            </button>
        </div>
        <div class="hidden relative -translate-x-12 text-center lg:flex lg:items-center">
            <ul class="items-center justify-end flex-1 pt-6 lg:pt-0 list-reset lg:flex">
              <li class=" nav__item">
                <a href="/posts" class="inline-block px-4 py-2 transition-all hover:brightness-110 bg-violet-500 hover:text-indigo-500 focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none">
                  <svg width="60px" height="54px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M296.4 208.4h495.5c14.4 0 26.1 11.7 26.1 26.1v326c0 14.4-11.7 26.1-26.1 26.1H296.4c-14.4 0-26.1-11.7-26.1-26.1v-326c0-14.4 11.7-26.1 26.1-26.1z" fill="#FFFFFF" /><path d="M791.9 612.6H296.4c-28.8 0-52.2-23.4-52.2-52.2v-326c0-28.8 23.4-52.2 52.2-52.2h495.5c28.8 0 52.2 23.4 52.2 52.2v326c0 28.8-23.4 52.2-52.2 52.2zM296.4 234.5v326h495.5v-326H296.4z" fill="#333333" /><path d="M270.3 404h534.6v52.2H270.3z" fill="#333333" /><path d="M147 416.4l458.8-122.9c13.9-3.7 28.2 4.5 31.9 18.4 0 0.1 0 0.1 0.1 0.2l87.8 339.1c3.6 13.9-4.7 28-18.5 31.7L248.3 805.8c-13.9 3.7-28.2-4.5-31.9-18.4 0-0.1 0-0.1-0.1-0.2l-87.8-339.1c-3.6-13.9 4.6-28 18.5-31.7z" fill="#FFFFFF" /><path d="M241.4 832.8c-9 0-18-2.4-26-7-12.1-7-20.7-18.2-24.3-31.7l-87.9-339.5c-7.1-27.6 9.5-56.1 37-63.4L599 268.3c13.5-3.6 27.5-1.8 39.6 5.2 12.1 7 20.7 18.2 24.3 31.7l87.9 339.5c7.1 27.6-9.4 56.1-37 63.4L255 831c-4.5 1.2-9 1.8-13.6 1.8zM147 416.4l6.7 25.2 87.8 339.1 458.8-122.9-87.8-339.1-458.8 122.9-6.7-25.2z" fill="#333333" /><path d="M153.4 441.5l459.8-122.4L676.1 558 216.5 680.6z" fill="#8CAAFF" /><path d="M212.3 675c28.9-94.6 63.9-149.1 104.8-163.4 41-14.4 91 17.9 150.2 96.9" fill="#FFFFFF" /><path d="M212.3 701.1c-2.5 0-5.1-0.4-7.6-1.1-13.8-4.2-21.5-18.8-17.3-32.6 31.8-104 71.4-163 121.1-180.4 53.5-18.7 112.2 15.9 179.7 105.8 8.6 11.5 6.3 27.9-5.2 36.5-11.5 8.6-27.9 6.3-36.5-5.2-49.8-66.5-92.7-97.7-120.7-87.9-22.3 7.8-55.9 39.6-88.5 146.4-3.6 11.3-13.9 18.5-25 18.5z" fill="#333333" /><path d="M400.7 631.5c34-79.5 68.6-125.5 103.9-137.9 35.3-12.4 85.3 7.7 150 60.2" fill="#FFFFFF" /><path d="M400.7 657.6c-3.4 0-6.9-0.7-10.2-2.1-13.2-5.6-19.4-21-13.8-34.2C414 533.9 453 484.1 495.9 469c44.9-15.7 102.2 5.4 175.1 64.6 11.2 9.1 12.9 25.5 3.8 36.7-9.1 11.2-25.5 12.9-36.7 3.8-74.6-60.5-110.3-61-125-55.8-15.7 5.5-48.1 28.9-88.5 123.5-4.1 9.9-13.7 15.8-23.9 15.8z" fill="#333333" /><path d="M192.088 678.984l491.16-131.6 13.51 50.42-491.16 131.6z" fill="#333333" /></svg>
                  <span class="testhover">Announcement</span>
                </a>
              </li>
              <li class=" nav__item">
                <a href="/forum" class="inline-block px-4 py-2 transition-all hover:brightness-110 bg-violet-500 hover:text-indigo-500 focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none">
                  <svg width="60px" height="54px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M118.9 388.7h328.6c14.3 0 25.9 11.6 25.9 25.9v208.7c0 14.3-11.6 25.9-25.9 25.9H275.6l-52.1 50.1-54.1-50.1h-50.5c-14.3 0-25.9-11.6-25.9-25.9V414.6c0-14.3 11.6-25.9 25.9-25.9z" fill="#8CAAFF" /><path d="M223.5 699.2l-54.1-50.1h-50.5c-14.3 0-25.9-11.6-25.9-25.9V414.6c0-14.3 11.6-25.9 25.9-25.9h328.7c14.3 0 25.9 11.6 25.9 25.9v208.7c0 14.3-11.6 25.9-25.9 25.9H275.7l-52.2 50z m-91.7-88.9h52.8l38.4 35.5 37-35.5h174.6V427.5H131.8v182.8z" fill="#333333" /><path d="M321.6 267.9h508.9c14.3 0 25.9 11.6 25.9 25.9v399c0 14.3-11.6 25.9-25.9 25.9h-177L584 785.5l-72.2-66.8H321.5c-14.3 0-25.9-11.6-25.9-25.9v-399c0.1-14.3 11.7-25.9 26-25.9z" fill="#FFFFFF" /><path d="M584.4 821.1l-82.6-76.5H321.6c-28.5 0-51.8-23.2-51.8-51.8v-399c0-28.5 23.2-51.8 51.8-51.8h508.9c28.5 0 51.8 23.2 51.8 51.8v399c0 28.5-23.2 51.8-51.8 51.8H663.9l-79.5 76.5zM321.6 293.8v399H522l61.7 57.1 59.4-57.1h187.4v-399H321.6z" fill="#333333" /><path d="M642.2 509.5H582l-0.2 10.9c-0.3 14.1-11.8 25.4-25.9 25.4h-0.1c-13.8 0-25-11.2-25-25v-0.5l0.7-37.1c0.3-13.8 11.3-24.9 24.9-25.4 0.8-0.1 1.6-0.1 2.4-0.1h57.3v-47.4H520c-14.3 0-25.9-11.6-25.9-25.9s11.6-25.9 25.9-25.9H642c14.3 0 25.9 11.6 25.9 25.9v99.2c0 14.2-11.5 25.7-25.7 25.9z m-112.3 96.1V603c0-14.3 11.6-25.9 25.9-25.9s25.9 11.6 25.9 25.9v2.6c0 14.3-11.6 25.9-25.9 25.9s-25.9-11.6-25.9-25.9z" fill="#333333" /></svg>
                  <span class="testhover1">Forum</span>
                </a>
              </li>
            </ul>
        </div>
        <x-mobilenavdropdown />
        <img @if (auth()->user()) src="{{(auth()->user()->image) ? asset('storage/student/thumbnail/'.auth()->user()->image) : $def_profile}}" @else src="{{$def_profile}}" @endif
          alt=""
          class='h-12 w-12 aspect-square rounded-full transition-all cursor-pointer hover:scale-105 hidden lg:block' 
          x-on:click="open = !open" />
        <x-prof_dropdown />
    </nav>
</div>