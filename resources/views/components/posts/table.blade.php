<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>

                            @foreach ($fields as $field)
                            @if ($field == 'title')
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tiêu đề
                            </th>
                            @endif
                            @if ($field == 'updated_at')
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cập nhật lần cuối
                            </th>
                            @endif
                            @if ($field == 'created_at')
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Thời gian đăng
                            </th>
                            @endif
                            @if ($field == 'actions')
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            @endif
                            @endforeach

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($posts as $post)
                        <tr>
                            @foreach ($fields as $field)
                            @if ($field == 'title')
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ Str::limit($post->title, $titleLength) }}
                            </td>
                            @endif
                            @if ($field == 'updated_at')
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $post->updated_at->shortRelativeToNowDiffForHumans() }}
                            </td>
                            @endif
                            @if ($field == 'created_at')
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $post->created_at->shortRelativeToNowDiffForHumans() }}
                            </td>
                            @endif
                            @if ($field == 'actions')
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('posts.show', compact('post')) }}"
                                    class="text-gray-600 hover:text-indigo-600">
                                    <x-icons.eye class="h-6 w-6" />
                                </a>
                            </td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
