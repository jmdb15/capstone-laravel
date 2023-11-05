
<!-- Modal toggle -->


<!-- Main modal -->
<div id="authentication-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900" id="modaltype"></h3>
                <form class="space-y-6"  id="create_event" method="POST">
                  @csrf
                    <input type="hidden" name="eventid" id="eventid">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title: </label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Sample" required onkeyup="observe()">
                    </div>
                    <div>
                      <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description: </label>
                      <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="..." required onkeyup="observe()"></textarea>
                    </div>
                    <div class="flex flex-col items-center justify-between" >
                      <div class="flex items-center border-2 border-gray-400 rounded-lg px-2 w-full">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                        <input type="text" name="start" id="startpicker" placeholder="Start" class="pl-2 outline-none border-none focus:outline-none active:outline-none w-full" required onchange="observe()">
                      </div>
                      <span class="text-lg">to</span>
                      <div class="flex items-center border-2 border-gray-400 rounded-lg px-2 w-full">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                        <input type="text" name="end" id="endpicker" placeholder="End" class="pl-2 outline-none border-none focus:outline-none active:outline-none w-full" required  onchange="observe()">
                      </div>
                    </div>
                    <div class="flex" id="foredit">
                      <button type="submit" name="action" value="update" class="w-full mb-2 text-white bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-gray-500 disabled:hover:bg-gray-500 disabled:cursor-not-allowed" data-modal-hide="authentication-modal" id="forupdate">Update</button>
                      <button type="submit" name="action" value="delete" class="w-full text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-hide="authentication-modal">Delete</button>
                    </div>
                    <button id="forcreate" name="action" type="submit" value="create" class="w-full text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer disabled:bg-gray-500 disabled:hover:bg-gray-500 disabled:cursor-not-allowed" data-modal-hide="authentication-modal" disabled >Create</button>
                </form>
            </div>
        </div>
    </div>
</div> 
