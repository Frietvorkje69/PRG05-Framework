@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container">
        <h2>List of Products</h2>
        <p>These are the available products.</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('products.create')}}">Add new product</a>
    </div>
@endsection
