

<!-- Main modal -->
<div id="report-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Report
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="report-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 relative">
                  <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Please select a problem</p>
                  <ul class="my-4 space-y-3">
                      <li onclick="setReport(this, 'nudity')"  class="cursor-pointer">
                          <a class="reportAnchors flex report-list items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                              <span class="flex-1 ms-3 whitespace-nowrap w-full">Nudity</span>                        </a>
                      </li>
                      <li onclick="setReport(this, 'violence')" class="cursor-pointer">
                          <a class="reportAnchors flex report-list items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                              <span class="flex-1 ms-3 whitespace-nowrap">Violence</span>
                          </a>
                      </li>
                      <li onclick="setReport(this, 'harassment')" class="cursor-pointer">
                          <a class="reportAnchors flex report-list items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                              <span class="flex-1 ms-3 whitespace-nowrap">Harassment</span>
                          </a>
                      </li>
                      <li onclick="setReport(this, 'offensive language')" class="cursor-pointer">
                          <a class="reportAnchors flex report-list items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                              <span class="flex-1 ms-3 whitespace-nowrap">Offensive Language</span>
                          </a>
                      </li>
                      <li onclick="setReport(this, 'nonsense')" class="cursor-pointer">
                          <a class="reportAnchors flex report-list items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                              <span class="flex-1 ms-3 whitespace-nowrap">Nonsense</span>
                          </a>
                      </li>
                  </ul>
                  <div class="text-end">
                      <button onclick="confirmReport()" id="send-rep" data-modal-hide="report-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          Send Report
                      </button>
                      <button data-modal-hide="report-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                  </div>
            </div>
        </div>
    </div>
</div>
