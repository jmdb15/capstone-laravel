@php 
    use Carbon\Carbon; use Illuminate\Support\Facades\DB;
    $c = $comment;
    $def_profile_comment = 'https://avatars.dicebear.com/api/initials/'.$c->name.'.svg'; 
    $date = Carbon::parse($c->comment_date);
    $date = $date->format('l, F j, Y g:i A');
    $cid = $c ? $c->id:'';
    $cuid = (auth()->user()) ? auth()->user()->id : 1;
    $first = DB::table('votes')->where('users_id', $cuid)->where('checked', '1')->where('comments_id', $cid)->get();
    $color = (count($first) > 0) ? '#f5356e' : '#707277';
@endphp
<div class="comments relative" x-show="open2">
  <svg onclick="setReportFor('comment', {{$cid}})" 
      data-modal-target="report-modal" 
      data-modal-toggle="report-modal" class="absolute top-4 right-4 fill-current opacity-40 hover:text-red-600 hover:opacity-90 cursor-pointer" fill="#ccc" width="20px" height="20px" viewBox="205 205 612 612" xmlns="http://www.w3.org/2000/svg"><path d="M512 768a256 256 0 1 1 0-512 256 256 0 0 1 0 512zm-27-168c-8 7-11 16-11 27s3 20 11 27c7 8 16 11 27 11s20-3 28-11c8-7 11-16 11-27s-3-20-11-27c-8-8-17-11-28-11s-20 4-27 11zm50-47l15-195h-76l15 195h46z"/></svg>

  @if (auth()->user() && auth()->user()->email_verified_at != null)
    <div class="comment-react">
        <button onclick="reactsubmit('react', {{$cuid}}, '{{auth()->user()->name}}', {{$cid}}, {{$c->queries_id}})">
            <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
              <path id="heart{{$cid}}" fill="{{$color}}" stroke="{{$color}}" stroke-linecap="round" stroke-width="2" d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z"></path>
            </svg>
        </button>
      <hr>
      <span id="span{{$cid}}">{{$c->vote_count}}</span>
    </div>
  @else
    <div class="comment-react">
        <button>
            <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
              <path fill="{{$color}}" stroke="{{$color}}" stroke-linecap="round" stroke-width="2" d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z"></path>
            </svg>
        </button>
      <hr>
      <span id="span{{$cid}}">{{$c->vote_count}}</span>
    </div>
  @endif
  <div class="comment-container">
    <div class="user">
      <div class="user-pic">
        <img src="{{$c->image ? asset('storage/student/'.$c->image) : $def_profile_comment}}" alt="">
        @if ($c->trusted == 1)
          <img src="{{asset('images/icons/badge.png')}}" alt="badge" class="h-6 w-6 bg-green-200 absolute -bottom-3 -right-1">      
        @endif
      </div>
      <div class="user-info">
        <span>{{$c->name}}</span>
        <p>{{$date}}</p>
      </div>
    </div>
    <p class="comment-content">
      {{$c->comment}}
    </p>
  </div>
</div>