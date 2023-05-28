@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div>
            <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Add new tag</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>List of tags</h2>
            @foreach ($tags as $category)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="flex-container">
                            <div class="row">
                                <div class="col-12">
                                    {{ $category->name }}
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.tags.show', $category) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('admin.tags.edit', $category) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('admin.tags.destroy', $category) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $tags->links() }}
        </div>
    </div>
</div>
@endsection
