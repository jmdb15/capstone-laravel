@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/avatar.svg';
@endphp
<main class="h-full w-full px-1 max-w-1920 flex justify-between fixed md:px-0">

  <section id="left" class="h-[calc(100%-70px)] mt-[70px] min-w-[294px] max-w-[294px] basis-1/4 overflow-hidden hover:overflow-auto hidden md:block">
    <!-- Sidebar Navigations -->
    @if (auth()->user())
      <a href="/profile/{{auth()->user()->id}}" class="hover:bg-gray-300 rounded-md">
        <div class="flex items-center h-8 m-4">
          <img src="{{auth()->user()->image ? asset('storage/student/thumbnail/'.auth()->user()->image) : $def_profile}}" alt="Profile" class="h-12 rounded-full mr-2">
          <h2 class="text-lg font-bold">{{auth()->user()->name}}</h2>
        </div>
      </a>
    @else
      <div class="flex items-center h-8 m-4">
        <img src="{{$def_profile}}" alt="Profile" class="h-12 rounded-full mr-2">
        <h2 class="text-lg font-bold">Guest</h2>
      </div>
    @endif
    <ul class="cursor-pointer">
      <a href="/orgs">
        <li class="flex items-center w-full p-2 pl-6 h-12 transition-all hover:bg-gray-400 hover:text-white rounded-md">
          <span class="iconify" data-icon="ic:round-group-work" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
          Organizations
        </li>
      </a>
      <a href="/calendar">
        <li class="flex items-center w-full p-2 pl-6 h-12 transition-all hover:bg-gray-400 hover:text-white rounded-md">
          <span class="iconify" data-icon="iconamoon:calendar-2" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
          Calendar of Events
        </li>
      </a>
      <a href="/faculty">
        <li class="flex items-center w-full p-2 pl-6 h-12 transition-all hover:bg-gray-400 hover:text-white rounded-md">
          <span class="iconify" data-icon="ic:round-group" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
          CSSP Faculty
        </li>
      </a>
      <a href="/about">
        <li class="flex items-center w-full p-2 pl-6 h-12 transition-all hover:bg-gray-400 hover:text-white rounded-md">
          <span class="iconify" data-icon="mdi:about" style="color: black; padding-right: 10px;" data-width="30" data-height="30"></span>
          About CSSP
        </li>
      </a>
    </ul>
    <hr class="m-2 rounded-sm bg-gray-500">
    <img src="../../images/cssp_white.png" class="w-auto px-6" alt="">
  </section>

  @if ($show)
    <section id="mid" class="h-[calc(100%-70px)] mt-[70px] overflow-y-scroll flex flex-col relative items-center basis-full md:basis-2/3 lg:basis-1/2 px-0 pt-2 md:pt-4 lg:pt-6"
      x-data="{show:false}">
  @endif