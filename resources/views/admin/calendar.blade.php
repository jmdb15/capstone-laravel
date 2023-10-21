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
<body class="bg-gray-200" x-data="{nos: false}" :class="{'no-scroll': nos}">
  @include('partials.__sidenavbar')

  <div class="container mt-[70px] sm:ml-[160px]">
    <div class="row">
      <div class="col-11">
        <div class="col-md-11 offset-1 my-5">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  <x-createevent />
  </div>

  <x-popover />


  {{-- HIDDEN BUTTONS --}}
  <button id="toggler" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button>

  <script>
    flatpickr('#startpicker', {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:S',
        // Additional options as needed
    });
    flatpickr('#endpicker', {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:S',
        // Additional options as needed
    });
    
    $(document).ready(function() {
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#create_event').submit(function(e){
        e.preventDefault();
        var action = e.originalEvent.submitter.value;
        var id = document.querySelector('#eventid').value;
        if(action === "delete"){ //DELETE
          $.ajax({
              url:"/calendar/action",
              type:"POST",
              data:{
                  id:id,
                  type:"delete"
              },
              success:function(response)
              {
                  calendar.fullCalendar('refetchEvents');
                  alert("Event Deleted Successfully");
              }
          });
        }else{
          type = (action === 'create') ? 'add' : 'update'; //UPDATE OR ADD
          disid = (action === 'create') ? '' : id ;
          var formData = $(this).serialize();
          var data = new URLSearchParams(formData);
          var title = data.get('title');
          var desc = data.get('description');
          var start = data.get('start');
          var end = data.get('end');
          $.ajax({
            url:'/calendar/action',
            type:"POST",
            data: {
              id:disid,
              title:title,
              description: desc,
              start:start,
              end:end,
              type:type 
            },
            success:function(data){
              calendar.fullCalendar('refetchEvents');
              alert('Event '+type+'d');
            }
          })
        }
      });

      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header:{
          left: 'prev,next today',
          center: 'title',
          right:'month,agendaWeek,agendaDay'
        },
        events:'/calendar', //This is the url to send request to
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay){
          $('#toggler').click();
          $('#modaltype').html('Create an Event');
          $('#title').val('');
          $('#description').val('');
          $('#startpicker').val(cformatDate(start._d));
          $('#endpicker').val('');
          document.querySelector('#foredit').style.display = 'none';
          document.querySelector('#forcreate').style.display = 'block';
        },
        editable:true,
        eventResize: function(event, delta){ //DO SOMETHING WHEN EVENT-VIEW IS RESIZED FROM TODAY VIEW
          var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
          var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: '/calendar/action',
            type:'POST',
            data:{
              title:title,
              description: 'sample2',
              start:start,
              end:end,
              id:id,
              type:'update'
            },
            success:function(data){
              calendar.fullCalendar('refetchEvents');
            }
          });
        },
        eventDrop: function(event, delta){//DO SOMETHING WHEN EVENT-VIEW IS DRAGGED N DROPPED
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/calendar/action",
                type:"POST",
                data:{
                    title: title,
                    description: 'sample2',
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
        },
        eventClick:function(event){//DO SOMETHING WHEN EVENT-VIEW IS CLICKED
          $('#toggler').click();
          $('#modaltype').val('Edit Event');
          $('#eventid').val(event.id);
          $('#title').val(event.title);
          $('#description').val(event.description);
          $('#startpicker').val(cformatDate(event.start));
          $('#endpicker').val(cformatDate(event.end));
          document.querySelector('#forcreate').style.display = 'none';
          document.querySelector('#foredit').style.display = 'block';
        },
        initialView: 'dayGridMonth',
        eventRender: function(event, element) { //RENDER SOMETHING TO EVERY EVENT-VIEW ELEMENT
          element.attr('data-popover-target', 'popover-default'); //set to show popover above element
          
          element.on('mouseenter', function(e) {
            document.getElementById('poptitle').innerHTML = event.title;
            document.getElementById('popdesc').innerHTML = event.description;
            document.getElementById('start').innerHTML = cformatDate(event.start);
            document.getElementById('end').innerHTML = cformatDate(event.end);
          }).on('mouseleave', function() {
            // simulateHover(customPopover, false);
          });
        },
      });
    });
    //SIMULATE HOVER ACTION
    function simulateHover(targetElement, b) {
      const mouseEnterEvent = new MouseEvent('mouseenter', {
        bubbles: true,
        cancelable: true,
        view: window
      });
      const mouseLeaveEvent = new MouseEvent('mouseleave', {
        bubbles: true,
        cancelable: true,
        view: window
      });
      if(b)
        targetElement.dispatchEvent(mouseEnterEvent);
      else
        targetElement.dispatchEvent(mouseLeaveEvent);
    }
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
    function yes(e){
      e.preventDefault();
      console.log("clicked")
    }

    
  </script>

@include('partials.__admin_footer')