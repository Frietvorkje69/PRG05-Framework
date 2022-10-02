@extends('layouts.web')
@section('title', 'About')
@section('content')
    @include('partials.header-hero', ['heroText' => 'Product'])
    <h1>Product informatie:</h1>
    <h2>Details {{$product->title}}</h2>
    <p>{{$product->price}}</p>
    <p>Met btw {{$product->total_price}}</p>
    <a href="{{route('home')}}">Home</a>
@endsection
