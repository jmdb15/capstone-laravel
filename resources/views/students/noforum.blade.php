<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="{{asset('storage/student/thumbnail/cssp.png')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>{{ $title }}</title>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
  @include('partials.__navbar')
  @include('partials.__sidebar', ['show' => true])
  @include('partials.__notifications')

    <div modal-backdrop class="bg-gray-900 bg-opacity-100 blur-3xl dark:bg-opacity-80 fixed inset-0 z-40"></div>
    <div data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex">
      <div class="relative w-full max-w-md max-h-full">
          <div class="relative bg-white bg-red0 rounded-lg shadow dark:bg-gray-700">
            <div class="p-6 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Please verify your account first!</h3>
              <button onclick="gotoverify({{auth()->user() ? auth()->user()->id : 0 }})" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                {{(auth()->user()) ? 'Verify' : 'Login'}}
              </button>
              <button onclick="gotoprev()" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Return</button>
            </div>
          </div>
      </div>
    </div>

    <script>
      function gotoverify(id){
        console.log(id)
        if(id === 0){
          location.href = '/login';
        }else{
          location.href = `/profile/${id}`;
        }
      }
      function gotoprev(){
        var currentPageUrl = window.location.href;
        var previousPageUrl = document.referrer;
        if(currentPageUrl === previousPageUrl){
          location.href = '/about';
        }else{
          location.href = previousPageUrl;
        }
      }
    </script>

@include('partials.__footer')