@include('partials.__header')
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
          Create an account
        </h1>
        <h3
          class="text-md text-gray-400 mb-2 font-bold self-center"
          id="heading"
        >
          Sign up now and join our community
        </h3>
        <form method="POST" action="/store" class="pt-5 px-20 w-full">
          @csrf
          <div class="flex flex-col">
            <div>
              <label for="name" class="font-bold">Name</label> <br />
              <input
                class="w-full rounded bg-gray-200 mb-2 tracking-wide"
                type="text"
                placeholder="John Dela Cruz"
                name="name"
                id="name"
                required
                value="{{ old('name') }}"
              />
              @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="id" class="font-bold">Student Number</label> <br />
              <input
                class="w-full rounded bg-gray-200 mb-2 tracking-wide"
                type="number"
                placeholder="2023071234"
                name="id"
                id="id"
                value="{{old('id')}}"
                required
              />
              @error('id')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="email" class="font-bold">Email</label> <br />
              <input 
                class="w-full rounded bg-gray-200 mb-2 tracking-wide" 
                type="email" 
                placeholder="you@bulsu.edu.ph" 
                pattern=".+@bulsu.edu.ph"
                name="email" 
                id="email"
                value="{{ old('email') }}"
                required
              />
              @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="password" class="font-bold">Password</label> <br />
              <div class="text-slate-500 font-bold" 
                style="font-size: 0.6rem;">
                Must be at least 8 characters with number, uppercase & lowercase letter
              </div>
              <input 
                class="w-full rounded bg-gray-200 mb-2 tracking-wide" 
                type="password" 
                placeholder="Your password" 
                name="password" 
                id="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                required
              />
              @error('password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="password_confirmation" class="font-bold">Confirm Password</label> <br />
              <input
                class="w-full rounded bg-gray-200 tracking-wide" 
                type="password"
                placeholder="Re-enter password"
                name="password_confirmation"
                id="password_confirmation"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                required
              />
            </div>
            <div class="my-3 flex gap-1 self-center">
              <input type="checkbox" name="checkbox" id="checkbox" required>
              <span>I agree to the</span> <span class="text-blue-600">Terms & Privacy Policy</span>
            </div>
            <button name="submit" class="bg-violet-500 rounded text-white">Sign Up</button>
          </div>
        </form>
        <div class="self-center mt-6 flex gap-1">
          <span>Already have an account?</span><span class="text-blue-600"><a href="login">Login</a></span>
        </div>
      </div>
    </div>
    <!-- left side -->
    <div class="w-3/5 bg-violet-500 flex flex-row">
      <!-- image container -->
      <div class="w-full h-full flex flex-row items-center">
        <div class="w-full h-5/6 bg-contain bg-no-repeat bg-center" 
          style="background-image: url('images/cssp_white.png');"></div> 
      </div>
    </div>
  </div>
</body>

{{-- <script>
  const numberInput = document.getElementById('student_number'); 

  // Prevent navigation with up and down arrow keys
  numberInput.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
      event.preventDefault();
    }
  });
</script> --}}

@include('partials.__footer')