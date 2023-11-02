@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])

<!-- Insert middle section's contents here -->

      <!-- Dean's Section -->
      <div class="flex flex-col items-center w-full h-fit relative ">
        <!-- Edit Button -->
        {{-- <button data-open-modal class="px-4 py-2 text-white rounded-md hidden absolute bg-green-600 left-16 top-9 hover:bg-green-500 md:block">Edit</button> --}}
        <!-- Page Title -->
        <div class="flex my-4 pt-6 ">
          {{-- <span class="text-2xl p-1 bg-black rounded-full mx-2">❕</spa>
          <h2 class="text-3xl font-bold">ABOUT CSSP</h2> --}}
          <h2 class="text-4xl font-bold">CSSP</h2> 
        </div>
        <!-- Dean's Information -->
        <div class="flex flex-col justify-around items-center w-full p-6 md:flex-row">
          {{-- <button data-open-modal class="px-4 py-2 mb-4 text-white rounded-md bg-green-600 hover:bg-green-500 md:hidden">Edit</button> --}}
          <img src="{{url('images/CSSP.png')}}" class="h-40 w-40 object-contain sm:basis-1/3 sm:h-full max-h-44" alt="">
          <div class="flex flex-col items-center">
            <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="sm:grow max-sm:w-24 max-sm:mt-4 h-24" alt="">
            <h3 class="text-2xl font-bold basis-1/3 text-center">Sherwin M. Parinas</h3>
            <p class="text-xl basis-2/3 text-center">Dean, College of Social Sciences and Philosophy</p>
          </div>
        </div>
      </div>

      <hr class="h-0.5 my-2 mx-6 bg-black">

      <!-- Vision, Mission, GO -->
      <div class="p-8">
        <h2 class="text-2xl font-bold">VISION</h2>
        <p class="text-xl">The College os the outstanding unit in the University in terms of customer-driven program offerings that capacitate students
          who will become the leaders in their chosen professions.
        </p>

        <h2 class="text-2xl font-bold mt-10">MISSION</h2>
        <p class="text-xl">The College wholeheartedly assumes the responsibility of ensuring the formation of students with sound character and technical competence
          who are supremely capable of meeting the challenges of industries, academe, LGUs, and communities.
        </p>

        <h2 class="text-2xl font-bold mt-10">GENERAL OBJECTIVES</h2>
        <ul class="list-disc px-4 text-xl">
          <li>Quality and Excellence. The College shall undertake instruction, research and extension towards generation
            of advanced knowledge.
          </li>
          <li>Relevance and Responsiveness. The College offers academic programs with integrative and responsive instruction,
            research and public service for national development and global engagement.
          </li>
          <li>Access and Equity. The College adopts democratic admission policies to allow broadened access to deserving
            students for higher education opportunities.
          </li>
          <li>Efficiency and Effectiveness. The College implements quality management system on the use
            of resouces to facilitate realization of objectives.
          </li>
        </ul>
      </div>

      <hr class="h-0.5 my-2 mx-6 bg-black">

      <h2 class="w-full text-center text-3xl font-bold m-4">Official and Staff</h2>
      <div class="flex flex-wrap p-0 m-4 justify-around">
        <!-- Item 1 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Jorge S. Arellano</h4>
            <p>College Secretary</p>
          </div>
        </div>
        <!-- Item 2 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Agnes DR. Crisostomo, Ph. D.</h4>
            <p>Department Head, Psychology Department</p>
          </div>
        </div>
        <!-- Item 3 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Marissa R. Enriquez</h4>
            <p>Department Head, Public Administration Department</p>
          </div>
        </div>
        <!-- Item 4 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Catherine L. Roxas</h4>
            <p>Department Head, Social Sciences Department</p>
          </div>
        </div>
        <!-- Item 5 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Sherwin M. Pariñas</h4>
            <p>Department Head, Philosophy and Humanities</p>
          </div>
        </div>
        <!-- Item 6 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Eduardo G. Valcos, Ph. D.</h4>
            <p>Research & Values Formation Coordinator</p>
          </div>
        </div>
        <!-- Item 7 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Rafael R. Baesa</h4>
            <p>Extension Coordinator</p>
          </div>
        </div>
        <!-- Item 8 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Maria Pretty Lay Abdala</h4>
            <p>Maria Pretty Lay Abdala</p>
          </div>
        </div>
        <!-- Item 9 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Eva Jennelyn Galang</h4>
            <p>College Clerk</p>
          </div>
        </div>
        <!-- Item 10 -->
        <div class="flex h-28 basis-1/2 shadow-lg p-6 my-3 min-w-[220px] max-w-sm">
          <img src="https://avatars.dicebear.com/api/initials/avatar.svg" class="mr-4" alt="">
          <div class="flex flex-col justify-around">
            <h4 class="text-xl">Jaybee Christian Bernardo</h4>
            <p>College Custodian</p>
          </div>
        </div>
      </div>

      <!-- End of middle section's contents -->

@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')