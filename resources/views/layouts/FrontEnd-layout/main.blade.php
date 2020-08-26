<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- style links  -->
    <link rel="stylesheet" href="{{ url('css/main.css ') }}">
    <link rel="stylesheet" href="{{ url('css/buttons-Style.css ') }}">
    <!-- add Livewire style -->
    <livewire:styles>
    <!-- Add alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>    <!-- Fontawosam -->
    <script import 'alpinejs'>

    </script>
</head>

<body class="font-sans bg-gray-900 text-white">
    @include('layouts.front-includes.navbar')

    @yield('content')

    @include('layouts.front-includes.footer')
     <!-- add Livewire scripts -->
    <livewire:scripts>
@yield('scripts')
</body>

</html>
