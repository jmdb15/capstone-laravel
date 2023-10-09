@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

{{-- MIDDLE SECTION --}}
<section id="mid" class="grid place-items-center grow md:basis-2/3 h-fit pt-10 mx-[384px] px-8" x-data="{show:false}"></section>

@include('partials.__notifications')
@include('partials.__footer')