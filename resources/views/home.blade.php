@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to the epic site!') }}
                        <a href="{{route('about')}}">About</a>
                        <a href="{{route('products')}}">Products</a>
                        <a href="{{route('users')}}">Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
