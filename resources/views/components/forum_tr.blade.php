@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/'.$post->users->name.'.svg';
@endphp
<tr id="ptr{{$post->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
  <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
      <img class="w-10 h-10 rounded-full" 
        src="{{$post->users->image ? asset('storage/student/'.$post->users->image) : $def_profile}}"
        alt="{{$post->users->name}} image">
      <div class="pl-3">
          <div class="text-base font-semibold">{{$post->users->name}}</div>
          <div class="font-normal text-gray-500">{{$post->users->email}}</div>
      </div>  
  </th>
  <td class="px-6 py-4">
    <strong>{{ $post->query }}</strong>
  </td>
  <td class="px-6 py-4">
      {{ $post->query_date }}
  </td>
  <td class="px-6 py-4">
    <span class="text-md font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer" onclick="callForTable({{$post->id}}, '{{$post->query}}')">View</span>
    {{-- function to open modal and ajax call to populate table  --}}
    <span class="text-gray-400 text-md">|</span>
    <span class="text-md font-medium text-red-600 dark:text-blue-500 hover:underline cursor-pointer" onclick="deleteQry({{$post->id}})">Delete</span>
  </td>
</tr>