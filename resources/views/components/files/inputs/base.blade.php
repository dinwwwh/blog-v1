@props(['description'=> ''])
@php
$id = $attributes->merge(['id' => Str::random()])->get('id');
@endphp

<div class="{{ $class }}">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $slot }}</label>
    <div class="mt-1">
        <input id="{{ $id }}" {{ $attributes->merge(['type'=>'file']) }} @class(['shadow-sm focus:ring-indigo-500 py-1
            focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md', 'border-red-300'=> $error
        ])>
    </div>
    <p @class(['mt-2 text-sm text-gray-500', 'text-red-500'=> $error])>{{ $description }}</p>
</div>
