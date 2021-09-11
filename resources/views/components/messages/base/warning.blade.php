<div {{ $attributes->class('flex items-center gap-1 text-yellow-600 rounded-md font-medium relative') }}>
    <x-icons.warning class="h-5 w-5" />
    <div>
        {{ $slot }}
    </div>
</div>
