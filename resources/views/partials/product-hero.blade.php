<div class="card">
    <div class="card-header"><h1><a href="/products/{{$product->id}}"
                                    class="link page-link">{{$product->title}}</a></h1>
        <div class="row row-cols-auto">
            @can('update', $product)
                <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            @endcan
            @can ('toggle', $product)
                {{--Toggle visibility button for product--}}
                <form action="{{ route('products.toggle-visibility', $product->id) }}"
                      method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        @if ($product->hidden_status == 1)
                            {{--Show slashed out eye icon if the product is hidden--}}
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        @else
                            {{--Show eye icon if the product is visible--}}
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        @endif
                    </button>
                </form>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <p>{{$product->description}}</p>
        <div>
            <h3>
                @foreach($product->categories as $category)
                    {{--Show categories linked to product--}}
                    <btn class="btn btn-primary"><a class="link page-link text-white"
                                                    href="/categories/{{$category->id}}">{{$category->name}}</a>
                    </btn>
                    @if($product->categories->count() > 1)
                        {{--If there are multiple categories, add space in between.--}}
                    @endif
                @endforeach
            </h3>
        </div>
    </div>
</div>
