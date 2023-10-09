@include('partials.__header')
@include('partials.__navbar')
{{-- @include('partials.__sidebar') --}}

<main class="w-screen flex flex-col sm:flex-row max-w-1920 mx-auto">

<section>
    <header class="max-w-lg mx-auto">
      <a href="" >
        <h1 class="text-4xl font-bold text-white text-center">{{ $title }}</h1>
      </a>
    </header>
    <div class="overflow-x-auto relative mx-auto" 
    x-data="{ open: false, open2: false, image:'', id: '', name: '', email: '', type: '', created_at: '', modal_type:'' }">
      <table class="max-w-7xl mx-auto text-sm text-gray-500 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="py-3 px-6"></th>
            <th scope="col" class="py-3 px-6">Name</th>
            {{-- <th scope="col" class="py-3 px-6">Age</th>
            <th scope="col" class="py-3 px-6">Sex</th> --}}
            <th scope="col" class="py-3 px-6">Email</th>
            <th scope="col" class="py-3 px-6">Actions</th>
          </tr>
        </thead>
        <tbody>
          @php $index=0; @endphp
          @foreach ($students as $student)
            @php $index++; 
              if($index%2==0){
                echo '<tr class="bg-gray-700 border-b text-white">';
              }else{
                echo '<tr class="bg-gray-500 border-b text-white">';
              }
            @endphp
              <x-td :student="$student" />
            </tr>
          @endforeach
        </tbody>
      </table>
      <x-modal />
      <x-changepass />
    </div>
  </section>
  {{-- Components --}}
  <x-messages />
  
  {{-- @include('partials.__notifications') --}}
  {{-- <script src="{{ asset('resources/js/chatapp.js') }}"></script> --}}

@include('partials.__footer')

{{-- <h1 class="text-3xl font-bold underline animate-bounce">
  Hello world!!
</h1>
<ul>
  @foreach ($students as $student)
    <li>{{ $student->name }}</li>
  @endforeach
</ul> --}}