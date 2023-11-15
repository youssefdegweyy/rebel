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
                            <a class="parent-container" href="{{ url('/products/'. $product->id) }}">
                                @if($product->size_one_stock == 0 && $product->size_two_stock == 0)
                                    <div class="sold-out-container">
                                        <p class="outofstock-text">Out Of Stock</p>
                                    </div>
                                @endif
                                <div class="imageContainer">

                                    <img class="object-fit:cover; background-position:center"
                                         src="{{ asset($product->image) }}" alt=""/>
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
                                                EGP - {{ $product->points_price }} Points</p>
                                        </div>
                                    @else
                                        <p style="color:#3e7ceb; margin:0px; font-size:22px; text-align:center">    {{ $product->price }}
                                            EGP - {{ $product->points_price }} Points</p>
                                    @endif
                                </h6>
                                <p class="productDesc" style="color:white;">
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
                                <h4 style="color:#3e7ceb;">Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                                <p style="color:white">
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
