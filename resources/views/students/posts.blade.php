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
      cpylinkbtn = document.querySelector('#copylinkbtn');
      textArea.value = '127.0.0.1:8000/post/'+v;
      document.body.appendChild(textArea);
      textArea.select();
      try {
          document.execCommand("copy");
      } catch (err) {
          console.error("Unable to copy to clipboard:", err);
      } finally {
          document.body.removeChild(textArea);
          cpylinkbtn.innerText = 'Copied.';
      }
      setTimeout(() => {
        cpylinkbtn.innerText = 'Copy link';
      }, 2000);
    }
</script>

@include('partials.__notifications', ['notifs' => $notifs])
@include('partials.__footer')