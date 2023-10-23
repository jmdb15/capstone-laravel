@include('partials.__navbar')
@include('partials.__header')

  {{$user}}
  @if (!auth()->user())
    hello
  @else
    hi
  @endif
</body>
</html>