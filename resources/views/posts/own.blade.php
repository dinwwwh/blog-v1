<x-layouts.primary>
    <x-posts.layouts.own-management class="mt-12">

        <div>
            <x-posts.table :posts="$posts" :fields="['title','updated_at','created_at','actions']" />

            <div>
                {{ $posts->links('paginations.centered-numbers') }}
            </div>
        </div>
    </x-posts.layouts.own-management>
</x-layouts.primary>
