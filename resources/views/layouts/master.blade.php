<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.meta')

    @yield('title')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

    <script async src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')

</head>

<body>

@include('partials.header')

@yield('sidebar')

<main class="content">

    @yield('content')

</main>

@include('partials.footer')

</body>
</html>
