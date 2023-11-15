<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="{{asset('storage/student/thumbnail/cssp.png')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/css/typing.css','resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@700&display=swap" rel="stylesheet">
  <title>{{ $title }}</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  <style>
      .text-xl.ml-3 {
          font-family: 'Martian Mono', monospace;
          color: white;
      }
  </style>
</head>
