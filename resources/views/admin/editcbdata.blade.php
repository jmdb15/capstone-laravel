@include('partials.__header')
<style>
    ::webkit-scrollbar {
      width: 12px;
    }

    ::webkit-scrollbar-thumb {
      background-color: #4f46e5;
      border-radius: 8px;
    }

    ::webkit-scrollbar-track {
      background-color: #cbd5e0;
      border-radius: 8px;
    }
</style>
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14">

    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- FORM --}}
        <div class="flex items-center justify-between px-2 py-2 bg-white border-b-2">
            <div class="flex gap-x-4">
                <button onclick="hideEditBtn()" id="add-content" class="bg-green-600 text-gray-100 rounded-md py-2 h-full px-6 hover:brightness-110" data-modal-target="crud-modal" data-modal-toggle="crud-modal">Add</button>
                <button onclick="saveChanges()" id="save-btn" class="bg-blue-600 text-gray-100 rounded-md py-2 h-full px-6 hover:brightness-110 disabled:bg-gray-500 disabled:cursor-not-allowed disabled:brightness-100" disabled>Save</button>
            </div>
            <label for="table-search-users" class="sr-only">Search</label>
            <div class="flex gap-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" value="" id="table-search-tag" name="filtertag" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search tag">
                </div>
                <button type="submit" name="search" class=" hover:scale-105">
                    <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        {{-- <rect width="24" height="24" fill="white"/> --}}
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" fill="#323232"/>
                    </svg>
                </button>
            </div>
        </div>
        {{-- TABLE --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tag
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Patterns
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Responses
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody id="tboy">
                @foreach($intents->intents as $intent)
                    <tr id="tr-{{$loop->index}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ucfirst($intent->tag)}}
                        </th>
                        <td class="px-6 py-4">
                           {{count($intent->patterns)}} item/s
                        </td>
                        <td class="px-6 py-4">
                           {{count($intent->responses)}} item/s
                        </td>
                        <td class="px-6 py-4">
                            <a  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-modal-target="crud-modal" data-modal-toggle="crud-modal" onclick="edit('{{$intent->tag}}')">Edit</a>
                            |
                            <a  class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="deleteTag('{{$intent->tag}}', {{$loop->index}})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-edit_tag />
    <x-messages />
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
<?php echo '<script> let jsondata = JSON.parse(`'. json_encode($intents) .'`);</script>'; ?>
<script defer>
    window.onload = function() {
        $(document).ready(function(){
        $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        });
    };
    let tagState = '';
    const tagname = document.querySelector('#tag');
    const pattern = document.querySelector('#patterns');
    const resp = document.querySelector('#responses');

    function saveChanges(){
        $.ajax({
            url:'/update_json',
            type:'GET',
            data: {data:JSON.stringify(jsondata)},
            success: function(data){
                console.log(data.message)
            }
        })
        document.querySelector('#toast-s-content').innerHTML = 'Changes saved!.';
    }

    function addTag(){
        const tag = tagname.value;
        let patterns = pattern.value.split('\n');
        let resps = resp.value.split('\n');
        if(tag == '' || pattern.value == '' || resp.value == ''){
            let elem = document.querySelector('#toast-danger');
            elem.classList.toggle('hidden')
            elem.classList.toggle('flex')
            setTimeout(() => {
                elem.classList.toggle('hidden')
                elem.classList.toggle('flex')
            }, 3000);
        }else{
            jsondata.intents.push({"tag": tag, "patterns": patterns, "responses": resps});
            document.querySelector('#toast-s-content').innerHTML = 'Added! Don\'t forget to save changes.';
            document.querySelector('#save-btn').removeAttribute('disabled');
            document.querySelector('#tboy').innerHTML += `<tr id="tr-${tagname.value}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${tag.charAt(0).toUpperCase() + tag.slice(1)}
                        </th>
                        <td class="px-6 py-4">
                           ${patterns.length} item/s
                        </td>
                        <td class="px-6 py-4">
                           ${resps.length} item/s
                        </td>
                        <td class="px-6 py-4">
                            <a  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-modal-target="crud-modal" data-modal-toggle="crud-modal" onclick="edit('${tagname.value}')">Edit</a>
                            |
                            <a  class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="deleteTag('${tagname.value}')">Delete</a>
                        </td>
                    </tr>`;
        }
        console.log(jsondata);
    }

    function deleteTag(tag, id){
        const index = jsondata.intents.findIndex(obj => obj.tag === tag);
        if (index !== -1) {
            jsondata.intents.splice(index, 1);
            document.querySelector(`#tr-${id}`).remove();
            document.querySelector('#save-btn').removeAttribute('disabled');
        } else {
            console.log(`Object with id ${tag} not found.`);
        }
    }

    function hideEditBtn(){
        document.querySelector(`#add-btn`).classList.remove('hidden');
        document.querySelector(`#edit-btn`).classList.add('hidden');
        document.querySelector(`#tag`).value = '';
        document.querySelector(`#patterns`).value = '';
        document.querySelector(`#responses`).value = '';
    }

    function edit(tag){
        tagState = tag;
        const intentToEdit = jsondata.intents.find(intent => intent.tag === tag);
        document.querySelector(`#tag`).value = intentToEdit.tag;
        let pat = intentToEdit.patterns.join('\n');
        let rep = intentToEdit.responses.join('\n');
        document.querySelector(`#patterns`).rows = intentToEdit.patterns.length;
        document.querySelector(`#patterns`).value = pat;
        document.querySelector(`#responses`).rows = intentToEdit.responses.length;
        document.querySelector(`#responses`).value = rep;
        document.querySelector(`#add-btn`).classList.add('hidden');
        document.querySelector(`#edit-btn`).classList.remove('hidden');
    }

    function saveEdit(){
        const intentToEdit = jsondata.intents.find(intent => intent.tag === tagState);
        
        if(tagname.value == '' || pattern.value == '' || resp.value == ''){
            let elem = document.querySelector('#toast-danger');
            elem.classList.toggle('hidden')
            elem.classList.toggle('flex')
            setTimeout(() => {
                elem.classList.toggle('hidden')
                elem.classList.toggle('flex')
            }, 3000);
        }else if (intentToEdit) {
            // Update intent data with user edits
            intentToEdit.tag = tagname.value;
            intentToEdit.patterns = pattern.value.split('\n').map(pattern => pattern.trim());
            intentToEdit.responses = resp.value.split('\n').map(response => response.trim());
            document.querySelector('#save-btn').removeAttribute('disabled');
        }
    }
</script>
@include('partials.__admin_footer')