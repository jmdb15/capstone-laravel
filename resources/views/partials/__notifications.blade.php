
    </section>

    <section id="right" class="h-[calc(100%-70px)] mt-[70px] min-w-[324px] max-w-[324px] overflow-y-auto basis-1/4 hidden flex-col items-center lg:flex">
      {{-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
      </div> --}}
        @foreach ($notifs as $notif)
            <a href="{{ ($notif->queries_id) ? '/forum/'.$notif->queries_id : '/post/'.$notif->posts_id }}" 
                {{-- onclick="viewNotif({{$notif->id}})" --}}
                id="{{$notif->id}}"
                class="notifys mx-auto mt-0">
                <div class="ctm cursor-pointer flex h-[80px] my-1 relative pr-6 w-[280px] hover:bg-gray-100 rounded-lg shadow-sm transition-all overflow-hidden">
                    <img src="{{url('images/Untitled-1.ico')}}" class="h-16 rouded-full mx-3" alt="">
                    <div class="flex flex-col w-[240px]">
                        <h2 class="font-bold">{{($notif->queries_id) ? 'Student' : 'Admin'}}</h2>
                        <p>{{$notif->content}}</p>
                    </div>
                    @if ($notif->is_read == 0)
                        <span id="notif-indicator{{$notif->id}}" class="absolute right-2 top-1/2 bg-blue-500 h-4 w-4 rounded-full">ׂׂׂ</span>
                    @endif
                </div>
            </a>
        @endforeach
    </section>
        
    <x-chatbot />
</main>


  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
<script defer>
    allAs = document.querySelectorAll('.notifys');
    allAs.forEach(function(a){
        a.addEventListener('click', function(e){
            id = a.id;
            hre = a.href;
            viewNotif(e, id, hre);
        });
    })

    function viewNotif(e, notifyid, hre){
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
                console.log(data);
                location.href = hre;
            }
        });
    }

  class Chatbox {
    constructor() {
        this.args = {
            openButton: document.querySelector('.chatbox__button'),
            chatBox: document.querySelector('.chatbox__support'),
            sendButton: document.querySelector('.send__button')
        }

        this.state = false;
        this.messages = [];
    }

    display() {
        const {openButton, chatBox, sendButton} = this.args;

        openButton.addEventListener('click', () => this.toggleState(chatBox))

        sendButton.addEventListener('click', () => this.onSendButton(chatBox))

        const node = chatBox.querySelector('input');
        node.addEventListener("keyup", ({key}) => {
            if (key === "Enter") {
                this.onSendButton(chatBox)
            }
        })
    }

    toggleState(chatbox) {
        this.state = !this.state;

        // show or hides the box
        if(this.state) {
            chatbox.classList.add('chatbox--active')
        } else {
            chatbox.classList.remove('chatbox--active')
        }
    }

    onSendButton(chatbox) {
        var textField = chatbox.querySelector('input');
        let text1 = textField.value
        if (text1 === "") {
            return;
        }

        let msg1 = { name: "User", message: text1 }
        this.messages.push(msg1);

        //http://127.0.0.1:5000/predict
        fetch('http://127.0.0.1:5000/predict', {
            method: 'POST',
            body: JSON.stringify({ message: text1 }),
            mode: 'cors',
            headers: {
              'Content-Type': 'application/json'
            },
          })
          .then(r => r.json())
          .then(r => {
            let msg2 = { name: "Sam", message: r.answer };
            this.messages.push(msg2);
            this.updateChatText(chatbox)
            textField.value = ''

        }).catch((error) => {
            console.error('Error:', error);
            this.updateChatText(chatbox)
            textField.value = ''
          });
    }

    updateChatText(chatbox) {
        var html = '';
        this.messages.slice().reverse().forEach(function(item, index) {
            if (item.name === "Sam")
            {
                html += '<div class="messages__item messages__item--visitor">' + item.message + '</div>'
            }
            else
            {
                html += '<div class="messages__item messages__item--operator">' + item.message + '</div>'
            }
          });

        const chatmessage = chatbox.querySelector('.chatbox__messages');
        chatmessage.innerHTML = html;
    }
}

const chatbox = new Chatbox();
chatbox.display();

  // $.ajaxSetup({
  //         headers:{
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //         }
  //     });
  // $.ajax({
  //   url: '/process-notifs',
  //   type: 'GET',
  //   success: function(data){
  //     // populateNotifs(data);
  //   }
  // })
  // function populateNotifs(data){
  //   $('#notif_cont').empty();
  //   i = Object.keys(data).length - 1;
  //   for (const key in data) {
  //       $('#notif_cont').append(`
  //         <div class="cursor-pointer flex h-16 my-4" onclick="goto(http://127.0.0.1:8000/forum/'${data[i].id}')">
  //           <img src="{{url('images/Untitled-1.ico')}}" class="h-full rouded-full mx-3" alt="">
  //           <div class="flex flex-col">
  //             <h2 class="font-bold">${data[i].postman}</h2>
  //             <p>${data[i].content}</p>
  //           </div>
  //         </div>
  //       `);
  //       i--;
  //   }
  // }
</script>
{{-- END OF CHATBOT --}}
