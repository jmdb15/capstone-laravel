@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])
    <?php
      $file = simplexml_load_file('aboutcont.xml');
      ?>
      <!-- Dean's Section -->
      <div class="flex flex-col items-center w-full h-fit relative ">
        <div class="flex flex-col items-center">
          <h2 class="text-4xl font-bold">College of Social Sciences and Philosophy</h2>
          <p class="text-xl basis-2/3 text-center">(CSSP)</p>
        </div>
        <!-- Dean's Information -->
        <div class="flex flex-col justify-around items-center w-full p-6 md:flex-row">
          <img src="{{url('images/BulSU.png')}}" class="h-40 w-40 object-contain sm:basis-1/3 sm:h-full max-h-44" alt="">
          <img src="{{url('images/CSSP.png')}}" class="h-40 w-40 object-contain sm:basis-1/3 sm:h-full max-h-44" alt="">
        </div>
      </div>

      <hr class="h-0.5 my-2 mx-6 bg-black">

      <!-- Vision, Mission, GO -->
      <div class="p-8">
        <h2 class="text-2xl font-bold">VISION</h2>
        <p class="text-xl">Bulacan State University is a progressive knowledge-generating institution globally recognized for excellent instruction, pioneering research, and responsive community engagements
        </p>

        <h2 class="text-2xl font-bold mt-10">MISSION</h2>
        <p class="text-xl">Bulacan State University exists to produce highly competent, ethical and service-oriented professionals that contribute to the sustainable socio-economic growth and development of the nation
        </p>

        <h2 class="text-2xl font-bold mt-10">GENERAL OBJECTIVES</h2>
        <ul class="list-disc px-4 text-xl">
          <li><strong class="font-semibold text-gray-900 dark:text-black">Quality and Excellence.</strong> Promoting quality and relevant educational programs that meet international standards.
          </li>
          <li><strong class="font-semibold text-gray-900 dark:text-black">Relevance and Responsiveness.</strong> Generation and dissemination of knowledge in the broad range of disciplines relevant and responsive to the dynamically changing domestic and international environments.
          </li>
          <li><strong class="font-semibold text-gray-900 dark:text-black">Access and Equity.</strong> Broadening the access of deserving and qualified students to educational opportunities.
          </li>
          <li><strong class="font-semibold text-gray-900 dark:text-black">Efficiency and Effectiveness.</strong> Optimizing of social, institutional and individual returns and benefits derived from the utilization of higher education resources.
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
  ?>
@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')