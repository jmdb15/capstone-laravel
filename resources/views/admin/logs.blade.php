@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
    <div class="border-b border-gray-200 dark:border-gray-700">
        
        {{-- Table --}}
            <div class="flex items-center justify-between pb-4">
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex py-2 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                        <span id="filter" class="text-sm">All</span>
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownRadio" class="z-10 hidden w-56 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 ml-14" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="ml-14 p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200 h-56" aria-labelledby="dropdownRadioButton">
                            <li onclick="selectDd(1)">
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-1" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                                </div>
                            </li>
                            <li onclick="selectDd(7)">
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-2" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                                </div>
                            </li>
                            <li onclick="selectDd(30)">
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-4" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                                </div>
                            </li>
                            <li onclick="selectDd(365)">
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-5" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                                </div>
                            </li>
                            <li onclick="selectDd('')">
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-6" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-6" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">All</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
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
                <tbody id="tboy"></tbody>
            </table>
        </div>
    </div>
  </div>
</div>

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
        ajaxfilter('','');
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
        $.ajax({
            url: '/logs/filtered',
            type: 'POST',
            data:{
                text: value,
                startdate: startdate,
                enddate: enddate,
            },
            success:function(data){
                $(`#tboy`).empty();
                for (const key in data) {
                    // data[key].forEach(d=>{
                        populateTable('tboy', data[key]);
                    // })
                }    
            }
        })
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
        trc = `class="border-b border-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600"`;
        chkb = `<td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-3" class="sr-only">checkbox</label>
                    </div>
                </td>`;
        thc = ` scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"`;
        tde = `<td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>`;
        users.forEach(user => {
            img = user.image ? `http://127.0.0.1:8000/storage/student/${user.image}` : `https://avatars.dicebear.com/api/initials/${user.name}.svg`;
            $('#tboy').append(`
                <tr ${trc}>
                    ${chkb}
                    <th ${thc}>${user.id}</th>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="${img}" alt="${user.name} image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">${user.name}</div>
                            <div class="font-normal text-gray-500">${user.email}</div>
                        </div>  
                    </th>
                    <td class='px-6 py-4'>${user.activity}</td>
                    <td class='px-6 py-4'>${user.created_at}</td>
                    ${tde}
                </tr>
            `);
        })
        
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