{{-- <script>
   const element = document.getElementById('logo-sidebar');
   const moveButton = document.querySelector('#sidebar_button');
   console.log(moveButton)
   moveButton.addEventListener('click', () => {
      element.classList.toggle('element');
   });
</script> --}}
<script defer>
   function showScrollbar(element) {
      element.style.overflow = 'auto';
   }

   function hideScrollbar(element) {
      element.style.overflow = 'hidden';
   }
</script>
@vite(['resources/js/chatapp.js'])

{{-- CHATBOT --}}

</body>
</html>