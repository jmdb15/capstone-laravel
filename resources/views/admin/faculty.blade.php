@include('partials.__header')
<body class="bg-gray-200 dark:bg-slate-700" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
    <div class="p-4 rounded-lg mt-14">

        <x-officialstaff :file="$file2" />
        <br><br>
        <x-facultystaff :file="$file" />
        
    </div>
</div>


<div id="confirmation-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="confirmation-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this faculty?</h3>
                <button onclick="submitDelete()" data-modal-hide="confirmation-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="confirmation-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>


<form action="/delete-faculty" method="POST" id="delete-form" class="hidden">
    @csrf
    <input type="text" id="delete-name" name="fullname">
</form>

<script>
    function submitDelete(){
        document.querySelector('#delete-form').submit();
    }
    function deleteFaculty(name){
        document.querySelector('#delete-name').value = name;
        document.querySelector('#delete-form').action = '/delete-faculty';
    }
    function editFaculty(name, email, pos, dep, stat){
        document.querySelector('#edit-fullname').value = name;
        document.querySelector('#edit-email').value = email;
        document.querySelector('#edit-position').value = pos;
        document.querySelector('#edit-department').value = dep;
        document.querySelector('#edit-status').value = stat;
    }
    function deleteOfficial(name){
        document.querySelector('#delete-name').value = name;
        document.querySelector('#delete-form').action = '/delete-official';
    }
    function editOfficial(name, pos){
        document.querySelector('#off-edit-fullname').value = name;
        document.querySelector('#off-edit-position').value = pos;
    }
    function queryUpload(type, owner,  elem){
      let imgArea = document.querySelector(`#img_upload_area_${owner}_${type}`);
      const image = elem.files[0]
      if(image){
        imgArea.classList.remove('hidden');
        const reader = new FileReader();
        reader.onload = ()=> {
            const imgUrl = reader.result;
            imgArea.src = imgUrl;
        }
        reader.readAsDataURL(image)
      }else{
        imgArea.classList.add('hidden');
      }
    }
</script>
<x-messages />
<x-cms_editmodal />
<x-cms_addmodal />
<x-cms_offadd />
<x-cms_offedit />
@include('partials.__admin_footer')