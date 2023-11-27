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
<body class="bg-gray-200 dark:bg-slate-700" x-data="{nos: false}" :class="{'no-scroll': nos}">
  @include('partials.__sidenavbar')

  <div class="container mt-[70px] sm:ml-[160px]">
    <div class="row">
      <div class="flex justify-between w-[89%]">
          <h2 class="text-4xl mb-5"> </h2>
          <div class="w-56 flex justify-between">
            <form action="/export-events" method="GET">
                <button type="submit" class="flex justify-between items-center gap-x-2 py-2 px-4 rounded-md bg-slate-400 cursor-pointer hover:brightness-105">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M3 14.25C3.41421 14.25 3.75 14.5858 3.75 15C3.75 16.4354 3.75159 17.4365 3.85315 18.1919C3.9518 18.9257 4.13225 19.3142 4.40901 19.591C4.68577 19.8678 5.07435 20.0482 5.80812 20.1469C6.56347 20.2484 7.56459 20.25 9 20.25H15C16.4354 20.25 17.4365 20.2484 18.1919 20.1469C18.9257 20.0482 19.3142 19.8678 19.591 19.591C19.8678 19.3142 20.0482 18.9257 20.1469 18.1919C20.2484 17.4365 20.25 16.4354 20.25 15C20.25 14.5858 20.5858 14.25 21 14.25C21.4142 14.25 21.75 14.5858 21.75 15V15.0549C21.75 16.4225 21.75 17.5248 21.6335 18.3918C21.5125 19.2919 21.2536 20.0497 20.6517 20.6516C20.0497 21.2536 19.2919 21.5125 18.3918 21.6335C17.5248 21.75 16.4225 21.75 15.0549 21.75H8.94513C7.57754 21.75 6.47522 21.75 5.60825 21.6335C4.70814 21.5125 3.95027 21.2536 3.34835 20.6517C2.74643 20.0497 2.48754 19.2919 2.36652 18.3918C2.24996 17.5248 2.24998 16.4225 2.25 15.0549C2.25 15.0366 2.25 15.0183 2.25 15C2.25 14.5858 2.58579 14.25 3 14.25Z" fill="#1C274C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.75C12.2106 16.75 12.4114 16.6615 12.5535 16.5061L16.5535 12.1311C16.833 11.8254 16.8118 11.351 16.5061 11.0715C16.2004 10.792 15.726 10.8132 15.4465 11.1189L12.75 14.0682V3C12.75 2.58579 12.4142 2.25 12 2.25C11.5858 2.25 11.25 2.58579 11.25 3V14.0682L8.55353 11.1189C8.27403 10.8132 7.79963 10.792 7.49393 11.0715C7.18823 11.351 7.16698 11.8254 7.44648 12.1311L11.4465 16.5061C11.5886 16.6615 11.7894 16.75 12 16.75Z" fill="#1C274C"/>
                </svg> Excel</button>
            </form>
            <form action="/export-events-pdf" method="GET">
                <button type="submit" class="flex justify-between items-center gap-x-2 py-2 px-4 rounded-md bg-slate-400 cursor-pointer hover:brightness-105">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M3 14.25C3.41421 14.25 3.75 14.5858 3.75 15C3.75 16.4354 3.75159 17.4365 3.85315 18.1919C3.9518 18.9257 4.13225 19.3142 4.40901 19.591C4.68577 19.8678 5.07435 20.0482 5.80812 20.1469C6.56347 20.2484 7.56459 20.25 9 20.25H15C16.4354 20.25 17.4365 20.2484 18.1919 20.1469C18.9257 20.0482 19.3142 19.8678 19.591 19.591C19.8678 19.3142 20.0482 18.9257 20.1469 18.1919C20.2484 17.4365 20.25 16.4354 20.25 15C20.25 14.5858 20.5858 14.25 21 14.25C21.4142 14.25 21.75 14.5858 21.75 15V15.0549C21.75 16.4225 21.75 17.5248 21.6335 18.3918C21.5125 19.2919 21.2536 20.0497 20.6517 20.6516C20.0497 21.2536 19.2919 21.5125 18.3918 21.6335C17.5248 21.75 16.4225 21.75 15.0549 21.75H8.94513C7.57754 21.75 6.47522 21.75 5.60825 21.6335C4.70814 21.5125 3.95027 21.2536 3.34835 20.6517C2.74643 20.0497 2.48754 19.2919 2.36652 18.3918C2.24996 17.5248 2.24998 16.4225 2.25 15.0549C2.25 15.0366 2.25 15.0183 2.25 15C2.25 14.5858 2.58579 14.25 3 14.25Z" fill="#1C274C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.75C12.2106 16.75 12.4114 16.6615 12.5535 16.5061L16.5535 12.1311C16.833 11.8254 16.8118 11.351 16.5061 11.0715C16.2004 10.792 15.726 10.8132 15.4465 11.1189L12.75 14.0682V3C12.75 2.58579 12.4142 2.25 12 2.25C11.5858 2.25 11.25 2.58579 11.25 3V14.0682L8.55353 11.1189C8.27403 10.8132 7.79963 10.792 7.49393 11.0715C7.18823 11.351 7.16698 11.8254 7.44648 12.1311L11.4465 16.5061C11.5886 16.6615 11.7894 16.75 12 16.75Z" fill="#1C274C"/>
                </svg> PDF</button>
            </form>
          </div>
      </div>
      <div class="col-11">
        <div class="col-md-11 offset-1 my-5">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  <x-createevent />
  </div>

  <x-popover />

  <div id="toast-cont" class="fixed top-20 right-[40%] z-20 h-fit items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow toast-container hidden" >
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal" id="toast"></div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
  </div>


  {{-- HIDDEN BUTTONS --}}
  <button id="toggler" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
  Toggle modal
</button>

  <script>
    function showSuccessToast(text) {
      var toastcont = document.getElementById('toast-cont');
      var toast = document.getElementById('toast');
      toast.innerHTML = text;
      toastcont.style.display = 'flex'; // Display the toast
      // Automatically hide the toast after a few seconds (adjust the timeout as needed)
      setTimeout(function() {
          toastcont.style.display = 'none'; // Hide the toast
      }, 3000); // 3000 milliseconds (3 seconds)
    }

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
                  showSuccessToast("Event Deleted Successfully");
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
              showSuccessToast((action === 'create') ? 'Event added.' : 'Event Updated.');
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
          observe();
          $('#toggler').click();
          $('#modaltype').html('Create an Event');
          $('#title').val('');
          $('#description').val('');
          $('#startpicker').val(cformatDate(start._d));
          $('#endpicker').val('');
          document.querySelector('#foredit').style.display = 'none';
          document.querySelector('#forcreate').style.display = 'block';
          document.querySelector('#title').focus();
          observe();
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
                    showSuccessToast("Event Updated Successfully");
                }
            })
        },
        eventClick:function(event){//DO SOMETHING WHEN EVENT-VIEW IS CLICKED
          observe();
          $('#toggler').click();
          $('#modaltype').html('Edit Event');
          $('#eventid').val(event.id);
          $('#title').val(event.title);
          $('#description').val(event.description);
          $('#startpicker').val(cformatDate(event.start));
          $('#endpicker').val(cformatDate(event.end));
          document.querySelector('#forcreate').style.display = 'none';
          document.querySelector('#foredit').style.display = 'block';
          observe();
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
    function cformatDate(inputDate){
      const date = new Date(inputDate);

      const year = date.getFullYear();
      const month = (date.getMonth() + 1).toString().padStart(2, '0');
      const day = date.getDate().toString().padStart(2, '0');
      const hours = date.getHours().toString().padStart(2, '0');
      const minutes = date.getMinutes().toString().padStart(2, '0');
      const seconds = date.getSeconds().toString().padStart(2, '0');

      const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
      return formattedDate;
    }
    function yes(e){
      e.preventDefault();
      console.log("clicked");
    }
    function observe(){
      if(document.querySelector('#title').value !== '' &&
         document.querySelector('#description').value !== '' &&
         document.querySelector('#startpicker').value !== '' &&
         document.querySelector('#endpicker').value !== ''){
        document.querySelector('#forcreate').removeAttribute('disabled');
        document.querySelector('#forupdate').removeAttribute('disabled');
      }else{
        document.querySelector('#forcreate').setAttribute('disabled', 'disabled');
        document.querySelector('#forupdate').setAttribute('disabled', 'disabled');
      }
    }
    
  </script>

@include('partials.__admin_footer')