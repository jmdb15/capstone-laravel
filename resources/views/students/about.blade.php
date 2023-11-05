@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])

      <!-- Dean's Section -->
      <div class="flex flex-col items-center w-full h-fit relative ">
        <div class="flex my-4 pt-6 ">
          <h2 class="text-4xl font-bold">CSSP</h2> 
        </div>
        <!-- Dean's Information -->
        <div class="flex flex-col justify-around items-center w-full p-6 md:flex-row">
          <img src="{{url('images/CSSP.png')}}" class="h-40 w-40 object-contain sm:basis-1/3 sm:h-full max-h-44" alt="">
          <div class="flex flex-col items-center">
            <img src="https://lh3.googleusercontent.com/a-/ALV-UjVxxbBynoJaHCqASjZjcjoF2WM1JD9nZRpHsBB8mDRKrL0=s96-p-k-rw-no" class="sm:grow rounded-full max-sm:w-24 max-sm:mt-4 h-24" alt="">
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
      
      <h2 class="text-3xl font-bold my-10">COURSES OFFERED</h2>

      <div class="mb-4 p-2">
        <h2 class="text-xl font-bold mb-2">Bachelor of Science in Social Work</h2>
        <p class="text-md p-2">
          Social Work education in the undergraduate level shall be geared towards the preparation of students for generalist social work practice. Professional education in social work requires the acquisition and application of beginning level of knowledge, attitudes, values and skills in enhancing the social functioning of individuals, families, groups and communities, linking people (client systems) with needed resources, improving the operation of social service delivery networks, and promoting social justice through organizing and advocacy.
        </p>
      </div>
      <div class="mb-4 p-2">
        <h2 class="text-xl font-bold mb-2">Bachelor of Science in Psychology</h2>
        <p class="text-md p-2">
          Psychology is the scientific study of behavior and mental processes. Psychology as a discipline and professional practice contributes to national development through basic and applied research and interventions aimed at solving problem and promoting optimal development and functioning at the individual, family, group, organizations/institutions, community and national levels.
        </p>
      </div>
      <div class="mb-4 p-2">
        <h2 class="text-xl font-bold mb-2">Bachelor in Public Administration</h2>
        <p class="text-md p-2">
          Public Administration is a degree program that prepares people for careers in public administration and governance for the public interest. It is also a formation course for students who want to devout their life to public service in government and civil society.
        </p>
      </div>
      <!-- End of middle section's contents -->

@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')