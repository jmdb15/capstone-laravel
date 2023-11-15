
    </section>

    <section id="right" class="h-[calc(100%-70px)] mt-[70px] min-w-[324px] max-w-[324px] basis-1/4 overflow-hidden hover:overflow-auto hidden flex-col items-start lg:flex box-border">
        <div class="flex justify-start items-center gap-x-4 w-full py-4 pl-8">
            <span class="text-2xl font-bold">Notifications</span>
            <svg class="p-1" width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://wrww.w3.og/2000/svg">
                <path d="M19.3399 14.49L18.3399 12.83C18.1299 12.46 17.9399 11.76 17.9399 11.35V8.82C17.9399 6.47 16.5599 4.44 14.5699 3.49C14.0499 2.57 13.0899 2 11.9899 2C10.8999 2 9.91994 2.59 9.39994 3.52C7.44994 4.49 6.09994 6.5 6.09994 8.82V11.35C6.09994 11.76 5.90994 12.46 5.69994 12.82L4.68994 14.49C4.28994 15.16 4.19994 15.9 4.44994 16.58C4.68994 17.25 5.25994 17.77 5.99994 18.02C7.93994 18.68 9.97994 19 12.0199 19C14.0599 19 16.0999 18.68 18.0399 18.03C18.7399 17.8 19.2799 17.27 19.5399 16.58C19.7999 15.89 19.7299 15.13 19.3399 14.49Z" fill="#292D32"/>
                <path d="M14.8297 20.01C14.4097 21.17 13.2997 22 11.9997 22C11.2097 22 10.4297 21.68 9.87969 21.11C9.55969 20.81 9.31969 20.41 9.17969 20C9.30969 20.02 9.43969 20.03 9.57969 20.05C9.80969 20.08 10.0497 20.11 10.2897 20.13C10.8597 20.18 11.4397 20.21 12.0197 20.21C12.5897 20.21 13.1597 20.18 13.7197 20.13C13.9297 20.11 14.1397 20.1 14.3397 20.07C14.4997 20.05 14.6597 20.03 14.8297 20.01Z" fill="#292D32"/>
            </svg>
        </div>
          @php
            $def_profile = 'https://avatars.dicebear.com/api/initials/avatar.svg';
        @endphp
            @if (auth()->user())
                @foreach ($notifs as $notif)
                    <div class="group relative" id="ncont-{{$notif->id}}">
                        <a href="{{ ($notif->queries_id) ? '/forum/'.$notif->queries_id : '/post/'.$notif->posts_id }}" 
                            id="{{$notif->id}}"
                            class="notifys mx-auto mt-0">
                            <div class="ctm cursor-pointer flex h-[80px] my-1 relative pr-6 pt-2 w-[280px] hover:bg-gray-100 rounded-lg shadow-sm transition-all overflow-hidden">
                                @if ($notif->posts_id)
                                    @php $ifimg = ($notif->posts->users->image) ? "http://127.0.0.1:8000/storage/student/" .$notif->posts->users->image : $def_profile; 
                                    $image = ($notif->posts->users->type == 'organization') ? $ifimg : "http://127.0.0.1:8000/images/cssp.png"; @endphp
                                    <img src="{{$image}}" class="h-16 w-16 rounded-full mx-3" alt="">
                                @else
                                    <img src="{{$notif->queries->users->image ? asset('storage/student/thumbnail/'.$notif->queries->users->image) : $def_profile}}" class="h-16 w-20 object-fit rounded-full mx-3" alt="">
                                @endif
                                <div class="flex flex-col w-[240px]">
                                    <p><strong>{{$notif->name}}</strong>{{$notif->content}}</p>
                                </div>
                                @if ($notif->is_read == 0)
                                    <span id="notif-indicator{{$notif->id}}" class="absolute right-1 top-1/2 -translate-y-1/2 bg-blue-500 h-4 w-4 rounded-full">ׂׂׂ</span>
                                @endif
                            </div>
                        </a>
                        <!-- DROPDOWN -->
                            <div class="flex justify-end px-4">
                                <button id="dropdownButton" data-dropdown-toggle="dropdown{{$notif->id}}" class="absolute top-1/2 right-6 transform -translate-y-1/2 hidden group-hover:inline-block text-gray-100 bg-gray-400 hover:brightness-110 rounded-full text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown{{$notif->id}}" class="z-40 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-fit">
                                    <ul class="py-2" aria-labelledby="dropdownButton">
                                        <li data-id="{{$notif->id}}" class="mark-as block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Mark as read
                                        </li>
                                        <li id="remove-notif-{{$notif->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100" onclick="hideNotif({{$notif->id}})">

                                            Remove this notification
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END DROPDOWN -->
                        </div>
                @endforeach
            @else
                <h2 class="text-xl font-light text-center">Login to get notified.</h2>
            @endif
    </section>
        
    <x-chatbot />
</main>


  
@vite(['resources/js/chatapp.js'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
<script defer>
    function randomize(){
        fetch('http://127.0.0.1:8000/json/intents.json')
        .then(response => response.json())
        .then(data => {
            let x = 0;
            try{
                const btns = document.querySelectorAll('.bot-quick-chat');
                while(x <= 3){
                  for (const element of data.intents) {
                    if(Math.floor(Math.random() * 2)){
                      const index = Math.floor(Math.random() * (element.patterns.length));
                      btns[x].innerText = element.patterns[index];
                      x++;
                    }
                    if(x == 3){
                      break
                    }
                  }
                  if(x == 3){
                    break
                  }
                };
            }catch(e){
                // console.log(e);
            }
        })
        .catch(error => {
            console.error('Error loading JSON file:', error);
        });
    }

    function sendMsg(s){
        const chatinp = document.querySelector('#chatbot-input');
        chatinp.value = s.innerText;
        document.querySelector('.send__button').click();
    }
    
    allAs = document.querySelectorAll('.notifys');
    allAs.forEach(function(a){
        a.addEventListener('click', function(e){
            id = a.id;
            hre = a.href;
            viewNotif(e, id, hre);
        });
    })
    marks = document.querySelectorAll('.mark-as');
    marks.forEach(function(a){
        a.addEventListener('click', function(e){
            id = a.getAttribute('data-id');
            viewNotif(e, id, '', false);
        });
    })

    function viewNotif(e, notifyid, hre = '', redirect = true){
        e.preventDefault();
        $('#notif-indicator'+notifyid).css("display", "none");
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/read-notifs',
            type: 'POST',
            data: {
                id: notifyid
            },
            success: function(data){
                console.log(data)
                if(redirect)
                    location.href = hre;
            }
        });
    }

    function hideNotif(id){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/hide-notifs',
            type: 'POST',
            data: {
                id: id
            },
            success: function(data){
                console.log(data)
                document.querySelector(`#ncont-${id}`).remove();
            }
        });
    }

</script>
{{-- END OF CHATBOT --}}
