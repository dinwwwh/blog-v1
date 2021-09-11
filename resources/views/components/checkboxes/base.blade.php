@props(['description'=> ''])
@php
$id = $attributes->merge(['id' => Str::random()])->get('id');
@endphp

<div class="relative flex items-start {{ $class }}">
    <div class="flex items-center h-5">
        <input {{ $attributes }} id="{{ $id }}" type="checkbox" @class(['focus:ring-indigo-500 h-4 w-4 text-indigo-600
            border-gray-300 rounded', 'border-red-300'=> $error])>
    </div>
    <div class="ml-2 text-sm">
        <label for="{{ $id }}" class="font-medium text-gray-700">{{ $slot }}</label>
        <span id="comments-description" @class(['text-gray-500', 'text-red-500'=> $error])>
            {{ $description }}
        </span>
    </div>
</div>
