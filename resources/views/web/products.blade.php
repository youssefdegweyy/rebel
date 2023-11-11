@extends('web_layouts.main')
@section('content')
    <div
        class="page-heading about-heading header-text"
        style="background-image: url({{ asset('web_assets/images/posebg.jpg') }})"
    >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Ruling The Fashion Frontier</h4>
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">

                            <a class="parent-container" href="{{ url('/products/'. $product->id) }}">
                                @if($product->size_one_stock == 0 && $product->size_two_stock == 0)
                                    <div class="sold-out-container">
                                        <p class="outofstock-text">Out Of Stock</p>
                                    </div>
                                @endif
                                <div class="imageContainer">
                                    <img src="{{ asset($product->image) }}" alt=""/>
                                </div>
                            </a>


                            <div class="down-content">
                                <small style="color:white;">{{ $product->category->name }}</small>
                                <a href="{{ url('/products/'. $product->id) }}">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <h6>
                                    @if($product->discount_price)
                                        <div style="display:flex; gap:10px; align-items:center;">
                                            <del style="color:white; font-size:15px; text-align:center;">
                                                {{ $product->price }} EGP
                                            </del>
                                            <p style="color:#3e7ceb; margin:0px; font-size:22px; text-align:center">    {{ $product->discount_price }}
                                                EGP</p>
                                        </div>
                                    @else
                                        {{ $product->price }} EGP
                                    @endif
                                </h6>
                                <p class="productDesc" style="color:white;">
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No Products Found.</h2>
                @endforelse
                <div class="col-md-12">
                    <ul class="pages">
                        {{ $products->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
