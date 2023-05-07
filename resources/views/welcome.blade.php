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
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>{{ config('app.name', 'Laravel') }}</strong>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @auth
                        <a href="{{ url('/articles') }}" class="nav-link">Admin Panel</a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>

    <main class="bg-white">

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">My personal blog</h1>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, quasi
                        dolores tempore at explicabo est optio molestias officia quis, ipsum ducimus mollitia itaque!
                        Corrupti, eos labore ducimus assumenda sint voluptates?</p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 g-3">
                    @foreach ($articles as $article)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-3">
                                            <img style="max-height: 225px; max-width: 100%" src="{{ $article->image }}" />
                                        </div>
                                        <div class="col">
                                            <p>
                                                @foreach ($article->tags as $tag)
                                                <span class="text-muted">#{{ $tag }}</span>
                                                @endforeach
                                            </p>
                                            <div class="float-end text-muted">{{ strtoupper($article->category) }}</div>
                                            <h4>{{ $article->title }}</h4>
                                            <p class="card-text">{{ $article->short_description }}</p>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Read more
                                                >></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-1 float-end">A simple blog example using Bootstrap</p>
        </div>
    </footer>
</body>

</html>