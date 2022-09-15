@extends('layouts.web')
@section('title', 'Home' )
@section('content')
    @include('partials.header-hero', ['heroText' => 'HOME'])
    <h1>{{$title}}</h1>
    <p>{{$text}}</p>
{{--    <a href="{{route('about')}}">About</a>--}}
@endsection

