@extends('layouts.web')
@section('title', 'About' )
@section('content')
    <h1>{{$title}}</h1>
    <p>{{$text}}</p>
{{--    <a href="{{route('home')}}">Home</a>--}}
@endsection
