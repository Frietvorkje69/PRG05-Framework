@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>List of Products</h2>
                <div>
                    @can('create', \App\Models\Product::class)
                        <p><a href="{{route('products.create')}}" class="link">Add new product</a></p>
                    @endcan
                </div>
                <div class="input-group-lg col col-auto">
                    <form action="{{ route('products.index') }}" method="GET">
                        <label for="search"></label><input type="text" class="form-control" name="search" id="search" placeholder="Search...">
                        <button type="submit" class="btn btn-success" >
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <br>
                </div>
                <p>These are the available products.</p>
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-header"><h1><a href="/products/{{$product->id}}"
                                                        class="link page-link">{{$product->title}}</a></h1>
                            @can('update', $product)
                                <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            @endcan
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
