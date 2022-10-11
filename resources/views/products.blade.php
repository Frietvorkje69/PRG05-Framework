@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>List of Products</h2>
                <a href="{{route('products.create')}}">Add new product</a>
                <p>These are the available products.</p>
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-header"><h1><a href="/products/{{$product->id}}">{{$product->title}}</a></h1>
                        </div>
                        <div class="card-body">
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
