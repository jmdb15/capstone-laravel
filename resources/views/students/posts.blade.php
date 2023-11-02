@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])

  @if(auth()->user()->type == 'organization')
    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 w-full mb-10">
        <img src="{{url('images/cssp.png')}}" alt="CSSP logo" class="h-10 w-10">
        @error('image')
          <p class="text-red-500 text-sm mt-2 text-center mb-0">{{ $message }}</p>
        @enderror
        <input data-modal-target="create-post-modal" data-modal-toggle="create-post-modal" type="text" id="chat" class="hover:bg-gray-100 cursor-pointer block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Create post" />
    </div>
  @endif

  <div class="flex flex-col gap-3 mx-2">
    @foreach ($posts as $post)
      <x-card :post="$post" />
    @endforeach
  </div>

  <x-toast />

{{-- View Image Modal --}}
<div id="imageModal" class="modal">
  <span id="viewImageCloseButton">&times;</span>
  <img class="modal-content" id="modalImage" src="" alt="Image" />
</div>

<x-messages />

@include('partials.__notifications', ['notifs' => $notifs])

<x-createpost_modal />  
<script>
  function copylink(v) {
    const textArea = document.createElement("textarea");
    cpylinkbtn = document.querySelector('#copylinkbtn' + v);
    textArea.value = '127.0.0.1:8000/post/' + v;
    document.body.appendChild(textArea);
    textArea.select();
    try {
      document.execCommand("copy");
    } catch (err) {
      console.error("Unable to copy to clipboard:", err);
    } finally {
      document.body.removeChild(textArea);
      cpylinkbtn.innerHTML = `<span> <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/> <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> </svg> 
                                  Copied</span>`;
    }
    setTimeout(() => {
      cpylinkbtn.innerText = 'Copy link';
    }, 2000);
  }
</script>

@include('partials.__footer')