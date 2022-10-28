@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <h2>List of Products</h2>
                <div>
                    @can('create', \App\Models\Product::class)
                        <btn class="btn btn-info text-bg-info"><a href="{{route('products.create')}}"
                                                                  class="link page-link">Add new
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
                    @if($product->hidden_status === 1)
                        @if(auth()->guest())
                        @elseif(auth()->user()->isAdmin())
                            @include('partials.product-hero')
                        @endif
                    @else
                        @include('partials.product-hero')
                    @endif
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
