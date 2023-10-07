<div class="fixed top-0 left-0 z-[48] pt-4 bg-slate-300 h-screen w-2/3 text-center lg:hidden items-center justify-center" x-show="openMobile">
    <div class="pl-4 flex flex-wrap items-center justify-start w-full lg:w-auto">
        <a href="/" class="flex items-center space-x-2 text-2xl font-medium text-indigo-500 dark:text-gray-100">
            <img alt="logo" src="{{ url('images/Untitled-1.ico') }}" class="h-14 w-14 aspect-square" width="36" height="36" decoding="async" data-nimg="1" loading="lazy" style="color:transparent" />
        </a>
        <h2 class="text-xl ml-3">TALK to RAJAH</h2>
    </div>
    <ul class="items-center justify-center flex-1 pt-6  lg:pt-0 list-reset lg:flex">
        <a href="/posts" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                News Feed
            </li>
        </a>
        <a href="/forum" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                Forum
            </li>
        </a>
        <a href="/notifications" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                Notifications
            </li>
        </a>
        <a href="/orgs" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                Organizations
            </li>
        </a>
        <a href="/calendar" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                Calendar
            </li>
        </a>
        <a href="/faculty" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                CSSP Faculty
            </li>
        </a>
        <a href="/about" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                About
            </li>
        </a>
        <a href="/profile/{{auth()->user()->id}}" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                Profile
            </li>
        </a>
        <a href="/logout" >
            <li class="mr-3 px-4 py-3 nav__item hover:bg-slate-600 hover:text-white">
                Logout
            </li>
        </a>
    </ul>
</div>