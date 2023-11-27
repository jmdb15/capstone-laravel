@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

  <h2 class="w-full text-center text-3xl font-bold m-4">Official and Staff</h2>
  <div class="flex bg-gray-100 rounded-lg h-24 shadow-lg p-1.5 my-1 mx-auto min-w-[200px] max-w-sm basis-full md:basis-[47.7%]">
    <img src="{{ strpos($file->staff[0]->image, 'http') !== false ? $file->staff[0]->image : asset('storage/faculty/'.$file->staff[0]->image) }}" class="mr-4 rounded-full p-2 w-20 h-20" alt="" onerror="handleImgError(this)">
    <div class="flex flex-col justify-around -ml-2">
      <h4 class="text-lg">{{ $file->staff[0]->name }}</h4>
      <p class="text-xs text-gray-500 italic">{{ $file->staff[0]->position }}</p>
    </div>
  </div>
  <div class="flex flex-wrap justify-around">
    @foreach ($file as $staff)
    @if (strpos($staff->position, 'Dean') !== false)
      @php continue; @endphp
    @endif
      <div class="flex bg-gray-100 rounded-lg h-24 shadow-lg p-1.5 my-1 min-w-[200px] max-w-sm basis-full md:basis-[47.7%]">
        <img src="{{ strpos($staff->image, 'http') !== false ? $staff->image : asset('storage/faculty/'.$staff->image) }}" class="mr-4 rounded-full p-2" alt="">
        <div class="flex flex-col justify-around -ml-2">
          <h4 class="text-lg">{{ $staff->name }}</h4>
          <p class="text-xs text-gray-500 italic">{{ $staff->position }}</p>
        </div>
      </div>
    @endforeach
  </div>
  


  @foreach ($data as $category => $departments)
    <h1 class="text-4xl font-bold text-center text-white bg-violet-400 w-full py-2 mb-4">{{$category}}</h1>

    @foreach ($departments as $department => $instructors)
      <h4 class="text-lg font-bold text-center">{{$department}}</h4>
      <div class="flex flex-wrap p-0 m-4 justify-around">

        @foreach ($instructors as $instructor)

          <div class="flex bg-gray-100 rounded-lg h-24 shadow-lg py-1.5 my-3 min-w-[200px] max-w-md basis-full md:basis-[47.7%]">
            <img src="{{($instructor->image == '') ? 'https://avatars.dicebear.com/api/initials/avatar.svg' : $instructor->image}}" class="mr-4 p-2 rounded-full" alt="">
            <div class="-ml-4 flex flex-col justify-around">
              <h4 class="text-lg font-medium">{{$instructor->name}}</h4>
              <p class="font-normal text-xs xl:text-md italic text-gray-500 break-words">{{($instructor->email == '') ? $instructor->name.'@bulsu.edu.ph' : $instructor->email}}</p>
            </div>
          </div>

        @endforeach
      </div>
    @endforeach
  @endforeach

@include('partials.__notifications')
@include('partials.__footer')