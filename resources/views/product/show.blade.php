@extends('layouts.app')
@section('title', 'Manga - View')
{{-- Show product.--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.verify-hero')
                <div class="card">
                    <div class="card-header text-bg-primary"><h1>{{$product->title}}</h1></div>
                    <div class="card-body">
                        <h3>Price: €{{$product->price}}</h3>
                        <h3>Volumes: {{$product->price / 10}}</h3>
                        <h3>Description:</h3>

                        <p>{{$product->description}}</p>
                        <h3>
                            @foreach($product->categories as $category)
                                {{--Show categories linked to product--}}
                                <btn class="btn btn-dark btn-lg"><a class="link page-link text-white"
                                                                    href="/categories/{{$category->id}}">{{$category->name}}</a>
                                </btn>
                                @if($product->categories->count() > 1)
                                    {{--If there are multiple categories, add space in between.--}}
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                <br>
                <div>
                    <btn class="btn btn-primary"><a href="{{route('products.index')}}" class="link page-link"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a></btn>
                </div>
            </div>
        </div>
    </div>
@endsection
