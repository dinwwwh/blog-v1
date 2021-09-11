<div {{ $attributes->class('flex items-center gap-1 text-red-600 rounded-md font-medium relative') }}>
    <x-icons.error class="h-5 w-5" />
    <div>
        {{ $slot }}
    </div>
</div>
