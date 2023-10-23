@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/'.$student->name.'.svg';
@endphp
<td><img class="rounded-full" src="{{$student->image ? asset('storage/student/thumbnail/'.$student->image) : $def_profile}}" alt=""></td>
<td class="py-4 px-6">{{ $student['name'] }}</td>
{{-- <td class="py-4 px-6">___</td>
<td class="py-4 px-6">___</td> --}}
<td class="py-4 px-6">{{ $student['email'] }}</td>
<td class="py-4 px-6 flex gap-1">
  <button 
    data-modal-target="authentication-modal" 
    data-modal-toggle="authentication-modal" 
    x-on:click='open = !open, disabled = "false", id="{{$student->id}}", name = "{{$student->name}}", email = "{{$student->email}}", type="{{$student->type}}", created_at="{{$student->created_at}}", modal_type="View"'
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    View
  </button>
  <button 
    data-modal-target="authentication-modal" 
    data-modal-toggle="authentication-modal" 
    x-on:click='open = !open, disabled = "true", id="{{$student->id}}", name = "{{$student->name}}", email = "{{$student->email}}", type="{{$student->type}}", created_at="{{$student->created_at}}", modal_type="Edit"'
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Edit
  </button>
  <button 
    data-modal-target="authentication-modal" 
    data-modal-toggle="authentication-modal" 
    x-on:click='open2 = !open2, id="{{$student->id}}", image="{{$student->image}}"'
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Change Password
  </button>
</td>