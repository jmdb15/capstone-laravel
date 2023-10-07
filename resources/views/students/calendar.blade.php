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
@include('partials.__navbar')
@include('partials.__sidebar')

  <main class="w-screen flex flex-col sm:flex-row max-w-1920 mx-auto">
    <div class="row">
      <div class="col-11">
        <div class="col-md-11 offset-1 my-5">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </main>

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
          customPopover = document.getElementById('popbtn');
          showelem = document.getElementById('popover-default');
          element.on('mouseenter', function(e) {
            const mouseX = e.clientX;
            const mouseY = e.clientY;
            showelem.style.left = mouseX + 'px';
            showelem.style.top = mouseY - customPopover.clientHeight + 'px';
            
            simulateHover(customPopover,true);

            document.getElementById('poptitle').innerHTML = event.title;
            document.getElementById('popdesc').innerHTML = event.description;
          }).on('mouseleave', function() {
              simulateHover(customPopover, false);
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
      var year = inputDate.getFullYear();
      var month = inputDate.getMonth() + 1;
      var day = inputDate.getDate();
      var hours = inputDate.getHours();
      var minutes = inputDate.getMinutes();
      var seconds = inputDate.getSeconds();

      var formattedMonth = (month < 10) ? "0" + month : month;
      var formattedDay = (day < 10) ? "0" + day : day;
      var formattedHours = ((hours < 10) ? "0" + hours : hours) - 8;
      var formattedMinutes = (minutes < 10) ? "0" + minutes : minutes;
      var formattedSeconds = (seconds < 10) ? "0" + seconds : seconds;
      
      var formattedDateString = year + "-" + formattedMonth + "-" + formattedDay + " " + formattedHours + ":" + formattedMinutes + ":" + formattedSeconds;
      return formattedDateString;
    }
    function yes(e){
      e.preventDefault();
      console.log("clicked")
    }

    
  </script>

@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')