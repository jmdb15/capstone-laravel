@php $cid = $comments != null ? $comments[0]->id : 'null'; $qid = $comments != null ? $comments[0]->queries_id : 'null'; @endphp
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
          <button class="send" title="Send" id="send" onclick="reactsubmit('comment', {{auth()->user()->id}}, '{{auth()->user()->name}}', {{$cid}}, {{$curqid}})">
            <svg fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
              <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
  @foreach ($comments as $comment)
    @if ($comment != null)
      <x-comment :comment="$comment"/>
    @endif
  @endforeach
</div>

