{{-- <nav class='relative h-20 w-full px-3 box-border bg-violet-700 flex justify-between items-center' 
    x-data="{ open: false }">
  <div id='brand' class='flex items-center h-full'>
    <div class='h-3/4 py-2 mr-2 xl:h-full'>
      <img src="{{url('images/Untitled-1.ico')}}" alt="Logo" class="h-full min-w-fit"/>
    </div>
    <h1 class='text-sm text-white sm:text-lg xl:text-2xl'>TALK to RAJA (CSSSP Forum System)</h1>
  </div>
  <div id="navicons" class='relative hidden lg:flex lg:-translate-x-3/4 xl:-translate-x-full h-full gap-x-4'>
    <a href="/posts">
      <img src="{{url('images/Untitled-1.ico')}}"
      alt=""
      class='h-3/4 py-2 transition-all cursor-pointer hover:scale-105 xl:h-full' />
    </a>
    <a href="/forum">
      <img src="{{url('images/Untitled-1.ico')}}"
      alt=""
      class='h-3/4 py-2 transition-all cursor-pointer hover:scale-105 xl:h-full' />
    </a>
  </div>

  
</nav> --}}
<body class="bg-gray-200 h-screen w-screen grid place-items-center overflow-y-scroll overflow-x-hidden" x-data="{nos: false}" :class="{'no-scroll': nos}">
  
<div class="w-screen h-[70px] bg-violet-500 fixed top-0 left-0 z-[49]">
    <nav class="container relative flex flex-wrap items-center justify-between h-full mx-auto lg:justify-between xl:px-0" x-data="{openMobile: false, open: false}">
        <div class="flex flex-wrap items-center justify-between w-full lg:w-auto">
              <a href="/" class="flex items-center space-x-2 text-2xl font-medium text-indigo-500 dark:text-gray-100">
                  <img alt="logo" src="{{ url('images/Untitled-1.ico') }}" class="h-14 w-14 aspect-square" width="36" height="36" decoding="async" data-nimg="1" loading="lazy" style="color:transparent" />
              </a>
            <h2 class="text-xl ml-3">TALK to RAJAH</h2>
            <button x-on:click="openMobile = !openMobile, nos = !nos" aria-label="Toggle Menu" class="px-2 py-1 ml-auto z-50 text-gray-800 rounded-md transition-all lg:hidden hover:bg-violet-600  focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none dark:text-gray-300 dark:focus:bg-gray-700 dark:focus:text-gray-300" id="headlessui-disclosure-button-:R17:" type="button" aria-expanded="false" 
            data-headlessui-state="">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                </svg>
            </button>
        </div>
        <div class="hidden relative -translate-x-12 text-center lg:flex lg:items-center">
            <ul class="items-center justify-end flex-1 pt-6 lg:pt-0 list-reset lg:flex">
                <li class="mr-3 nav__item">
                  <a href="/posts" class="inline-block px-4 py-2 text-lg font-normal text-gray-800 no-underline rounded-md dark:text-gray-200 hover:text-indigo-500 focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none">Posts</a>
                </li>
                <li class="mr-3 nav__item">
                  <a href="/forum" class="inline-block px-4 py-2 text-lg font-normal text-gray-800 no-underline rounded-md dark:text-gray-200 hover:text-indigo-500 focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none">Forum</a>
                </li>
            </ul>
        </div>
        <x-mobilenavdropdown />
        <img src="{{url('images/Untitled-1.ico')}}"
          alt=""
          class='h-14 w-14 aspect-square  transition-all cursor-pointer hover:scale-105 hidden lg:block' 
          x-on:click="open = !open" />
        <x-dropdown />
    </nav>
</div>