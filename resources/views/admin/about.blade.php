@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
    <div class="p-4 rounded-lg mt-14">
        <div class="flex justify-between w-full">
            <h2 class="text-4xl mb-5">About CSSP</h2>
        </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Item ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Value
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($file->content as $row)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4">
                                {{ $row->itemid }}
                            </th>
                            <th scope="col" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img src="{{ url('images/'.$row->image) }}" class="w-10 h-10 rounded-full"  alt="" onerror="handleImgError(this)">
                            </th>
                            <td scope="col" class="px-6 py-4"><div class="pl-3">
                                <div class="text-base font-semibold">{{ $row->value }}</div>
                                <div class="font-normal text-gray-500 p-1" id="sec-val-{{$row->itemid}}">{{ $row->valuesecond }}</div>
                            </td>
                            <td scope="col" class="px-6 py-4">
                                <a class="font-medium cursor-pointer text-blue-600 hover:underline" onclick="editAbout('{{$row->itemid}}')">Edit</a>
                                <a class="font-medium cursor-pointer text-green-600 hover:underline hidden" id="save-{{$row->itemid}}" onclick="saveChanges('{{$row->itemid}}')">Save</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <x-messages />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
<script>
    function handleImgError(elem){
        elem.remove();
    }
    function editAbout(id){
        document.getElementById(`save-${id}`).removeAttribute('disabled');
        document.getElementById(`save-${id}`).classList.toggle('hidden');
        document.getElementById(`sec-val-${id}`).setAttribute('contenteditable','true');
        document.getElementById(`sec-val-${id}`).focus();
    }
    function saveChanges(id){
        let valuesecond = document.getElementById(`sec-val-${id}`).innerHTML;
        document.getElementById(`sec-val-${id}`).setAttribute('contenteditable','false');
        document.getElementById(`save-${id}`).classList.toggle('hidden');
        $.ajaxSetup({
          headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url:'/edit-about',
            type:'POST',
            data:{
                itemid:id,
                valuesecond: valuesecond
            },
            success:function(data){
                if(data ==='Success.'){
                    document.querySelector('#toast-s-content').innerHTML = 'Update Successful';
                    let elem = document.querySelector('#toast-success');
                    elem.classList.toggle('hidden')
                    elem.classList.toggle('flex')
                    setTimeout(() => {
                        elem.classList.toggle('hidden')
                        elem.classList.toggle('flex')
                    }, 3000);
                }else{
                    document.querySelector('#toast-d-content').innerHTML = 'Update failed';
                    let elem = document.querySelector('#toast-danger');
                    elem.classList.toggle('hidden')
                    elem.classList.toggle('flex')
                    setTimeout(() => {
                        elem.classList.toggle('hidden')
                        elem.classList.toggle('flex')
                    }, 3000);
                }
            }
        })
    }
</script>
@include('partials.__admin_footer')