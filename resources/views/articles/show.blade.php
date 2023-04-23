@extends('layouts.app')
   

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                Title: {{ $article->title }} <br>
                Full text: {{ $article->full_text }} <br>
                Category: {{ $article->category->name }} <br>
                @if ($article->image)
                    Image: <img src="{{ $article->image }}" style="max-width: 100%" /> <br>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
