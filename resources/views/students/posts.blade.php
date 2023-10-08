@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar')

<main class="w-screen flex flex-col sm:flex-row max-w-1920 mx-auto">
  <section id="mid" class="grid place-items-center grow md:basis-2/3 h-fit pt-10" x-data="{show:false}">

    <div class="flex flex-col gap-3 mx-2">
      @foreach ($posts as $post) 
        <x-card :post="$post" />
      @endforeach
    </div>

    <x-toast />

  </section>
</main>

{{-- View Image Modal --}}
<div id="imageModal" class="modal">
    <span id="viewImageCloseButton">&times;</span>
    <img class="modal-content" id="modalImage" src="" alt="Image" />
</div>

<script>
  function copylink(v){
      const textArea = document.createElement("textarea");
      cpylinkbtn = document.querySelector('#copylinkbtn'+v);
      textArea.value = '127.0.0.1:8000/post/'+v;
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

@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')