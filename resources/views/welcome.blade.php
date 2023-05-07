@extends('layouts.guest')

@section('content')
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

<div class="py-5 bg-light">
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
                                    <a href="{{ route('article', $article) }}" class="btn btn-sm btn-outline-secondary">Read more
                                        >></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection