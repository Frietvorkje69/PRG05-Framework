@extends('layouts.app')
@section('title', 'Product')
{{-- Show product.--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$product->title}}</h1></div>
                    <div class="card-body">
                        <h3><bold>Price: </bold>€{{$product->price}}</h3>
                        <h3>Description:</h3>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <br>
                <p><a href="/products">Return to products</a></p>
            </div>
        </div>
    </div>
@endsection
