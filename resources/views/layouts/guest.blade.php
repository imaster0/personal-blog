<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My personal blog</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <header>
        <nav class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>{{ config('app.name', 'Laravel') }}</strong>
                </a>
                <ul class="navbar-nav me-auto flex-row gap-3">
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link">Articles</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        @auth
                        <a href="{{ route('admin.articles.index') }}" class="nav-link">
                            <i class="fa-solid fa-gears"></i>
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="bg-white">

        @yield('content')

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-1 float-end">A simple blog example using Bootstrap</p>
        </div>
    </footer>
</body>

</html>