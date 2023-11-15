<div x-show="open"
  id="nav-dropdown"
  class='absolute top-[69px] right-4 h-max w-32 py-2 px-2 bg-neutral-700 text-center rounded-md transition-all  z-20'>
    <ul>
      @auth
        <li class='text-white mb-1 py-2 px-7 border-b-neutral-400 rounded-md cursor-pointer hover:backdrop-brightness-200 hover:brightness-110'>
          <a href="/profile/{{auth()->user()->id}}">
            Profile
          </a>
        </li>
        <form action="/logout" method="POST">
          @csrf
          <li class='text-white mb-1 py-2 px-7 border-b-neutral-400 rounded-md cursor-pointer hover:backdrop-brightness-200 hover:brightness-110'>
            <button>
              Logout
            </button>
          </li>
        </form>
      @else
        <li class='text-white mb-1 py-2 px-7 border-b-neutral-400 rounded-md cursor-pointer hover:backdrop-brightness-200 hover:brightness-110'>
          <a href="/login">
            Login
          </a>
        </li>
        <li class='text-white mb-1 py-2 px-7 border-b-neutral-400 rounded-md cursor-pointer hover:backdrop-brightness-200 hover:brightness-110'>
          <a href="/signup">
            Signup
          </a>
        </li>
      @endauth
    </ul>
  </div>