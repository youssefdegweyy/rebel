@extends('web_layouts.main')
@section('content')
    <div
        class="page-heading about-heading header-text"
        style="background-image: url({{ asset('web_assets/images/heading-6-1920x500.jpg') }})"
    >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Lorem ipsum dolor sit amet</h4>
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
                            <a href="{{ url('/products/' . $product->id) }}">
                                <img src="{{ asset($product->image) }}" alt=""/>
                            </a>
                            <div class="down-content">
                                <small style="color:white;">{{ $product->category->name }}</small>
                                <a href="{{ url('/products/'. $product->id) }}">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <h6>
                                    @if($product->discount_price)
                                        <small>
                                            <del>{{ $product->price }} EGP</del>
                                        </small> {{ $product->discount_price }} EGP
                                    @else
                                        {{ $product->price }} EGP
                                    @endif
                                </h6>
                                <p>
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
