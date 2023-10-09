@include('partials.__header')
@include('partials.__sidenavbar')

{{-- Main/Middle Section --}}

<section id="mid" class="flex flex-col grow md:basis-2/3 h-fit m-8 content-center">

  <form method="POST" action="javascript:void(0)" id="querier">
  @csrf
    <input type="hidden" name="uid" id="uid">
    <input type="hidden" name="qid" id="qid">
    <input type="hidden" name="cid" id="cid">
    <input type="hidden" name="comment" id="cominput">
      
    <div class="flex flex-col">
      @foreach ($posts as $post)
      @php $def_profile = 'https://avatars.dicebear.com/api/initials/'.$post->users->name.'.svg'; @endphp
        <div class="my-8 mx-auto relative"  x-data="{open: {{$open}}, open2: false, see: {{$see}}}">
          <div class="max-w-md p-6 overflow-hidden rounded-t-lg shadow bg-gray-100 dark:bg-gray-900 dark:text-gray-100 h-min">
            <article>
              <div class="flex items-center mb-8 space-x-4">
                <img src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}" alt="" class="w-10 h-10 rounded-full dark:bg-gray-500">
                <div>
                  <h3 class="text-sm font-medium">{{$post->users->name}}</h3>
                  <time datetime="2021-02-18" class="text-xs dark:text-gray-400">{{$post->query_date}}</time>
                </div>
                {{-- DROPDOWN BUTTON --}}
                <div class="flex justify-end px-4">
                  <button id="dropdownButton" data-dropdown-toggle="dropdown{{$post->id}}" class="absolute top-4 right-4 inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                      <span class="sr-only">Open dropdown</span>
                      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                      </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdown{{$post->id}}" class="z-40 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                      <ul class="py-2" aria-labelledby="dropdownButton">
                        <li id="copylinkbtn" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" 
                            onclick="copylink({{$post->id}})">
                            Copy link
                        </li>
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li> --}}
                        <li onclick="deleteqry({{ $post->id }})">
                            <span class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</span>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
              <p class="mt-4 dark:text-gray-400">{{$post->query}}</p>
            </article>
          </div>
          <x-commentbox :comments="$post->comments" :curqid="$post->id" />
        </div>
      @endforeach   
    </div>
  </form>

</section>

<x-messages />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
  function reactsubmit(type, uid, cid, qid){
    if((cid != 'null' && type == 'react') || (qid != 'null' && type=='comment')){
      span = document.getElementById(`span${cid}`);
      svg = document.getElementById(`heart${cid}`);
      document.getElementById('uid').value = uid;
      document.getElementById('cid').value = cid;
      document.getElementById('qid').value = qid;
      document.getElementById('cominput').value = document.getElementById('txtarea'+qid).value;
      url = (type == 'react') ? "{{ url('ajax-request-react') }}" : "{{ url('ajax-request-comment') }}";
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
            document.getElementById(`heart${cid}`).setAttribute('fill', "#707277");
            document.getElementById(`heart${cid}`).setAttribute('stroke', "#707277");
            span.innerHTML = Number(span.innerText) - 1;
          }
        },
        error:function(xhr){
          console.log(xhr.responseText);
        }
      });
    }
  }
  function copylink(v){
      const textArea = document.createElement("textarea");
      cpylinkbtn = document.querySelector('#copylinkbtn');
      textArea.value = '127.0.0.1:8000/post/forum/'+v;
      document.body.appendChild(textArea);
      textArea.select();
      try {
          document.execCommand("copy");
      } catch (err) {
          console.error("Unable to copy to clipboard:", err);
      } finally {
          document.body.removeChild(textArea);
          cpylinkbtn.innerText = 'Copied.';
      }
      setTimeout(() => {
        cpylinkbtn.innerText = 'Copy link';
      }, 2000);
    }
    function deleteqry(id){
      $.ajax({
        url:'/create-post/action',
        type: 'POST',
        data: { 
          for: 'query',
          id: id,
        },
        success:function(data){
          console.log(' deleted');
        }
      });
    }
</script>

@include('partials.__admin_footer')