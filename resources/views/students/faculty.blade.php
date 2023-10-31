@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

  {{-- <h2 class="w-full text-center text-3xl font-bold m-4">Official and Staff</h2> --}}

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