@extends('layouts.app')
   

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                Name: {{ $category->name }} <br>
            </div>
        </div>
    </div>
</div>
@endsection
