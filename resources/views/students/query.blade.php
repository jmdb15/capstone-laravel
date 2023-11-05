@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])

{{-- Main/Middle Section --}}

  <form method="POST" action="javascript:void(0)" id="querier" class="w-full px-0">
  @csrf
    <input type="hidden" name="name" id="namee">
    <input type="hidden" name="uid" id="uid">
    <input type="hidden" name="qid" id="qid">
    <input type="hidden" name="cid" id="cid">
    <input type="hidden" name="comment" id="cominput">
      
    <div class="flex flex-col w-full p-0 md:m-auto">
      @foreach ($posts as $post)
      @php $def_profile = 'https://avatars.dicebear.com/api/initials/avatar.svg'; @endphp
        <div class="my-8 mx-auto w-[96%] max-w-[562px]" x-data="{open2: {{$open}}, see: {{$see}}}">
          <div class="b4-card w-full p-6 overflow-hidden rounded-t-lg bg-gray-100 h-min">
            <article>
              <div class="flex items-center mb-8 space-x-4">
                <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full">
                <div>
                  <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                  <time class="text-xs">{{$post->query_date}}</time>
                </div>
              </div>
              <p class="mt-4">{{$post->query}}</p>
            </article>
          </div>
          <x-commentbox :comments="$post->comments" :curqid="$post->id" />
        </div>
      @endforeach   
    </div>
  </form>

  <x-messages />

@include('partials.__notifications', ['notifs' => $notifs])
@if (auth()->user() && auth()->user()->email_verified_at != null)
  <script defer>
    function reactsubmit(type, uid, namee, cid, qid){
      let txtarea = document.getElementById(`txtarea${qid}`);
      if((cid != 'null' && type == 'react') || (qid != 'null' && type=='comment')){
        span = document.getElementById(`span${cid}`);
        svg = document.getElementById(`heart${cid}`);
        document.getElementById('namee').value = namee;
        document.getElementById('uid').value = uid;
        document.getElementById('cid').value = cid;
        document.getElementById('qid').value = qid;
        document.getElementById('cominput').value = txtarea.value;
        if((txtarea.value != '' && type == 'comment') || type == 'react'){
            url = (type == 'react') ? "{{ url('ajax-request-react') }}" : "{{ url('ajax-request-comment') }}";
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              type: 'POST',
              url: url,
              data: $('#querier').serialize(),
              success: function(data){
                if(data == 'add'){
                  svg.setAttribute('fill', "#f5356e");
                  svg.setAttribute('stroke', "#f5356e");
                  span.innerHTML = Number(span.innerText) + 1;
                }else if(data == 'commented'){
                  console.log(data)
                }else if(data == ''){
                  console.log('yung empty')
                }else{
                  svg.setAttribute('fill', "#707277");
                  svg.setAttribute('stroke', "#707277");
                  span.innerHTML = Number(span.innerText) - 1;
                }
              },
              error:function(xhr){
                console.log(xhr.responseText);
              }
            });  
          }
        }
        if(type=='comment' && txtarea.value !== ''){
          const timeElapsed = Date.now();
          let today = new Date(timeElapsed);    
          today = today.toDateString();
      
          let newCom = `<div>
                      <div class="comments">
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
                              <img src="{{ auth()->user()->image ? asset('storage/student/'.auth()->user()->image) : 'https://avatars.dicebear.com/api/initials/avatar.svg'}}" alt="">
                            </div>
                            <div class="user-info">
                              <span>${namee}</span>
                              <p>${today}</p>
                            </div>
                          </div>
                          <p class="comment-content">${document.getElementById(`txtarea${qid}`).value}</p>
                        </div>
                      </div>
                    </div>`;
      
          const orig = document.querySelector(`#comment-container-${qid}`).innerHTML;
          document.querySelector(`#comment-container-${qid}`).innerHTML = '';
          document.querySelector(`#comment-container-${qid}`).innerHTML += newCom + orig;
          document.getElementById(`txtarea${qid}`).value = '';
        }
    }
  </script>
@endif

@include('partials.__footer')