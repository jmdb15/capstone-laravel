@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

  <h2 class="w-full text-center text-3xl font-bold m-4">Official and Staff</h2>
      <div class="flex flex-wrap p-0 m-4 justify-around">
        <!-- Item 1 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Jorge S. Arellano</h4>
            <p>College Secretary</p>
          </div>
        </div>
        <!-- Item 2 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Agnes DR. Crisostomo, Ph. D.</h4>
            <p>Department Head, Psychology Department</p>
          </div>
        </div>
        <!-- Item 3 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Marissa R. Enriquez</h4>
            <p>Department Head, Public Administration Department</p>
          </div>
        </div>
        <!-- Item 4 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Catherine L. Roxas</h4>
            <p>Department Head, Social Sciences Department</p>
          </div>
        </div>
        <!-- Item 5 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Sherwin M. Pariñas</h4>
            <p>Department Head, Philosophy and Humanities</p>
          </div>
        </div>
        <!-- Item 6 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Eduardo G. Valcos, Ph. D.</h4>
            <p>Research & Values Formation Coordinator</p>
          </div>
        </div>
        <!-- Item 7 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Rafael R. Baesa</h4>
            <p>Extension Coordinator</p>
          </div>
        </div>
        <!-- Item 8 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Maria Pretty Lay Abdala</h4>
            <p>Maria Pretty Lay Abdala</p>
          </div>
        </div>
        <!-- Item 9 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Eva Jennelyn Galang</h4>
            <p>College Clerk</p>
          </div>
        </div>
        <!-- Item 10 -->
        <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4 rounded-full" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Jaybee Christian Bernardo</h4>
            <p>College Custodian</p>
          </div>
        </div>
      </div>


      @foreach ($data as $category => $departments)
        <h1 class="text-4xl font-bold text-center text-white bg-violet-400 w-full py-2 mb-4">{{$category}}</h1>

        @foreach ($departments as $department => $instructors)
          <h4 class="text-xl font-bold text-center">{{$department}}</h4>
          <div class="flex flex-wrap p-0 m-4 justify-around">

            @foreach ($instructors as $instructor)

              <div class="flex bg-gray-100 rounded-lg h-28 shadow-lg p-6 my-3 min-w-[220px] max-w-sm basis-full md:basis-1/2">
                <img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" class="mr-4 rounded-full" alt="">
                <div class="flex flex-col justify-around">
                  <h4 class="text-xl font-medium">{{$instructor->name}}</h4>
                  <p class="font-normal text-gray-600">{{($instructor->email == '') ? $instructor->name.'@bulsu.edu.ph' : $instructor->email}}</p>
                </div>
              </div>

            @endforeach
          </div>
        @endforeach
      @endforeach

@include('partials.__notifications')
@include('partials.__footer')