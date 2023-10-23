@include('partials.__header')
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__sidenavbar')

<div class="p-4 sm:ml-64" >
  <div class="p-4 rounded-lg flex flex-col gap-y-10 mt-14">

    <div class="flex flex-col gap-4  md:flex-row justify-around">

      <div class="relative flex flex-row gap-x-4 py-2 px-4 h-fit min-w-fit  w-52 max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-11 h-11 p-2 bg-blue-400 rounded-md">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Total Users</h5>
          <p class="font-normal text-lg text-gray-600">{{ $users }}</p>
        </div>
      </div>
      
      <div class="relative flex flex-row gap-x-4 min-w-fit w-52 max-w-sm py-2 px-4 h-fit bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg class="w-11 h-11 p-2 bg-blue-400 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#fff"  viewBox="0 0 20 18">
          <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Queries</h5>
          <p class="font-normal text-lg text-gray-600">{{ $qrys }}</p>
        </div>
      </div>

      <div class="relative flex flex-row gap-x-4 min-w-fit w-52 max-w-sm py-2 px-4 h-fit bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg class="w-11 h-11 p-2 bg-blue-400 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#fff"  viewBox="0 0 20 18">
          <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Posts</h5>
          <p class="font-normal text-lg text-gray-600">{{ $posts }}</p>
        </div>
      </div>

      <div class="relative flex flex-row gap-x-4 min-w-fit w-52 max-w-sm py-2 px-4 h-fit bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 items-center">
        <svg class="w-11 h-11 p-2 bg-blue-400 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#fff"  viewBox="0 0 20 18">
          <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <div>
          <h5 class="text-xl font-bold tracking-tight text-gray-900">Comments</h5>
          <p class="font-normal text-lg text-gray-600">{{ $comments }}</p>
        </div>
      </div>

    </div>

    <div class="flex flex-col justify-between gap-y-[420px] xl:flex-row">
      <div id="chartContainer3" class="rounded-md shadow-xl min-w-sm basis-4/5" style="height: 370px; max-width: 920px;"></div>
      <div class="h-[370px] w-96 rounded-lg border-2 border-gray-600 flex flex-col overflow-y-auto">
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="w-full h-16 py-0 px-2 flex">
          <img src="{{url('images/Untitled-1.ico')}}" alt="" class="h-full w-auto p-2 rounded-full" />
          <div class="flex flex-col gap-0 justify-start">
            <h4 class="text-xl text-black font-bold mt-2">Name</h4>
            <p class="text-gray-600 text-lg -mt-2">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="relative mt-10 flex flex-col justify-between max-w-2xl gap-96 xl:gap-6 xl:flex-row h-fit">
      <div id="chartContainer2" class="w-fit shadow-xl"></div>
      <div id="chartContainer" class="w-fit mt-12 xl:mt-0 shadow-xl"></div>
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
      console.log(data)
      sort1 = Object.keys(data[0]).sort((a, b) => b - a);
      sort2 = Object.keys(data[1]).sort((a, b) => b - a);
      data2 = [];
      data3 = [];
      for (let key of sort1) {
        data2.push({label: key, y: data[0][key]})
      }
      for (let key of sort2) {
        data3.push({label: key, y: data[1][key]})
      }
      lineChartRend(data2, data3);
      console.log(data2)
      console.log(data3)
    }
  });
  barGraphRend('a');



  function pieChartRend(data){
    var chart2 = new CanvasJS.Chart("chartContainer", {
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      exportEnabled: true,
      animationEnabled: true,
      title: {
        text: "User Activities"
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
          { y: data[0].count, label: data[0].activity },
          { y: data[1].count, label: data[1].activity },
          { y: data[2].count, label: data[2].activity },
        ]
      }]
    });
    chart2.render();
    }

    function barGraphRend(data){
      var chart = new CanvasJS.Chart("chartContainer2", {
        theme: "light2", // "light2", "dark1", "dark2"
        animationEnabled: false, // change to true		
        title:{
          text: "Latest User Activities"
        },
        data: [
        {
          // Change type to "bar", "area", "spline", "pie",etc.
          type: "column",
          dataPoints: [
            { label: "apple",  y: 10  },
            { label: "orange", y: 15  },
            { label: "banana", y: 25  },
            { label: "mango",  y: 30  },
            { label: "grape",  y: 28  }
          ]
        }
        ]
      });
    chart.render();
    }

    function lineChartRend(data, data2){
      var chart = new CanvasJS.Chart("chartContainer3", {
        theme:"light2",
        animationEnabled: true,
        title:{
          text: "Posts & Queries"
        },
        axisY :{
          title: "Number of Viewers",
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
          dataPoints: data
        },
        {
          type: "spline", 
          showInLegend: true,
          yValueFormatString: "##",
          name: "Queries",
          dataPoints: data2
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