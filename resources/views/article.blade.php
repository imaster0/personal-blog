@extends('layouts.guest')

@section('content')


<section class="py-5 container">
    <div class="row">
        <div class="col">
            <span class="text-muted">
                {{ strtoupper($article->category) }}
            </span>
        </div>
        <div class="col text-end">
            <a href="{{ URL::previous() }}" class="btn btn-outline-secondary btn-sm">Back</a>
        </div>
    </div>
    <div class="text-start">
        <h1>{{ $article->title }}</h1>

        <div class="d-flex gap-3 py-3">
            @foreach ($article->tags as $tag)
                <span class="text-muted">{{ $tag }}</span>
            @endforeach
        </div>
    </div>
</section>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="text-start mb-5">
                <img src="{{ $article->image }}" class="img-fluid" style="max-height: 400px;" alt="Responsive image">
            </div>
            <p class="fs-5" style="text-align: justify">
                {!! nl2br($article->full_text) !!}
            </p>
        </div>
    </div>
    <div style="clear: both"></div>
</div>

@endsection