@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>List of Categories</h2>
                <div>
                    @can('create', \App\Models\Category::class)
                        <btn class="btn btn-info"><a href="{{route('categories.create')}}" class="link page-link">Add
                                new category</a></btn>
                    @endcan
                    @foreach($categories as $category)
                        <div class="card">
                            <div class="card-header"><h1><a class="link page-link"
                                                            href="/categories/{{$category->id}}">{{$category->name}}</a>
                                </h1>
                                @can('update', $category)
                                    <a class="btn btn-secondary" href="/categories/{{$category->id}}/edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body">
                                <p>{{$category->description}}</p>
                                @foreach($category->products as $product)
                                    <p><a href="/products/{{$product->id}}">{{$product->name}}</a></p>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
