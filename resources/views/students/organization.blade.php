@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

{{-- MIDDLE SECTION --}}
{{-- <section id="mid" class="grid place-items-center grow md:basis-2/3 h-fit pt-10 mx-[384px] px-8" x-data="{show:false}"></section> --}}
<h1 class="mx-auto text-3xl text-center text-gray-800 font-bold mt-6 mb-10 ">Organizations</h1>

<div class="w-full m-0 p-0 flex justify-center flex-wrap gap-6">

  @foreach ($orgs as $org)
    @php $image = ($org->image) ? "asset('storage/student/thumbnail/".$org->image."')" : 'https://avatars.dicebear.com/api/initials/avatars.svg'; @endphp
    <a href="org/{{$org->id}}">
      <div class="h-32 basis-[45%] min-w-[294px] border-[1px] border-gray-100 bg-gray-50 flex items-center justify-center gap-x-5 rounded-md">
        <img src="https://avatars.dicebear.com/api/initials/avatars.svg" alt="" class="h-[60%] w-auto rounded-full">
        <h2 class="text-2xl font-bold">{{$org->name}}</h2>
      </div>
    </a>
  @endforeach
</div>

@include('partials.__notifications')
@include('partials.__footer')