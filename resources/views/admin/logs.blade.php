@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg mt-14">
    <div class="border-b border-gray-200">
        
        {{-- Table --}}
            <form action="/logs" method="GET" id="filter">
                @csrf
                <div class="flex items-center justify-between pb-4">
                    <div>
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex py-2 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3" type="button">
                            <svg class="w-3 h-3 text-gray-500 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                </svg>
                            <span id="filter" class="text-sm">{{$show}}</span>
                            <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownRadio" class="z-10 hidden w-56 bg-white divide-y divide-gray-100 rounded-lg shadow ml-14" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                            <ul class="ml-14 p-3 space-y-1 text-sm text-gray-700 h-56" aria-labelledby="dropdownRadioButton">
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input {{($d=='1') ? 'checked' : '' }} id="filter-radio-example-1" type="radio" value="1" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-1" class="w-full ml-2 text-sm font-medium text-gray-900 rounded">Last day</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input {{($d=='7') ? 'checked' : '' }} id="filter-radio-example-2" type="radio" value="7" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-2" class="w-full ml-2 text-sm font-medium text-gray-900 rounded">Last 7 days</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input {{($d=='30') ? 'checked' : '' }} id="filter-radio-example-4" type="radio" value="30" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-4" class="w-full ml-2 text-sm font-medium text-gray-900 rounded">Last month</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input {{($d=='365') ? 'checked' : '' }} id="filter-radio-example-5" type="radio" value="365" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-5" class="w-full ml-2 text-sm font-medium text-gray-900 rounded">Last year</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input {{($d=='') ? 'checked' : '' }} id="filter-radio-example-6" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-6" class="w-full ml-2 text-sm font-medium text-gray-900 rounded">All</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" value="{{$s}}" name="search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
                    </div>
                </div>
            </form>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Log ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Activity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="tboy">
                    @foreach ($logs as $log)
                        <tr class="border-b border-gray-200 bg-white hover:bg-gray-100" id="tr-3">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$log->id}}</th>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('storage/student/'.$log->image ) }}" alt="gabby image">
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{$log->name}}</div>
                                    <div class="font-normal text-gray-500">{{$log->email}}</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">{{$log->activity}}</td>
                            <td class="px-6 py-4">{{$log->created_at}}</td>
                            <td class="px-6 py-4">
                                <a onclick="confirmDel({{$log->id}})" class="font-medium text-red-600 cursor-pointer hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-white p-2">
                {{$logs->appends(request()->input())->links('vendor.pagination.tailwind')}}
            </div>
        </div>

        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Toggle modal
        </button>

        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" onclick="hideBd()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this?</h3>
                        <button onclick="deleteLog()" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button onclick="hideBd()" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="backdrop" class="w-screen h-screen fixed inset-0 z-40 bg-gray-900 opacity-40 hidden"></div>
    </div>
  </div>
</div>

<x-messages />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#table-search').keypress(function(event){
            if (event.key === "Enter" || event.keyCode === 13) {
                value = event.target.value;
                date = localStorage.getItem('date');
                ajaxfilter(date, value);
            }
        });
        localStorage.setItem('date', '');
        // ajaxfilter('','');
    });

    // FILTER DATA USING AJAX
    function ajaxfilter(date, value){
        startdate = date ? fixDate(date) : '';
        var enddate = new Date();
        enddate.setDate(enddate.getDate());
        var year = enddate.getFullYear(); // Increment the year by 1 to get 2023
        var month = enddate.getMonth() + 1; // Months are zero-indexed, so add 1
        var day = enddate.getDate();
        var enddate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
        // $.ajax({
        //     url: '/logs/filtered',
        //     type: 'POST',
        //     data:{
        //         text: value,
        //         startdate: startdate,
        //         enddate: enddate,
        //     },
        //     success:function(data){
        //         $(`#tboy`).empty();
        //         newData = data.data;
        //         console.log(data)
        //         console.log(newData)
        //         // for (const key in newData) {
        //         //     // data[key].forEach(d=>{
        //                 populateTable('tboy', newData);
        //         //     // })
        //         // }    
        //     }
        // })
    }

    function selectDd(date){
        localStorage.setItem('date', date);
        fil = (date==1) ? 'Last Day' : (date==7) ? 'Last Week' : (date==30) ? 'Last Month' : (date==365) ? 'Last Year' : 'All';
        console.log(fil)
        document.getElementById('filter').innerHTML = fil;
        val = $('#table-search').val();
        ajaxfilter(date, val);
    }
    // POPULATE TABLE
    function populateTable(table, users){
        trc = `class="border-b border-gray-200 bg-white hover:bg-gray-100"`;
        chkb = `<td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="checkbox-table-3" class="sr-only">checkbox</label>
                    </div>
                </td>`;
        thc = ` scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"`;
        users.forEach(function(user){
            img = user.image ? `http://127.0.0.1:8000/storage/student/${user.image}` : `https://avatars.dicebear.com/api/initials/avatars.svg`;
            $('#tboy').append(`
                <tr ${trc} id="tr-${user.id}">
                    ${chkb}
                    <th ${thc}>${user.id}</th>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                        <img class="w-10 h-10 rounded-full" src="${img}" alt="${user.name} image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">${user.name}</div>
                            <div class="font-normal text-gray-500">${user.email}</div>
                        </div>  
                    </th>
                    <td class='px-6 py-4'>${user.activity}</td>
                    <td class='px-6 py-4'>${user.created_at}</td>
                    <td class="px-6 py-4">
                        <a onclick="confirmDel(${user.id})" class="font-medium text-red-600 cursor-pointer hover:underline" >Delete</a>
                    </td>
                </tr>
            `);
        })
        
    }
    function confirmDel(id){
        localStorage.setItem('log_id', id);
        document.querySelector('#popup-modal').classList.toggle('hidden');
        document.querySelector('#popup-modal').classList.toggle('flex');
        document.querySelector('#backdrop').classList.toggle('hidden');
    }
    function hideBd(){
        document.querySelector('#backdrop').classList.toggle('hidden');
    }
    function deleteLog(id){
        document.querySelector('#backdrop').classList.toggle('hidden');
        id = localStorage.getItem('log_id');
        $.ajax({  
            url: '/logs/action',
            type: 'POST',
            data:{ id: id,},
            success:function(data){
            document.querySelector(`#tr-${id}`).style.display = "none";
        }
        });
    }
    function fixDate(value){
        switch(value){
            case 7:
                var date = new Date();
                date.setDate(date.getDate() - 7);
                break;
            case 1:
                var date = new Date();
                date.setDate(date.getDate() - 1);
                break;
            case 30:
                var date = new Date();
                date.setMonth(date.getMonth() - 1);
                break;
            case 365:
                var date = new Date();
                date.setFullYear(date.getFullYear() - 1);
                break;
            default:
                return '';
        }
        var year = date.getFullYear(); // Increment the year by 1 to get 2023
        var month = date.getMonth() + 1; // Months are zero-indexed, so add 1
        var day = date.getDate();
        var date = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
        return date;
    }
</script>
@include('partials.__admin_footer')