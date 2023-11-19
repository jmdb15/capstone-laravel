{{-- <script>
   const element = document.getElementById('logo-sidebar');
   const moveButton = document.querySelector('#sidebar_button');
   console.log(moveButton)
   moveButton.addEventListener('click', () => {
      element.classList.toggle('element');
   });
</script> --}}
@vite(['resources/js/chatapp.js'])
@vite(['resources/js/checkNewPosts.js'])

<div
id="toast-success" 
class="fixed top-20 right-[40%] z-20 h-fit hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" 
role="alert">
    <div class="ml-3 text-sm font-normal" id="toast-notif"></div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
{{-- CHATBOT --}}

</body>
</html>