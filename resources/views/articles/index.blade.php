@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Add new article</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>List of articles</h2>
            @foreach ($articles as $article)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="flex-container">
                            <div class="row">
                                <div class="col-4">
                                    @if ($article->image)
                                        <img src="{{ $article->image }}" class="w-100" />
                                    @endif
                                </div>
                                <div class="col-8">
                                    #{{ $article->category->name }} <br>
                                    {{ $article->title }} <br>
                                    {{ $article->full_text }} <br>

                                    <div style="position: absolute; bottom: 15px; right: 15px">
                                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('articles.destroy', $article) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </div>
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
