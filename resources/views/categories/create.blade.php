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
                <h3>Create a new category</h3>
                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>                
                    <button type="submit" class="btn btn-primary mt-4">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection