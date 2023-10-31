@php    
  use Carbon\Carbon; use Illuminate\Support\Facades\DB;
  $date = Carbon::parse($post->created_at);
  $date = $date->format('F j, Y');
@endphp

<tr class="bg-white border-b hover:bg-gray-50" id="tr-{{$post->id}}">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap overflow-hidden overflow-ellipsis max-w-lg">
        {{ $post->caption }}
    </th>
    <td class="px-6 py-4">
        {{ $date }}
    </td>
    <td class="px-6 py-4">
        <a class="font-medium cursor-pointer text-blue-600 hover:underline"  onclick="showpost({{$post->id}})">Edit</a>
        <span class="text-gray-400 text-md">|</span>
        <a onclick="confirmDel({{$post->id}})" class="font-medium cursor-pointer text-red-600 hover:underline">Delete</a>
    </td>
</tr>