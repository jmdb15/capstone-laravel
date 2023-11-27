
<!-- Main modal -->
<div
  id="edit-official-modal" 
  data-modal-backdrop="static"
  tabindex="-1" 
  aria-hidden="true" 
  class="fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full hidden">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-official-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Faculty</h3>
                <form class="space-y-6" action="/edit-official" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="off-name">Upload file</label>
                        <input onchange="queryUpload('edit', 'off', this)" name="image" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="off-name" type="file">
                    </div>
                    <div class="w-[60%] mx-auto mt-4">
                        <img id="img_upload_area_off_edit" alt="" class="hidden mx-auto max-h-[364px]">
                    </div>
                    <div>
                        <label for="off-edit-fullname" class="block mb-2 text-sm font-medium text-gray-900">Name: </label>
                        <input type="text" name="off-edit-fullname" id="off-edit-fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="off-edit-position" class="block mb-2 text-sm font-medium text-gray-900">Position: </label>
                        <input type="text" name="off-edit-position" id="off-edit-position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
                    </div>
                    <button data-modal-hide="edit-official-modal" type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                    <button data-modal-hide="edit-official-modal" class="w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div> 
