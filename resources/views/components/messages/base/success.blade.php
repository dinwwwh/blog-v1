<div {{ $attributes->class('flex items-center gap-1 text-green-600 rounded-md font-medium relative') }}>
    <x-icons.success class="h-5 w-5" />
    <div>
        {{ $slot }}
    </div>
</div>
