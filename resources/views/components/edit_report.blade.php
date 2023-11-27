<!-- Edit user modal -->
          <div id="editUserModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center hidden justify-center w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative w-full max-w-2xl max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <!-- Modal header -->
                      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                              Report
                          </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserModal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-6 space-y-6">
                          <div class="flex flex-col">
                              <div class="flex justify-between">
                                <div class="flex items-center justify-start relative pt-6 basis-1/2">
                                  <div class="absolute -top-3 left-1/2 -translate-x-1/2 text-lg text-gray-800 dark:text-gray-100">Sender</div>
                                  <img class="w-10 h-10 rounded-full" src="{{$default_img}}" alt="image" id="sender-image">
                                  <div class="ps-3">
                                      <div class="text-base font-semibold dark:text-gray-100" id="sender-name"></div>
                                      <div class="font-normal text-gray-500 dark:text-gray-300" id="sender-email"></div>
                                  </div>  
                                </div>
                                <div class=" flex items-center justify-start relative pt-6 basis-1/2">
                                  <div class="absolute -top-3 left-1/2 -translate-x-1/2 text-lg text-gray-800 dark:text-gray-100">Offender</div>
                                  <img class="w-10 h-10 rounded-full" src="{{$default_img}}" alt="image" id="offender-image">
                                  <div class="ps-3">
                                      <div class="text-base font-semibold dark:text-gray-100" id="offender-name"></div>
                                      <div class="font-normal text-gray-500 dark:text-gray-300" id="offender-email"></div>
                                  </div>  
                                </div>
                              </div>
                              <hr class="border-2 border-gray-600 rounded-md my-6">
                              <div class="flex flex-col">
                                <h2 class="text-gray-800 dark:text-gray-100 text-xl font-bold" id="report-content">Content is here.</h2>
                                <div class="flex flex-col">
                                  <p class="text-gray-800 dark:text-white my-2" id="rep-content-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquid sit possimus in? Eos iste ullam earum reiciendis? Eaque, totam.</p>
                                  <img src="{{$default_img}}" alt="" id="rep-content-img" class="hidden max-h-[364px] mx-auto">
                                </div>
                              </div>

                          </div>
                      </div>
                      <!-- Modal footer -->
                      <div class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                          <button id="take-action" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Take Action</button>
                          <button class="text-gray-800 bg-transparent border-2 border-gray-600 dark:border-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-gray-100">Close</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>