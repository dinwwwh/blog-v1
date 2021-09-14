@props(['footer' => ''])

<div {{ $attributes->class('bg-white rounded-sm sm:rounded-md shadow-xl') }}>
    <div class="flex-1 relative px-3 py-5 md:px-5">
        {{ $slot }}
    </div>
    <div class="px-3 py-2 md:px-5 bg-gray-50 rounded-bl-2xl rounded-br-2xl">
        {{ $footer }}
    </div>
</div>
