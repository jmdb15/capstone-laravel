
@php 
  $def_profile = (auth()->user()) ? 'https://avatars.dicebear.com/api/initials/'.auth()->user()->name.'.svg' : 'https://avatars.dicebear.com/api/initials/avatar.svg';
@endphp
<div class="card" x-data="{opennew: false}">
  <div class="title">
    <a>  
      <button type="button" x-on:click="open2 = !open2" class="text-black transition-all hover:bg-[#e1e1e1] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center">
          Comments
      </button>
    </a>
    <a href="/forum/{{$curqid}}" x-show="see">  
      <button type="button" class="text-black transition-all hover:bg-[#e1e1e1] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center">
          See more
          <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
      </button>
    </a>
  </div>
  @php $cid = 'null'; @endphp
  @if (auth()->user())
    <div class="text-box">
      <div class="box-container">
        <textarea placeholder="Answer" class="w-[90%]" id="txtarea{{$curqid}}"></textarea>
        <div>
          <div class="formatting">
            <button type="button" class="send" title="Send" id="send" onclick="reactsubmit('comment', {{auth()->user()->id}}, '{{auth()->user()->name}}', {{$cid}}, {{$curqid}})" x-on:click="opennew = true">
              <svg class="rotate-90" fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  @endif

  <div id="comment-container-{{$curqid}}">
    @foreach ($comments as $comment)
      @if ($comment != null)
          <x-comment :comment="$comment"/>
      @endif
    @endforeach
  </div>
</div>