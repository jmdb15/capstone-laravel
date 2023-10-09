@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

<section id="mid" class="flex flex-col grow md:basis-2/3 bg-gray-50 h-fit">
  <x-messages />
  {{ auth()->user() }}
</section>

@include('partials.__notifications')
@include('partials.__footer')