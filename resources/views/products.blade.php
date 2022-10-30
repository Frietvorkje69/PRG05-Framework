@extends('layouts.app')
@section('title', 'Manga')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <h2>List of Manga</h2>
                <div>
                    @can('create', \App\Models\Product::class)
                        <btn class="btn btn-info text-bg-info"><a href="{{route('products.create')}}"
                                                                  class="link page-link">Add new
                                manga</a></btn>
                    @endcan
                </div>
                <div class="input-group-lg col col-auto">
                    @include('partials.search-hero')
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
                @if($products->count() < 1)
                    <p>No results found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
