<div class="chatbox z-[1234567]">
    <div class="chatbox__support">
        <div class="chatbox__header">
            <div class="chatbox__image--header">
                <img src="{{ url('images/chatbot.png')}}" alt="image" class="w-16 aspect-square">
            </div>
            <div class="chatbox__content--header">
                <h4 class="chatbox__heading--header">Chat support</h4>
                <p class="chatbox__description--header">Hi. My name is Rajah. How can I help you?</p>
            </div>
        </div>
        <div class="chatbox__messages">
            <div>
                <div class="flex flex-col gap-y-4 w-full">
                    <button class="bot-quick-chat w-full my-2 px-3 py-2 text-center text-sm rounded-full cursor-pointer bg-gray-400 hover:brightness-110 opacity-80" onclick="sendMsg(this)">Which programs are offered within the CSSP?</button>
                    <button class="bot-quick-chat w-full my-2 px-3 py-2 text-center text-sm rounded-full cursor-pointer bg-gray-400 hover:brightness-110 opacity-80" onclick="sendMsg(this)">How can I engage with the CSSP community?</button>
                    <button class="bot-quick-chat w-full my-2 px-3 py-2 text-center text-sm rounded-full cursor-pointer bg-gray-400 hover:brightness-110 opacity-80" onclick="sendMsg(this)">Could you provide information about Rajah?</button>
                </div>
            </div>
        </div>
        <div class="chatbox__footer">
            <input type="text" placeholder="Write a message..." id="chatbot-input">
            <button class="chatbox__send--footer send__button">
              <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
              </svg>
            </button>
        </div>
    </div>
</div>
<div class="chatbox__button w-fit absolute bottom-5 right-5" onclick="randomize()">
    <button type="button" class="w-fit"><img src="{{ url('images/chatbot.png')}} " class="h-10" /></button>
</div>