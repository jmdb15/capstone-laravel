<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-slate-800">
   <div class="px-3 py-2 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start">
            <button id="sidebar_button" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
            <a href="/admin" class="flex ml-2 md:mr-24">
               <img src="{{url('images/cssp.png')}}" class="h-10 mr-3" alt="FlowBite Logo" />
               <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-gray-400">CSSP Admin</span>
            </a>
         </div>
         <div class="flex items-center">
            {{-- <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img x-on:click="open = !open" class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900" role="none">
                  CSSP Admin
                </p>
                <!-- <p class="text-sm font-medium text-gray-900 truncate" role="none">
                  neil.sims@flowbite.com
                </p> -->
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div> --}}
         </div>
      </div>
   </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0 bg-white border-r border-gray-200 dark:bg-slate-800 dark:group-hover:text-gray-100" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-slate-800">
      <ul class="space-y-2 font-medium">
         <a href="/admin">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
               </svg>
               <span class="ml-3 dark:text-gray-400 dark:group-hover:text-gray-100">Dashboard</span>
            </li>
         </a>
         <a href="/admin/calendar">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z" />
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Calendar</span>
               {{-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">Pro</span> --}}
            </li>
         </a>
         <a href="/users">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Users</span>
            </li>
         </a>
         <a href="/logs">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Logs</span>
            </li>
         </a>
         <a href="/admin/forum">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
                  <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor" />
                  <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor" />
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Forum</span>
            </li>
         </a>
         <a href="/create-post">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z" />
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Posts</span>
            </li>
         </a>
         <a href="/reports">
            <li class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 hover:text-gray-900 dark:group-hover:bg-gray-200" fill="currentColor" version="1.1" x="0px" y="0px" viewBox="0 0 97 95" enable-background="0 0 30 30">
                  <path d="M50,5C25.2,5,5,25.2,5,50s20.2,45,45,45s45-20.2,45-45S74.8,5,50,5z M50,90c-22.1,0-40-17.9-40-40s17.9-40,40-40  s40,17.9,40,40S72.1,90,50,90z" />
                  <path d="M50,15c-19.3,0-35,15.7-35,35s15.7,35,35,35s35-15.7,35-35S69.3,15,50,15z M50,73.8c-2.1,0-3.8-1.7-3.8-3.8s1.7-3.8,3.8-3.8  s3.8,1.7,3.8,3.8S52.1,73.8,50,73.8z M58.8,35.7c0,1-0.2,2-0.5,3L50,61.3l-8.2-22.6c-0.3-1-0.5-2-0.5-3V35c0-4.8,3.9-8.8,8.8-8.8  s8.8,3.9,8.8,8.8V35.7z" /><text x="0" y="115" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Arthur Shlain</text><text x="0" y="120" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Reports</span>
            </li>
         </a>
         <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:hover:bg-slate-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 group-hover:text-gray-900 dark:group-hover:text-gray-100 dark:group-hover:bg-gray-100" fill="#6B7280" version="1.1" x="0px" y="0px" viewBox="0 0 30 30">
                  <g>
                     <polygon points="11,6 13,2 12,2 10,6  " />
                     <path d="M9,6l2-4H3C2.4477539,2,2,2.4477539,2,3v3H9z M7,3c0.5523071,0,1,0.4476929,1,1S7.5523071,5,7,5   C6.4477539,5,6,4.5523071,6,4S6.4477539,3,7,3z M4,3c0.5523071,0,1,0.4476929,1,1S4.5523071,5,4,5C3.4477539,5,3,4.5523071,3,4   S3.4477539,3,4,3z" />
                     <path d="M30,6V3c0-0.5522461-0.4477539-1-1-1H14l-2,4H30z" />
                     <path d="M20,7v23h9c0.5522461,0,1-0.4477539,1-1V7H20z M28,24.3027344L25,29l-3-4.6972656V12c0-1.6542969,1.3457031-3,3-3   s3,1.3457031,3,3V24.3027344z" />
                     <path d="M25,22.9998169v-9.960022c-0.7429199,0-1.475647,0.2392578-2,0.6958008v9.7878418   c0.5942993-0.3286743,1.2789307-0.5236206,1.999939-0.5236206H25z" />
                     <path d="M26,13.1956177v9.9365845c0.3553467,0.0859375,0.6890259,0.2192993,1,0.3912964v-9.7877808   C26.71698,13.4892578,26.3760376,13.309021,26,13.1956177z" />
                     <path d="M24.999939,12C25.7210083,12,26.4057007,12.1949463,27,12.5236816V12c0-1.1045532-0.8954468-2-2-2s-2,0.8954468-2,2   v0.5236206C23.5942993,12.1949463,24.2789307,12,24.999939,12z" />
                     <path d="M23.322937,24.484375L25,27l1.677063-2.515564C25.7095947,23.894043,24.2904663,23.894043,23.322937,24.484375z" />
                     <path d="M2,7v22c0,0.5522461,0.4477539,1,1,1h16v-1h-4c-0.5522461,0-1-0.4476929-1-1v-1.5854492   c-0.7631836-0.2963867-1.4594727-0.6772461-2.043457-1.1186523l-1.4243774,0.8070679   c-0.4749756,0.269104-1.0779419,0.107605-1.3547974-0.362854l-2.0391235-3.4649048   c-0.2833862-0.4815674-0.1171875-1.1019897,0.3690186-1.3773193l1.4033813-0.7948608   C8.855957,19.7265625,8.8291016,19.362793,8.8291016,19s0.0268555-0.7260742,0.081543-1.1030273l-1.4033813-0.7948608   c-0.4862061-0.2753296-0.6524048-0.895752-0.3690186-1.3773193l2.0391235-3.4649048   c0.2768555-0.470459,0.8798218-0.631958,1.3547974-0.362854l1.4243774,0.8070679   C12.5410156,12.2626953,13.2368164,11.8818359,14,11.5854492V10c0-0.5523071,0.4477539-1,1-1h4V7H2z" />
                     <path d="M15,10v1.9360352c0,0.2119141-0.1360474,0.4008789-0.3391724,0.4716797   c-0.8322144,0.2890625-1.6647949,0.7177734-2.3282471,1.2749023c-0.1643677,0.1381836-0.3982544,0.1577148-0.5839233,0.0527344   l-1.7097168-0.9682617L8,16.2319336l1.7072144,0.9667969c0.1867065,0.1054688,0.2855225,0.3154297,0.2463379,0.5239258   C9.8696289,18.1694336,9.8289185,18.5869141,9.8289185,19s0.0407104,0.8305664,0.1246338,1.2773438   c0.0391846,0.2084961-0.0596313,0.418457-0.2463379,0.5239258L8,21.7680664l2.0389404,3.4648438l1.7097168-0.9682617   c0.1856689-0.1054688,0.4195557-0.0849609,0.5839233,0.0527344c0.6634521,0.5571289,1.4960327,0.9858398,2.3282471,1.2749023   C14.8639526,25.6630859,15,25.8520508,15,26.0639648V28h4v-5.5564575C18.399231,22.7880859,17.7102051,23,16.9660645,23   c-2.243042,0-4.0679321-1.7944336-4.0679321-4s1.8248901-4,4.0679321-4C17.7102051,15,18.399231,15.2119141,19,15.5564575V10H15z" />
                     <path d="M17,16c-1.6568604,0-3,1.3431396-3,3s1.3431396,3,3,3c0.7718506,0,1.4683838-0.2996826,2-0.7785645v-4.4428711   C18.4683838,16.2996826,17.7718506,16,17,16z" />
                  </g>
               </svg>
               <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">CMS</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
               </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
               <li>
                  <a href="/edit-cb" class="flex items-center text-xs w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-100 dark:hover:bg-slate-700">Chatbot</a>
               </li>
               <li>
                  <a href="/admin/faculty" class="flex items-center text-xs w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-100 dark:hover:bg-slate-700">Faculty</a>
               </li>
               <li>
                  <a href="/admin/about" class="flex items-center text-xs w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-100 dark:hover:bg-slate-700">About</a>
               </li>
            </ul>
         </li>
         <form action="/logout" method="POST">
            @csrf
            <li>
               <button type="submit" class="w-full">
                  <a class="flex items-center justify-start p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:hover:bg-slate-700">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                     </svg>
                     <span class="flex-1 mr-28 whitespace-nowrap dark:text-gray-400 dark:group-hover:text-gray-100">Sign Out</span>
                  </a>
               </button>
            </li>
         </form>
         {{-- <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
            </a>
         </li> --}}
         {{-- <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
            </a>
         </li> --}}
      </ul>
   </div>
</aside>