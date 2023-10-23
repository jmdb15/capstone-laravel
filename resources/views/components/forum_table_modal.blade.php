<div id="table-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-fit max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow overflow-x-auto">
            <!-- Modal header -->
            <div class="flex items-center justify-center p-3 border-b rounded-t">
                <h3 class="text-2xl font-bold text-gray-900" id="fortitle">
                    Small modal
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
              {{-- table --}}
                <table class="w-full text-sm text-left text-gray-500">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              Name
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Comment
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Date
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Action
                          </th>
                      </tr>
                  </thead>
                  {{-- Table body --}}
                  <tbody id="tboy">
                  </tbody>
                </table>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b">
                {{-- <button data-modal-hide="table-modal" type="button" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-100 focus:z-10">Okay</button> --}}
                <button data-modal-hide="table-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Close</button>
            </div>
        </div>
    </div>
</div>