<div class="fixed top-0 left-0 z-[48] pt-4 bg-slate-300 h-screen w-2/3 text-center lg:hidden items-center justify-center" x-show="openMobile">
    <div class="pl-4 flex flex-wrap items-center justify-start w-full lg:w-auto">
        <a href="/" class="flex items-center space-x-2 text-2xl font-medium text-indigo-500">
            <img alt="logo" src="{{ url('images/CSSP.png') }}" class="h-14 w-14 aspect-square" width="36" height="36" decoding="async" data-nimg="1" loading="lazy" style="color:transparent" />
        </a>
        <h2 class="text-xl ml-3">TALK to RAJAH</h2>
    </div>
    <ul class="items-center justify-center flex-1 pt-6  lg:pt-0 list-reset lg:flex">
        <a href="/posts" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
               <img src="{{ url('images/icons/blog-text.png') }}" alt="" class="w-5 h-4 aspect-square">News Feed
            </li>
        </a>
        <a href="/forum" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                <img src="{{ url('images/icons/messages-question.png') }}" alt="" class="w-5 h-4 aspect-square"> Forum
            </li>
        </a>
        <a href="/notifications" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                <img src="{{ url('images/icons/bell.png') }}" alt="" class="w-4 h-4 ml-1 aspect-square"> Notifications
            </li>
        </a>
        <a href="/orgs" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                <img src="{{ url('images/icons/users-alt.png') }}" alt="" class="w-5 h-4 aspect-square"> Organizations
            </li>
        </a>
        <a href="/calendar" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                <img src="{{ url('images/icons/calendar.png') }}" alt="" class="w-5 h-4 aspect-square"> Calendar
            </li>
        </a>
        <a href="/faculty" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                <img src="{{ url('images/icons/chalkboard-user.png') }}" alt="" class="w-5 h-4 aspect-square"> CSSP Faculty
            </li>
        </a>
        <a href="/about" >
            <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                <img src="{{ url('images/icons/info.png') }}" alt="" class="w-4 h-4 aspect-square"> About
            </li>
        </a>
        @if (auth()->user())
            <a href="/profile/{{auth()->user()->id}}" >
                <li class="mr-3 px-4 py-3 flex gap-x-2 items-center nav__item hover:bg-slate-600 hover:text-white">
                    <img src="{{ url('images/icons/user.png') }}" alt="" class="w-5 h-4 aspect-square"> Profile
                </li>
            </a>
        @endif
        <form action="/logout" method="POST">
            @csrf
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                <button type="submit" class="flex gap-x-2 items-center">
                    <img src="{{ url('images/icons/sign-out-alt.png') }}" alt="" class="w-5 h-4 aspect-square"> Logout
                </button>
            </li>
        </form>
    </ul>
</div>