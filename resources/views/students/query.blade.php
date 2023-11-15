@php use Carbon\Carbon; use Illuminate\Support\Facades\DB; @endphp
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
      @php 
        $def_profile = 'https://avatars.dicebear.com/api/initials/avatar.svg'; 
        $date = Carbon::parse($post->query_date);
        $date = $date->format('l, F j, Y g:i A');
      @endphp
        <div class="my-8 mx-auto w-[96%] max-w-[562px]" x-data="{open2: {{$open}}, see: {{$see}}}">
          <div class="b4-card w-full p-6 overflow-hidden rounded-t-lg bg-gray-100 h-min ">
            <!-- DROPDOWN -->
            <div class="flex justify-end px-4 relative">
              <button id="dropdownButton" data-dropdown-toggle="dropdown{{$post->id}}" class="absolute -top-2 -right-2 inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
                  <span class="sr-only">Open dropdown</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                      <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                  </svg>
              </button>
              <!-- Dropdown menu -->
              <div id="dropdown{{$post->id}}" class="z-40 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                  <ul class="py-2" aria-labelledby="dropdownButton">
                    <li id="copylinkbtn{{$post->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                        onclick="copylink('{{$post->id}}')">
                        <svg class="inline mr-1.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16"> 
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> 
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> 
                        </svg>
                        Copy link
                    </li>
                    <li onclick="setReportFor('queries', {{$post->id}})"
                      data-modal-target="report-modal" 
                      data-modal-toggle="report-modal"
                      id="report-{{$post->id}}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100" >
                        <svg class="inline opacity-40 fill-current group-hover:text-red-600 group-hover:opacity-90 mr-1" fill="#ccc" width="20px" height="20px" viewBox="205 205 612 612" xmlns="http://www.w3.org/2000/svg"><path d="M512 768a256 256 0 1 1 0-512 256 256 0 0 1 0 512zm-27-168c-8 7-11 16-11 27s3 20 11 27c7 8 16 11 27 11s20-3 28-11c8-7 11-16 11-27s-3-20-11-27c-8-8-17-11-28-11s-20 4-27 11zm50-47l15-195h-76l15 195h46z"/></svg>
                        Report
                    </li>
                  </ul>
              </div>
            </div>
              <!-- END DROPDOWN -->
            <article>
              <div class="flex items-center mb-8 space-x-4">
                <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full">
                <div>
                  <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                  <time class="text-xs">{{$date}}</time>
                </div>
              </div>
              <p class="mt-4">{{$post->query}}</p>
              @if ($post->image)
                <img src="{{asset('storage/student/questions/'. $post->image)}}" alt="" class="mx-auto max-h-[364px]">
              @endif
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
    let reportFor = '';
    let reportType = '';
    let reportId = '';

    function setReportFor(type, id){
      reportFor = type;
      reportId = id;
    }

    function setReport(elem, type){
      reportType = type;
    }

    function confirmReport(){
      let content = reportType, queries_id = '', comments_id = '';
      if(reportFor == 'queries'){
        queries_id = reportId;
      }else{
        comments_id = reportId;
      }
       $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/send-report',
            type: 'POST',
            data: { 
              content : content, 
              queries_id : queries_id, 
              comments_id : comments_id 
            },
            success: function(data){
                console.log(data);
            }
        });
    }

    function copylink(v) {
    const textArea = document.createElement("textarea");
    cpylinkbtn = document.querySelector('#copylinkbtn' + v);
    textArea.value = '127.0.0.1:8000/forum/' + v;
    document.body.appendChild(textArea);
    textArea.select();
    try {
      document.execCommand("copy");
    } catch (err) {
      console.error("Unable to copy to clipboard:", err);
    } finally {
      document.body.removeChild(textArea);
      cpylinkbtn.innerHTML = `<svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/> <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> </svg> 
                                  Copied`;
    }
    setTimeout(() => {
      cpylinkbtn.innerHTML = `<svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16"> 
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/> 
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/> 
                </svg> Copy link`;
    }, 2000);
  }
    
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
  <x-report_modal />

@include('partials.__footer')