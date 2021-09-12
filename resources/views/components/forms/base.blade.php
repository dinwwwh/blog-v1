@php
$realMethod = Str::upper($attributes->get('method'));
$clientMethod = $realMethod == 'GET' ? 'GET' : 'POST';
$attributes->offsetUnset('method');
@endphp

<form {{ $attributes->merge(['enctype'=>'multipart/form-data']) }} method="{{ $clientMethod }}">
    @csrf
    @method($realMethod)
    {{ $slot }}
</form>
