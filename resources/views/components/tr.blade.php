@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/'.$user->name.'.svg';
@endphp
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
  <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
      <img class="w-10 h-10 rounded-full" 
        src="{{$user->image ? asset('storage/student/'.$user->image) : $def_profile}}"
        alt="{{$user->name}} image">
      <div class="pl-3">
          <div class="text-base font-semibold">{{$user->name}}</div>
          <div class="font-normal text-gray-500">{{$user->email}}</div>
      </div>  
  </th>
  <td class="px-6 py-4">
      {{$user->type}}
  </td>
  <td class="px-6 py-4">
      <div class="flex items-center">
        
      </div>
  </td>
  <td class="px-6 py-4">
    <button 
        data-modal-target="authentication-modal" 
        data-modal-toggle="authentication-modal" 
        x-on:click='open = !open, id="{{$user->id}}", name = "{{$user->name}}", email = "{{$user->email}}", type="{{$user->type}}", created_at="{{$user->created_at}}"'
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Edit User
    </button>
  </td>
</tr>