@extends('layouts.app')
@section('title', 'Category')
{{-- Show product.--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary"><h1>{{$category->name}}</h1></div>
                    <div class="card-body">
                        <h3>Description:</h3>
                        <p>{{$category->description}}</p>
                    </div>
                </div>
                <br>
                <p><a href="/categories">Return to categories</a></p>
            </div>
        </div>
    </div>
@endsection
