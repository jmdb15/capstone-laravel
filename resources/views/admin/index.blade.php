@include('partials.__header')
<style>
  @media print{
    nav, aside, #print-admin{
      display:none;
    }
    .first-container{
      margin:0px;
    }
    .second-container{
      margin:0px;
    }
  }
</style>
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div id="first-container" class="p-4 sm:ml-64 max-w-[1440px]" >
  <div id="second-container" class="p-1 md:p-4 rounded-lg flex flex-col gap-y-10 mt-20">

    <button onclick="printadmin()" id="print-admin" class="flex items-center gap-x-2 py-1.5 px-3 rounded-md bg-slate-400 hover:brightness-105 absolute top-16 text-lg right-2">
    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V11C20.6569 11 22 12.3431 22 14V18C22 19.6569 20.6569 21 19 21H5C3.34314 21 2 19.6569 2 18V14C2 12.3431 3.34315 11 5 11V5ZM5 13C4.44772 13 4 13.4477 4 14V18C4 18.5523 4.44772 19 5 19H19C19.5523 19 20 18.5523 20 18V14C20 13.4477 19.5523 13 19 13V15C19 15.5523 18.5523 16 18 16H6C5.44772 16 5 15.5523 5 15V13ZM7 6V12V14H17V12V6H7ZM9 9C9 8.44772 9.44772 8 10 8H14C14.5523 8 15 8.44772 15 9C15 9.55228 14.5523 10 14 10H10C9.44772 10 9 9.55228 9 9ZM9 12C9 11.4477 9.44772 11 10 11H14C14.5523 11 15 11.4477 15 12C15 12.5523 14.5523 13 14 13H10C9.44772 13 9 12.5523 9 12Z" fill="#000000"/>
    </svg> Print</button>


    <div id="printable" class="flex flex-col flex-wrap items-center gap-4 mx-auto w-full md:flex-row justify-center md:justify-around">

      <div class="relative flex flex-row gap-x-4 py-2 px-4 h-fit min-w-fit  w-52 max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-11 h-11 p-2 bg-blue-400 rounded-md">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Total Users</h5>
          <div class="flex justify-between items-center">
            <p class="font-medium text-lg text-gray-600">{{ $users }}</p>
            @if ($userInc > 0)
              <p class="bg-green-50 text-green-500 font-light px-1.5 rounded-sm text-xs">+{{$userInc}}%</p>
            @else
              <p class="bg-green-50 text-gray-400 font-light px-1.5 rounded-sm text-xs">{{$userInc}}%</p>
            @endif
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-row gap-x-4 min-w-fit w-52 max-w-sm py-2 px-4 h-fit bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg class="w-11 h-11 p-2 bg-blue-400 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#fff"  viewBox="0 0 20 18">
          <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Queries</h5>
          <div class="flex justify-between items-center">
            <p class="font-medium text-lg text-gray-600">{{ $qrys }}</p>
            @if ($qryInc > 0)
              <p class="bg-green-50 text-green-500 font-light px-1.5 rounded-sm text-xs">+{{$qryInc}}%</p>
            @else
              <p class="bg-green-50 text-gray-400 font-light px-1.5 rounded-sm text-xs">{{$qryInc}}%</p>
            @endif
          </div>
        </div>
      </div>

      <div class="relative flex flex-row gap-x-4 min-w-fit w-52 max-w-sm py-2 px-4 h-fit bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg class="w-11 h-11 p-2 bg-blue-400 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#fff"  viewBox="0 0 20 18">
          <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Posts</h5>
          <div class="flex justify-between items-center">
            <p class="font-medium text-lg text-gray-600">{{ $posts }}</p>
            @if ($postInc > 0)
              <p class="bg-green-50 text-green-500 font-light px-1.5 rounded-sm text-xs">+{{$postInc}}%</p>
            @else
              <p class="bg-green-50 text-gray-400 font-light px-1.5 rounded-sm text-xs">{{$postInc}}%</p>
            @endif
          </div>
        </div>
      </div>

      <div class="relative flex flex-row gap-x-4 min-w-fit w-52 max-w-sm py-2 px-4 h-fit bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg class="w-11 h-11 p-2 bg-blue-400 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#fff"  viewBox="0 0 20 18">
          <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Comments</h5>
          <div class="flex justify-between items-center">
            <p class="font-medium text-lg text-gray-600">{{ $comments }}</p>
            @if ($userInc > 0)
              <p class="bg-green-50 text-green-500 font-light px-1.5 rounded-sm text-xs">+{{$comInc}}%</p>
            @else
              <p class="bg-green-50 text-gray-400 font-light px-1.5 rounded-sm text-xs">{{$comInc}}%</p>
            @endif
          </div>
        </div>
      </div>

    </div>

    <div class="flex flex-col justify-center items-center gap-y-[324px] xl:flex-row" >
      <div id="chartContainer3" class="rounded-md shadow-xl min-w-[324px] max-w-[920px] h-[370px] w-full lg:w-[80%]"></div>
    </div>

    <div id="chart-container" class="mx-auto w-full flex flex-wrap h-[400px] justify-between gap-y-8 xl:gap-6 xl:flex-row">
      {{-- Bar Graph Container --}}
      <div id="chartContainer2" class="shadow-xl w-[500px] min-h-[400px] max-h-[400px] min-w-[324px]"></div>
      {{-- Pie Graph Container --}}
      <div id="chartContainer" class="shadow-xl w-[500px] min-h-[400px] max-h-[400px] min-w-[324px]"></div>
    </div>
  </div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
<script>
  window.onload = function() {
    $(document).ready(function(){
      $.ajaxSetup({
          headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
  });
  const printbtn = document.querySelector('#print-admin');
  printbtn.addEventListener('click', function(){
    document.querySelector('nav').style.display = 'none'
    document.querySelector('aside').style.display = 'none'
    document.querySelector('#print-admin').style.display = 'none'
    document.querySelector('#first-container').style.marginLeft = '0'
    document.querySelector('#second-container').style.marginTop = '0'
    document.querySelector('#chart-container').style.marginTop = '280px'
    document.querySelector('#chart-container').classList.toggle = 'justify-between'
    document.querySelector('#chart-container').classList.toggle = 'justify-around'
    document.querySelector('#chartContainer').style.width = '400px'
    document.querySelector('#chartContainer2').style.width = '400px'
    window.print();
    document.querySelector('nav').style.display = 'block'
    document.querySelector('aside').style.display = 'block'
    document.querySelector('#print-admin').style.display = 'block'
    document.querySelector('#first-container').style.marginLeft = '16rem'
    document.querySelector('#second-container').style.marginTop = '70px'
    document.querySelector('#chart-container').style.marginTop = '0'
    document.querySelector('#chart-container').classList.toggle = 'justify-between'
    document.querySelector('#chart-container').classList.toggle = 'justify-around'
    document.querySelector('#chartContainer').style.width = '500px'
    document.querySelector('#chartContainer2').style.width = '500px'
  })

  // THIS WILL RUN 
  $.ajax({
    url:'/admin',
    type: 'GET',
    success:function(data){
      pieChartRend(data);
    }
  });
  $.ajax({
    url:'/admin-line',
    type: 'GET',
    success:function(data){
      sort1 = Object.keys(data[0]).sort((a, b) => b - a);
      sort2 = Object.keys(data[1]).sort((a, b) => b - a);
      sort3 = Object.keys(data[2]).sort((a, b) => b - a);
      data1 = [];
      data2 = [];
      data3 = [];
      for (let key of sort1) {
        data1.push({label: key, y: data[0][key]})
      }
      for (let key of sort2) {
        data2.push({label: key, y: data[1][key]})
      }
      for (let key of sort3) {
        data3.push({label: key, y: data[2][key]})
      }
      lineChartRend(data1, data2, data3);
    }
  });
  $.ajax({
    url:'/admin-donut',
    type: 'GET',
    success:function(data){
      barGraphRend(data);
      // console.log(data)
    }
  });



  function pieChartRend(data){
    var chart2 = new CanvasJS.Chart("chartContainer", {
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      exportEnabled: true,
      animationEnabled: true,
      title: {
        text: "Account Log ins"
      },
      data: [{
        type: "pie",
        startAngle: 45,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 15,
        indexLabel: "{label} - {y}",
        dataPoints: [
          { y: data[0], label: 'Guest'  },
          { y: data[1], label: 'Verified' },
          { y: data[2], label: 'Unverified' },
        ]
      }]
    });
    chart2.render();
    }

    function barGraphRend(data){
      var chart = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        title:{
          text: "Accounts",
          horizontalAlign: "center"
        },
        data: [{
          type: "doughnut",
          startAngle: 60,
          showInLegend: "true",
          legendText: "{label}",
          //innerRadius: 60,
          indexLabelFontSize: 15,
          indexLabel: "{label} - #percent%",
          toolTipContent: "<b>{label}:</b> {y} (#percent%)",
          dataPoints: [
            { y: data[0], label: "Verified Student" },
            { y: data[1], label: "Unverified Students" },
            { y: data[2], label: "Organization" },
          ]
        }]
      });
      chart.render();
    }

    function lineChartRend(data1, data2, data3){
      var chart = new CanvasJS.Chart("chartContainer3", {
        theme:"light2",
        exportEnabled: true,
        animationEnabled: true,
        title:{
          text: "Posts, Queries, & Comments"
        },
        axisY :{
          title: "Total for the past month",
        },
        toolTip: {
          shared: "true"
        },
        legend:{
          cursor:"pointer",
          itemclick : toggleDataSeries
        },
        data: [
        {
          type: "spline", 
          showInLegend: true,
          yValueFormatString: "##",
          name: "Posts",
          dataPoints: data1
        },
        {
          type: "spline", 
          showInLegend: true,
          yValueFormatString: "##",
          name: "Queries",
          dataPoints: data2
        },
        {
          type: "spline", 
          showInLegend: true,
          yValueFormatString: "##",
          name: "Comments",
          dataPoints: data3
        },
        ]
      });
      chart.render();
      
      function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
          e.dataSeries.visible = false;
        } else {
          e.dataSeries.visible = true;
        }
        chart.render();
      }
    }
 }
</script>
@include('partials.__admin_footer')