@include('partials.__header')
@include('partials.__navbar')
@include('partials.__sidebar', ['show' => true])

{{-- Main/Middle Section --}}

  <form method="POST" action="javascript:void(0)" id="querier">
  @csrf
    <input type="hidden" name="name" id="namee">
    <input type="hidden" name="uid" id="uid">
    <input type="hidden" name="qid" id="qid">
    <input type="hidden" name="cid" id="cid">
    <input type="hidden" name="comment" id="cominput">
      
    <div class="flex flex-col">
      @foreach ($posts as $post)
      @php $def_profile = 'https://avatars.dicebear.com/api/initials/'.$post->users->name.'.svg'; @endphp
        <div class="my-8 mx-auto" x-data="{open2: {{$open}}, see: {{$see}}}">
          <div class="max-w-md p-6 overflow-hidden rounded-t-lg shadow bg-gray-100 h-min">
            <article>
              <div class="flex items-center mb-8 space-x-4">
                <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full">
                <div>
                  <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                  <time datetime="2021-02-18" class="text-xs">{{$post->created_at}}</time>
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
<script>
  function reactsubmit(type, uid, namee, cid, qid){
    if((cid != 'null' && type == 'react') || (qid != 'null' && type=='comment')){
      span = document.getElementById(`span${cid}`);
      svg = document.getElementById(`heart${cid}`);
      document.getElementById('namee').value = namee;
      document.getElementById('uid').value = uid;
      document.getElementById('cid').value = cid;
      document.getElementById('qid').value = qid;
      document.getElementById('cominput').value = document.getElementById(`txtarea${qid}`).value;
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
    const timeElapsed = Date.now();
    let today = new Date(timeElapsed);    
    today = today.toDateString();
    $('#new-comment-name'+qid).html(namee)
    $('#new-comment-date'+qid).html(today);
    $('#new-comment-msg'+qid).html(document.getElementById(`txtarea${qid}`).value);
    document.getElementById(`txtarea${qid}`).value = '';
  }
</script>

@include('partials.__footer')