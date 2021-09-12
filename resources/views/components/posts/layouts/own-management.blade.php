<div {{ $attributes->class('lg:grid lg:grid-cols-12 lg:gap-x-5') }}>
    <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
        <nav class="space-y-1">

            <a href="" @class(['text-gray-700 hover:text-gray-800 hover:bg-gray-50 group rounded-md px-3 py-2 flex
                items-center text-sm font-medium' ,'bg-gray-50 text-indigo-600 hover:bg-white'=>''])>
                <x-icons.adjustments :class="'text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 '
                .( false ?: 'text-indigo-500 group-hover:text-indigo-600')" />
                <span class="truncate"> Thống kê </span>
            </a>

            <a href="{{ route('posts.viewCreate') }}" @class(['text-gray-700 hover:text-gray-800 hover:bg-gray-50 group
                rounded-md px-3 py-2 flex items-center text-sm font-medium' ,'bg-gray-50 text-indigo-600
                hover:bg-white'=>request()->routeIs('posts.viewCreate')])>
                <x-icons.success :class="'text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 '
                .( request()->routeIs('posts.viewCreate') ?: 'text-indigo-500 group-hover:text-indigo-600')" />
                <span class="truncate"> Đăng bài </span>
            </a>

        </nav>
    </aside>

    <div class="lg:col-span-9">
        {{ $slot }}
    </div>
</div>
