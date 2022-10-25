@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>List of Products</h2>
                <div>
                    @can('create', \App\Models\Product::class)
                        <btn class="btn btn-info"><a href="{{route('products.create')}}" class="link page-link">Add new
                                product</a></btn>
                    @endcan
                </div>
                <div class="input-group-lg col col-auto">
                    <form action="{{ route('products.search') }}" method="POST">
                        @csrf
                        <label for="search"></label><input type="text" class="form-control" name="search" id="search"
                                                           placeholder="Search...">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <br>
                </div>
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-header"><h1><a href="/products/{{$product->id}}"
                                                        class="link page-link">{{$product->title}}</a></h1>
                            @can('update', $product)
                                <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            @endcan
                            @can ('toggle', $product)
                                @if ($product->hidden_status === 1)
                                    <a class="btn btn-secondary" href="{{route('home')}}">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <a class="btn btn-primary" href="{{route('home')}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                @endif
                            @endcan
                        </div>
                        <div class="card-body">
                            <p>{{$product->description}}</p>
                            <div>
                                <h3>
                                    @foreach($product->categories as $category)
                                        <btn class="btn btn-primary"><a class="link page-link text-white"
                                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                                        </btn>
                                        @if($product->categories->count() > 1)

                                        @endif
                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
