<!DOCTYPE html>
<html lang="fa">
<head>
    <title>Admin Panel</title>
    @include('base::layouts.partials.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
    @yield('head')
</head>
<body >
<div id="app">
    @guest
        @yield('content')
    @endguest
    @auth
        <div class="main-wrapper main-wrapper-1">
            <div class="main-sidebar sidebar-style-2">
                @include('base::layouts.partials.sidebar')
            </div>
            <nav class="navbar navbar-expand-lg main-navbar">
                @include('base::layouts.partials.navigation')
            </nav>
            @yield('content')
        </div>
    @endauth
</div>
@include('base::layouts.partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@stack('footer')
</body>
</html>
