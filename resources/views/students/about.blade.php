@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])
    <?php
      $file = simplexml_load_file('aboutcont.xml');
      $content1 = $file->content[0];
      ?>
      <!-- Dean's Section -->
      <div class="flex flex-col items-center w-full h-fit relative ">
        <!-- Dean's Information -->
        <div class="flex flex-col justify-around items-center w-full p-6 md:flex-row">
          <img src="{{url('images/'. $file->content[1]->image)}}" class="h-40 w-40 object-contain sm:basis-1/3 sm:h-full max-h-44" alt="" draggable="false">
          <img src="{{url('images/'. $file->content[0]->image)}}" class="h-40 w-40 object-contain sm:basis-1/3 sm:h-full max-h-44" alt="" draggable="false">
        </div>
        <div class="flex flex-col items-center">
          <h2 class="text-4xl font-bold">{{ $content1->value; }}</h2>
        </div>
      </div>

      <hr class="h-0.5 my-2 mx-6 bg-black">

      <!-- Vision, Mission, GO -->
      <div class="p-8">
        <h2 class="text-2xl font-bold">{{ $file->content[2]->value }}</h2>
        <p class="text-xl">{{ $file->content[2]->valuesecond }}</p>

        <h2 class="text-2xl font-bold mt-10">{{ $file->content[3]->value }}</h2>
        <p class="text-xl">{{ $file->content[3]->valuesecond }}</p>

        <h2 class="text-2xl font-bold mt-10">GENERAL OBJECTIVES</h2>
        <ul class="list-disc px-4 text-xl">
          <li>
            <strong class="font-semibold text-gray-900 dark:text-black">{{ $file->content[4]->value }}</strong> 
            {{ $file->content[4]->valuesecond }}
          </li>
          <li>
            <strong class="font-semibold text-gray-900 dark:text-black">{{ $file->content[5]->value }}.</strong> 
            {{ $file->content[5]->valuesecond }}
          </li>
          <li>
            <strong class="font-semibold text-gray-900 dark:text-black">{{ $file->content[6]->value }}.</strong> 
            {{ $file->content[6]->valuesecond }}
          </li>
          <li>
            <strong class="font-semibold text-gray-900 dark:text-black">{{ $file->content[7]->value }}.</strong> 
            {{ $file->content[7]->valuesecond }}
          </li>
        </ul>
      </div>

      <hr class="h-0.5 my-2 mx-6 bg-black">
      
      <h2 class="text-3xl font-bold my-10">COURSES OFFERED</h2>

      <div class="mb-4 p-2">
        <h2 class="text-xl font-bold mb-2">{{ $file->content[8]->value }}</h2>
        <p class="text-md p-2">
          {{ $file->content[8]->valuesecond }}
        </p>
      </div>
      <div class="mb-4 p-2">
        <h2 class="text-xl font-bold mb-2">{{ $file->content[9]->value }}</h2>
        <p class="text-md p-2">
          {{ $file->content[9]->valuesecond }}
        </p>
      </div>
      <div class="mb-4 p-2">
        <h2 class="text-xl font-bold mb-2">{{ $file->content[10]->value }}</h2>
        <p class="text-md p-2">
          {{ $file->content[10]->valuesecond }}
        </p>
      </div>
      <!-- End of middle section's contents -->
  ?>
@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')