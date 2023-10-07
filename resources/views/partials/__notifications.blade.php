  
  <section id="right" class="relative hidden m-0 h-auto w-[280px] max-w-sm lg:block lg:basis-1/4">
    <div class="hidden md:flex flex-col w-inherit max-w-full bg-gray-200 ">
    <!-- title -->
    <div class="flex item-center justify-center w-full py-4 m-0">
      <img src="{{url('images/Untitled-1.ico')}}" class="h-12 rounded-full" alt="">
      <p class="text-2xl ml-2">Notifications</p>
    </div>
    <!-- items -->
    <div class="flex flex-col px-2 mt-4" id="notif_cont">
      @foreach ($notifs as $notif)
        <div class="cursor-pointer flex h-fit my-4 border-2 border-b-gray-400 rounded-lg" onclick="goto({{$notif->id}})">
            <img src="{{url('images/Untitled-1.ico')}}" class="h-16 rouded-full mx-3" alt="">
            <div class="flex flex-col">
              <h2 class="font-bold">{{$notif->postman}}</h2>
              <p>{{$notif->content}}</p>
            </div>
          </div>
      @endforeach
    </div>
    </div>
  </section>

  <x-chatbot />
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
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
