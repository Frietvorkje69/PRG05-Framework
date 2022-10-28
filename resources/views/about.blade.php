@extends('layouts.app')
@section('title', 'About')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">About</div>
                    <div class="card-body">
                        <h2>{{$title}}</h2>
                        <p>{{$text}}</p>
                        @include('partials.header-hero', ['heroText' => 'Our Proud Owner: '])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
