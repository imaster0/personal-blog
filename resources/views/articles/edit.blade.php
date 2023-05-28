@extends('layouts.app')
   
@section('content')

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            There were some errors with your request.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h3>Article #{{ $article->id }}</h3>
                <form action="{{ route('admin.articles.update', $article) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $article->title }}">
                    </div>
                
                    <div class="form-group mt-2">
                        <label for="full_text">Full text</label>
                        <textarea name="full_text" class="form-control">{{ old('full_text') ?? $article->full_text }}</textarea>
                    </div>
                
                    <div class="form-group mt-2">
                        <label for="full_text">Tags (separated by comma)</label>
                        <input type="text" name="tags" class="form-control" value="{{ old('tags') ?? $tags }}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == old('category_id') ?? $article->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($article->image)
                            <img src="{{ $article->image }}" style="max-width: 100%" />
                        @endif
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection