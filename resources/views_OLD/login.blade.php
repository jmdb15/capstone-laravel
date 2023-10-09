@include('partials.__header', ['title' => 'Student End'])
  <div class="flex h-screen">
    <!-- right side -->
    <div class="w-2/5 absolute inset-y-0 right-0">
      <!-- content -->
      <div class="flex flex-col items-start font-montserrat  mt-20">
        <!-- heading -->
        <h1
          class="text-3xl font-raleway font-bold self-center"
          id="heading"
        >
          Welcome to RAJAH
        </h1>
        <h3
          class="text-md text-gray-400 mb-2 font-bold self-center"
          id="heading"
        >
        Be the first to know - log in for community updates
        </h3>
        <form method="POST" action="/login/process" class="pt-5 px-20 w-full">
          @csrf
          @error('email')
            <p class="text-red-500 text-sm mt-2 text-center mb-0">{{ $message }}</p>
          @enderror
          <div class="flex flex-col">
            <div>
              <label for="email" class="font-bold">Email</label> <br />
              <input 
                class="w-full mb-2 rounded bg-gray-200 tracking-wide text-sm border-solid border-2 border-black" 
                type="email" 
                placeholder="Enter your bulsu email" 
                name="email" 
                id="email"
                value="{{ old('email') }}"
                pattern=".+@bulsu.edu.ph"
                required
              />
            </div>
            <div>
              <label for="password" class="font-bold">Password</label> <br />
              <input 
                class="w-full mb-2 rounded bg-gray-200 tracking-wide text-sm border-solid border-2 border-black" 
                type="password" 
                placeholder="Enter your password" 
                name="password" 
                id="password" 
                required
              />
            </div>
            <div class="my-3 flex gap-1">
              <input type="checkbox" name="checkbox" id="checkbox" class="cursor-pointer">
              <span>Remember me</span> <span class="flex-grow"></span> <span class="text-blue-600 cursor-pointer">Forgot Password?</span>
            </div>
            <button type="submit" class="bg-violet-500 rounded text-white py-3">Login</button>
          </div>
        </form>
        <div class="self-center mt-6 flex gap-1">
          <span>Don't have an account?</span><span class="text-blue-600"><a href="/signup">Sign Up</a></span>
        </div>
      </div>
    </div>
    <!-- left side -->
    <div class="w-3/5 bg-violet-500 flex flex-row">
      <!-- image container -->
      <div class="w-full h-full flex flex-row items-center">
        <div class="w-full h-5/6 bg-contain bg-no-repeat bg-center" 
          style="background-image: url({{url('images/cssp_white.png')}});"></div> 
      </div>
    </div>
  </div>
@include('partials.__footer')