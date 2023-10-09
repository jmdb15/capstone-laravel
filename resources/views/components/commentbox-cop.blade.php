@php $cid = $comments != null ? $comments[0]->id : 'null'; $qid = $comments != null ? $comments[0]->queries_id : 'null'; 
$def_profile_comment = 'https://avatars.dicebear.com/api/initials/'.auth()->user()->name.'.svg'; @endphp
<div class="card">
  <div class="title">
    <span x-on:click="open = !open">
      Comments 
      @if ($comments[0]->comment_count)
        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
          {{$comments ? $comments[0]->comment_count : '0'}}
        </span>
      @endif
    </span>
    <a href="/forum/{{$curqid}}">  
      <button type="button" class="text-black transition-all hover:bg-[#e1e1e1] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          See more
          <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
      </button>
    </a>
  </div>
  <div class="text-box">
    <div class="box-container">
      <textarea placeholder="Answer" class="w-[90%]" id="txtarea{{$curqid}}"></textarea>
      <div>
        <div class="formatting">
          <button x-on:click="opennew = !opennew" class="send" title="Send" id="send" onclick="reactsubmit('comment', {{auth()->user()->id}}, '{{auth()->user()->name}}', {{$cid}}, {{$curqid}})">
            <svg class="rotate-90" fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
              <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Hidden for user's new comment --}}
  <div id="new-comment{{ $qid }}">
    <div class="comments" x-show="opennew">
      <div class="comment-react">
          <button>
              <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                <path id="heart" fill="#070400" stroke="#070400" stroke-linecap="round" stroke-width="2" d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z"></path>
              </svg>
          </button>
        <hr>
        <span>0</span>
      </div>
      <div class="comment-container">
        <div class="user">
          <div class="user-pic">
            <img src="{{auth()->user()->image ? asset('storage/student/'.auth()->user()->image) : $def_profile_comment}}" alt="">
          </div>
          <div class="user-info">
            <span id="new-comment-name{{ $qid }}"></span>
            <p id="new-comment-date{{ $qid }}"></p>
          </div>
        </div>
        <p class="comment-content" id="new-comment-msg{{ $qid }}"></p>
      </div>
    </div>
  </div>

  @foreach ($comments as $comment)
    @if ($comment != null)
      <x-comment :comment="$comment"/>
    @endif
  @endforeach
</div>

