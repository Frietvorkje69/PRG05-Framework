@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
    {{-- Create a new product.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h2>Add a new product</h2>
                    </div>
                    <div class="card-body">

                        <form action="/products" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Title: </label>
                                    <input id="title"
                                           name="title"
                                           type="text"
                                           value="{{old("title")}}"
                                           placeholder="EG: A gigantic apple pie."
                                           class="input-group input-group-text @error("title") is-invalid @enderror">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="mb-4">
                                    <label for="price">Price: </label>
                                    <input id="price"
                                           name="price"
                                           type="number"
                                           min="0.0"
                                           step="0.01"
                                           placeholder="EG: 13."
                                           class="input-group input-group-text @error("price") is-invalid @enderror">
                                    @error("price")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="mb-4">
                                    <label for="description" class="form-label">Description: </label>
                                    <input id="description"
                                           name="description"
                                           type="text"
                                           value="{{old("description")}}"
                                           placeholder="EG: It's very big and pie-y."
                                           class="input-group input-group-text @error("description") is-invalid @enderror">
                                    @error("description")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                Categories:
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault">{{$category->name}}</label>
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="category_id[]" value="{{$category->id}}">
                                    </div>
                                @endforeach
                                @error("category_id[]")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mb4">
                                <input type="submit" value="Add product" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection


