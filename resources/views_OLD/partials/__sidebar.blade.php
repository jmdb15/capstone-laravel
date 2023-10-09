@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/'.auth()->user()->name.'.svg';
@endphp
<main class="max-w-1920 mx-auto w-screen flex flex-col sm:flex-row relative">

  <section id="left" class="relative hidden m-0 h-auto w-[300px] max-w-sm md:block lg:basis-1/4">
    <div class="hidden md:flex flex-col fixed w-inherit bg-gray-200 top-[70px] left-0 max-w-full">
      <!-- Sidebar Navigations -->
        <a href="/profile/{{auth()->user()->id}}" class="hover:bg-gray-300 rounded-md">
          <div class="flex items-center h-8 m-4">
            <img src="{{auth()->user()->image ? asset('storage/student/thumbnail/'.auth()->user()->image) : $def_profile}}" alt="Profile" class="h-10 rounded-full mr-2">
            <h2 class="text-lg font-bold">{{auth()->user()->name}}</h2>
          </div>
        </a>
        <ul class="cursor-pointer">
          <a href="/orgs">
            <li class="flex items-center w-full p-2 pl-6 h-14 transition-all hover:bg-violet-500 hover:text-white rounded-md">
              <span class="iconify" data-icon="ic:round-group-work" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
              Organizations
            </li>
          </a>
          <a href="/calendar">
            <li class="flex items-center w-full p-2 pl-6 h-14 transition-all hover:bg-violet-500 hover:text-white rounded-md">
              <span class="iconify" data-icon="iconamoon:calendar-2" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
              Calendar of Events
            </li>
          </a>
          <li class="flex items-center w-full p-2 pl-6 h-14 transition-all hover:bg-violet-500 hover:text-white rounded-md">
            <span class="iconify" data-icon="ic:round-group" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
            CSSP Faculty
          </li>
          <a href="/about">
            <li class="flex items-center w-full p-2 pl-6 h-14 transition-all hover:bg-violet-500 hover:text-white rounded-md">
              <span class="iconify" data-icon="mdi:about" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
              About CSSP
            </li>
          </a>
        </ul>
        <hr class="m-4 rounded-sm bg-gray-500">
        <img src="../../images/cssp_white.png" class="w-auto p-4" alt="">
      </div>
  </section>

{{-- <main class="w-screen flex flex-col sm:flex-row max-w-1920 mx-auto">
  <section id="left" class="hidden fixed top-[70px] left-0 bg-gray-100 flex-col m-0 h-auto w-auto max-w-xs md:flex">
    <!-- Sidebar Navigations -->
      <div class="flex items-center h-8 m-4 ">
      <span class="iconify" data-icon="gg:profile" style="color: #561D5E; padding-right: 20px;" data-width="50" data-height="50"></span>
        <h2 class="text-lg font-bold">{{auth()->user()->name}}</h2>
      </div>
      <ul class="cursor-pointer">
        <a href="/orgs">
          <li class="flex items-center w-full p-2 pl-6 hover:bg-violet-700 hover:text-white">
            <span class="iconify" data-icon="ic:round-group-work" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
            Organizations
          </li>
        </a>
        <a href="/calendar">
          <li class="flex items-center w-full p-2 pl-6 hover:bg-violet-700 hover:text-white">
            <span class="iconify" data-icon="iconamoon:calendar-2" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
            Calendar of Events
          </li>
        </a>
        <li class="flex items-center w-full p-2 pl-6 hover:bg-violet-700 hover:text-white">
          <span class="iconify" data-icon="ic:round-group" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
          CSSP Faculty
        </li>
        <a href="/about">
          <li class="flex items-center w-full p-2 pl-6 hover:bg-violet-700 hover:text-white">
            <span class="iconify" data-icon="mdi:about" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
            About CSSP
          </li>
        </a>
      </ul>
      <hr class="m-4 rounded-sm bg-gray-500">
      <img src="../../images/cssp_white.png" class="w-auto p-4" alt="">
  </section> --}}