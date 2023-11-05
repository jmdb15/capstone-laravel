
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Post Content
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
              <x-post_table_row :post="$post"/>
            @empty
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" colspan="3" class="text-center px-6 py-4 font-bold text-lg text-gray-900 whitespace-nowrap overflow-hidden overflow-ellipsis max-w-lg">
                        No posts yet
                    </th>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="bg-white p-2">
      {{$posts->appends(request()->input())->links('vendor.pagination.tailwind')}}
    </div>
</div>
