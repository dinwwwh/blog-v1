<x-layouts.primary>
    <x-posts.layouts.own-management class="mt-12">

        <div>
            <form method="GET" class="flex gap-3 justify-end items-center mt-2">
                <p class="text-sm text-gray-500">Có {{ $posts->total() }} bài viết phù hợp</p>
                <x-inputs.base class="min-w-[24%]" :value="request()->search" name="search" placeholder="Từ khóa">
                </x-inputs.base>
                <button type="submit" class="text-white bg-indigo-600 p-2 rounded mt-1 mb-2">
                    <x-icons.search class="h-6 w-6" />
                </button>
            </form>

            <x-posts.table :posts="$posts" :fields="['title','updated_at','created_at','actions']" />

            <div>
                {{ $posts->links('paginations.centered-numbers') }}
            </div>
        </div>
    </x-posts.layouts.own-management>
</x-layouts.primary>
