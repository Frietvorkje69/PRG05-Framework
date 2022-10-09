@extends('layouts.app')
@section('title', 'About')
@section('content')
    @include('partials.header-hero', ['heroText' => 'About'])
    <h1>{{$title}}</h1>
    <p>{{$text}}</p>
    <a href="{{route('home')}}">Home</a>
@endsection
