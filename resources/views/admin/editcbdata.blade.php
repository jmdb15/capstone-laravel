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
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <form id="intent-form">
                @csrf
                    <label for="search-tag">Search by Tag:</label>
                    <input type="text" id="search-tag" name="search-tag">
                    <input type="submit" value="Search" >
                </form>
                
            </caption>
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
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($intents->intents as $intent)
                    @if ($loop->index % 2 == 0)
                        <tr class="bg-white border-b h-fit dark:bg-gray-800 dark:border-gray-800 hover:dark:brightness-110">
                    @else
                        <tr class="bg-gray-50 border-b h-fit dark:bg-gray-800 dark:border-gray-800 dark:brightness-125 hover:brightness-150 hover:dark:brightness-150">
                    @endif
                        <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <input type="text" name="tag" value="{{ $intent->tag }}" id="t-{{$intent->tag}}" class="bg-transparent outline-none border-none hover:border-solid">
                        </th>
                        <td class="">
                            <textarea name="patterns" id="p-{{$intent->tag}}" rows="{{count($intent->patterns)}}" class="bg-transparent outline-none border-none hover:border-solid">{{ implode("\n", $intent->patterns) }}</textarea>
                        </td>
                        <td class="">
                            <textarea name="responses" id="r-{{$intent->tag}}" rows="{{count($intent->responses)}}" class="bg-transparent h-fit outline-none border-none hover:border-solid">{{ implode("\n", $intent->responses) }}</textarea>
                        </td>
                        <td class="text-right">
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="edit('{{$intent->tag}}')">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
    console.log(jsondata);
    console.log(jsondata.intents.find(intent => intent.tag === 'new ulit'));

    document.querySelector('#add').addEventListener('click', function(){
        const tagname = document.querySelector('#fortag').value;
        const pattern = document.querySelector('#forpattern').value;
        let patterns = pattern.split('\n')
        const resp = document.querySelector('#forresponse').value;
        let resps = resp.split('\n')
        jsondata.intents.push({"tag": tagname, "patterns": patterns, "responses": resps});
        console.log(jsondata);
        $.ajax({
            url:'/update_json',
            type:'GET',
            data: {data:JSON.stringify(jsondata)},
            success: function(data){
                console.log(data.message)
            }
        })
    })

    function edit(tag){
        const intentToEdit = jsondata.intents.find(intent => intent.tag === tag);
        if (intentToEdit) {
            // Update intent data with user edits
            intentToEdit.tag = document.querySelector(`#t-${tag}`).value;
            intentToEdit.patterns = document.querySelector(`#p-${tag}`).value.split('\n').map(pattern => pattern.trim());
            intentToEdit.responses = document.querySelector(`#r-${tag}`).value.split('\n').map(response => response.trim());
        }
        console.log(jsondata);
    }

    document.getElementById('intent-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const editTag = formData.get('edit');

        // Find the intent to edit
        const intentToEdit = jsondata.intents.find(intent => intent.tag === editTag);
        if (intentToEdit) {
            // Update intent data with user edits
            intentToEdit.tag = formData.get('tag');
            intentToEdit.patterns = formData.get('patterns').split('\n').map(pattern => pattern.trim());
            intentToEdit.responses = formData.get('responses').split('\n').map(response => response.trim());

            // Encode the updated JSON data
            const updatedJsonData = JSON.stringify(jsondata);
            console.log(updatedJsonData);
        }
      });
</script>
@include('partials.__admin_footer')