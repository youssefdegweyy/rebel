@extends('web_layouts.main')
@section('content')
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01"></div>
        </div>
    </div>
    <!-- Banner Ends Here -->
    @if(Session::has('success_order'))
        <script>
            alert('Order made successfully, wait for confirmation mail!')
        </script>
    @endif
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Featured Products</h2>
                        <a href="{{ url('/products') }}">
                            view more <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <a href="{{ url('/products/'. $product->id) }}">
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
                                            <del>{{ $product->discount_price }} EGP</del>
                                        </small> {{ $product->price }} EGP
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
                    <h4>No featured products.</h4>
                @endforelse
            </div>
        </div>
    </div>

    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Itaque corporis amet elite author nulla.
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6 text-right">
                                <a href="{{ url('contact-us') }}" class="filled-button">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
