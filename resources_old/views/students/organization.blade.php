@include('partials.__header')
@include('partials.__navbar')

<main class="w-screen flex flex-col sm:flex-row max-w-1920 mx-auto">

  <section id="left" class="hidden fixed top-[70px] left-0 bg-gray-100 flex-col m-0 max-w-sm md:flex lg:basis-1/4">
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
  </section>

{{-- MIDDLE SECTION --}}
<section id="mid" class="grid place-items-center grow md:basis-2/3 h-fit pt-10 mx-[384px] px-8" x-data="{show:false}"></section>

{{-- Notification --}}
  <section id="right" class="hidden fixed top-[70px] right-0 px-4 max-w-sm basis-1/4 lg:block bg-gray-400">
    <!-- title -->
    <div class="flex item-center justify-center w-full py-4 m-0">
      <img src="{{url('images/Untitled-1.ico')}}" class="h-12 rounded-full" alt="">
      <p class="text-2xl ml-2">Notifications</p>
    </div>
    <!-- items -->
    <div class="flex flex-col px-2 mt-4">
      <!-- first item -->
      <div class="cursor-pointer flex h-16 my-4">
        <img src="{{url('images/Untitled-1.ico')}}" class="h-full rouded-full mx-3" alt="">
        <div class="flex flex-col">
          <h2 class="font-bold">Sample Org Name</h2>
          <p>Sample Event🎺</p>
        </div>
      </div>
      <div class="cursor-pointer flex h-16 ">
        <img src="{{url('images/Untitled-1.ico')}}" class="h-full rouded-full mx-3" alt="">
        <div class="flex flex-col">
          <h2 class="font-bold">Sample Org Name</h2>
          <p>Sample Event</p>
        </div>
      </div>
    </div>
  </section>

</main>

@include('partials.__footer')