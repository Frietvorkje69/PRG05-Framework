@extends('layouts.app')
@section('title', 'About')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">About</div>
                    <div class="card-body">
                        @include('partials.header-hero', ['heroText' => 'Luke'])
                        <h1>{{$title}}</h1>
                        <p>{{$text}}</p>
                        <a href="{{route('home')}}">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
