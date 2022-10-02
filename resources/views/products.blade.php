@extends('layouts.web')
@section('title', 'Home')
@section('content')
    @include('partials.header-hero', ['heroText' => 'Products'])
    <h1>{{$title}}</h1>
    <p>{{$text}}</p>
    <a href="{{route('home')}}">Home</a>

{{--    $products = Products::all();--}}
@endsection
