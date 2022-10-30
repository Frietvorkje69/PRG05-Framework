@extends('layouts.app')
@section('title', 'Edit Manga')
@section('content')
    @if(auth()->user()->id === $product->user_id && auth()->user()->isVerified() || auth()->user()->isAdmin())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-bg-primary">
                            <h1>Edit manga</h1>
                        </div>
                        <div class="card-body">
                            <form action="/products/{{$product->id}}" method="POST">
                                @method('PUT')
                                @csrf
                                <input id="id"
                                       name="id"
                                       type="hidden"
                                       value="{{$product->id}}}">
                                <label for="title">Title: </label>
                                <input id="title"
                                       name="title"
                                       type="text"
                                       value="{{old("title", $product->title)}}"
                                       class="input-group input-group-text @error("title") is-invalid @enderror">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="price">Price (in €): </label>
                                <input id="price"
                                       name="price"
                                       type="number"
                                       min="0.0"
                                       step="0.01"
                                       value="{{old("price", $product->price)}}"
                                       class="input-group input-group-text @error("price") is-invalid @enderror">
                                @error("price")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="description">Description: </label>
                                <input id="description"
                                       name="description"
                                       type="text"
                                       value="{{old("description", $product->description)}}"
                                       class="input-group input-group-text @error("description") is-invalid @enderror">
                                @error("description")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div>
                                    Categories:
                                    @foreach($categories as $category)
                                        @if($product->categories->contains($category->id))
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label"
                                                       for="flexCheckChecked">{{$category->name}}</label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                       name="category_id[]" value="{{$category->id}}" checked>
                                            </div>
                                        @else
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label"
                                                       for="flexCheckDefault">{{$category->name}}</label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                                       name="category_id[]" value="{{$category->id}}">
                                            </div>
                                        @endif
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
                                <br>
                                <div class="justify-content-center row row-cols-auto">
                                    <input class="btn btn-primary" type="submit" value="Save changes">
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    @can('delete', $product)
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h1>Delete manga</h1>
                            </div>
                            <div class="card-body">
                                <h5>Are you sure you want to delete, {{$product->title}}?</h5>
                                <br>
                                <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="justify-content-center row row-cols-auto">
                                        <input id="id"
                                               name="id"
                                               type="hidden"
                                               value="{{$product->id}}">
                                        <input type="submit" value="Yes, I'm sure" class="btn btn-warning">
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            @else
                <meta http-equiv="refresh" content="0; url='/404'"/>
    @endif
@endsection
