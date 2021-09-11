<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <title>@dinhdjj</title>
</head>

<body {{ $attributes }}>
    {{ $slot }}
</body>

</html>
