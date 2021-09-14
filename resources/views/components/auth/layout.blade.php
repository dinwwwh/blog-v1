<div {{ $attributes->class('lg:grid lg:grid-cols-12 lg:gap-x-5') }}>
    <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
        <nav class="space-y-1">

            <a href="{{ route('password.viewChange') }}" @class(['text-gray-700 hover:text-gray-800 hover:bg-gray-50
                group rounded-md px-3 py-2 flex items-center text-sm font-medium' ,'bg-gray-50 text-indigo-600
                hover:bg-white'=>request()->routeIs('password.viewChange')])>
                <x-icons.key :class="'text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 '
            .( request()->routeIs('password.viewChange') ?: 'text-indigo-500 group-hover:text-indigo-600')" />
                <span class="truncate"> Đổi mật khẩu </span>
            </a>

        </nav>
    </aside>

    <div class="lg:col-span-9">
        {{ $slot }}
    </div>
</div>
