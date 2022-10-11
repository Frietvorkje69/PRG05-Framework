@extends('layouts.app')
@section('title', 'Add new product')

@section('content')
    {{-- Create a new product.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <div class="card">
                    <div class="card-header">
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
                                           placeholder="Title of product"
                                           class="@error("title") is-invalid @enderror">
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
                                           placeholder="Price of product"
                                           class="@error("price") is-invalid @enderror">
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
                                           placeholder="Description of product"
                                           class="@error("description") is-invalid @enderror">
                                    @error("description")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                <input type="submit" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection


