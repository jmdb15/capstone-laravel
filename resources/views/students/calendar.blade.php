<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title}}</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>

  
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite(['resources/css/app.css','resources/js/app.js']) 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>

</head>
<body class="bg-gray-200 h-screen w-screen grid place-items-center" x-data="{nos: false}" :class="{'no-scroll': nos}">
@include('partials.__navbar')
@include('partials.__sidebar' , ['show' => false])

<section id="mid" class="h-[calc(100%-70px)] mt-[70px] overflow-y-scroll basis-full md:w-[calc(1920px-382px)] lg:w-[calc(1920px-698px)]">

  <div class="row">
    <div class="col-11">
      <div class="col-md-11 offset-1" style="margin-top: 42px;">
        <div id="calendar"></div>
      </div>
    </div>
  </div>

  <button 
  id="MODAL-TOGGLE"
  data-modal-target="small-modal"
  data-modal-toggle="small-modal"
  class="hidden w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Small modal
  </button>

@include('partials.__notifications', ['notifs' => $notifs])

  <script defer>
    $(document).ready(function() {
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });

    var calendar = $('#calendar').fullCalendar({
      editable: false,
      header:{
        left: 'prev,next today',
        center: 'title',
        right:'month,agendaWeek,agendaDay'
      },
      events:'/calendar', //This is the url to send request to
      selectable:true,
      selectHelper:true,
      eventClick:function(event){//DO SOMETHING WHEN EVENT-VIEW IS CLICKED
        $('#MODAL-TOGGLE').click();
        $('#fortitle').html(event.title);
        $('#fordescription').html(event.description);
        $('#startpick').html(cformatDate(event.start));
        $('#endpick').html(cformatDate(event.end));
      },
      initialView: 'dayGridMonth',
      eventRender: function(event, element) { //RENDER SOMETHING TO EVERY EVENT-VIEW ELEMENT
        element.attr('data-modal-target', 'small-modal');
        element.attr('data-modal-toggle', 'small-modal');
      },
    });

    // GET PROPER DATE
    function cformatDate(date){
      var inputDate = new Date(date);
      var daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

      var dayOfWeek = daysOfWeek[inputDate.getUTCDay()];
      var month = months[inputDate.getUTCMonth()];
      var day = inputDate.getUTCDate();
      var year = inputDate.getUTCFullYear();
      var hours = inputDate.getUTCHours();
      var minutes = inputDate.getUTCMinutes();

      // Convert hours to 12-hour format and determine AM or PM
      var amOrPm = hours >= 12 ? "PM" : "AM";
      hours = hours % 12 || 12; // Convert to 12-hour format

      // Zero-pad the day and minutes
      var formattedDay = (day < 10) ? "0" + day : day;
      var formattedMinutes = (minutes < 10) ? "0" + minutes : minutes;

      var formattedDateString = dayOfWeek + ", " + month + " " + formattedDay + ", " + year + " " + hours + ":" + formattedMinutes + " " + amOrPm;
      return formattedDateString;
    }
  </script>

  <x-s_cal_modal />

@include('partials.__footer')