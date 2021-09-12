@props(['description'=> ''])
@php
$id = $attributes->merge(['id' => Str::random()])->get('id');
@endphp

<div class="{{ $class }}">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $slot }}</label>
    <div class="mt-1">
        <textarea id="{{ $id }}" {{ $attributes }} @class(['shadow-sm focus:ring-indigo-500 focus:border-indigo-500
            block w-full sm:text-sm rounded-md border-gray-300'
            ,'border-red-300'=>$error])>{{ $attributes->get('value') }}</textarea>
    </div>
    <p @class(['mt-2 text-sm text-gray-500', 'text-red-500'=> $error])>{{ $description }}</p>
</div>
