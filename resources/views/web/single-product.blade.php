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
                        <h4>{{ $product->category->name }}</h4>
                        <h2>{{ $product->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div>
                        <img
                            src="{{ asset($product->image) }}"
                            alt=""
                            class="img-fluid wc-image"
                        />
                    </div>
                    <br/>
                    <div class="row">
                        @foreach($product->gallery as $single)
                            <div class="col-sm-4 col-xs-6">
                                <div>
                                    <img
                                        src="{{ asset($single->image) }}"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <br/>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-8 col-xs-12">
                    <form action="{{ route('add_to_cart', $product->id) }}" method="post" class="form">
                        @csrf
                        <h2>{{ $product->name }}</h2>
                        <br/>

                        <p class="lead">
                            @if($product->discount_price)
                                <small>
                                    <del>{{ $product->price }} EGP</del>
                                </small
                                ><strong class="text-primary">{{ $product->discount_price }} EGP</strong>

                            @else
                                <strong class="text-primary">{{ $product->price }} EGP</strong>
                            @endif

                        </p>

                        <br/>

                        <p class="lead">{{ $product->description }}</p>

                        <br/>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="control-label">Size</label>
                                <div class="form-group">
                                    <select class="form-control" name="size">
                                        <option value="0" disabled selected>Select Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                    @if ($errors->has('size'))
                                        <span style="color:red">{{ $errors->first('size') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label class="control-label">Quantity</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="quantity"
                                                   type="number" min="1" max="5"
                                                   class="form-control"
                                                   placeholder="Enter Quantity" value="{{ old('quantity') }}"/>
                                            @if ($errors->has('quantity'))
                                                <span style="color:red">{{ $errors->first('quantity') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <input value="Add to Cart" class="btn btn-primary btn-block" type="submit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('error'))
                            <span style="color: red">{{ Session::get('error') }}</span>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('message'))
        <script>
            alert("Product added successfully.");
        </script>
    @endif

    @if (Session::has('error_message'))
        <script>
            alert("Error adding product to your cart.");
        </script>
    @endif
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Related Products</h2>
                        <a href="{{ url('/products') }}"
                        >view more <i class="fa fa-angle-right"></i
                            ></a>
                    </div>
                </div>
                @foreach($related as $single_product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <a href="{{ url('/products/'. $single_product->id) }}"
                            ><img src="{{ asset($single_product->image) }}" alt=""
                                /></a>
                            <div class="down-content">
                                <a href="{{ url('/products/'. $single_product->id) }}"
                                ><h4>{{ $single_product->name }}</h4></a
                                >
                                <h6>
                                    @if($single_product->discount_price)
                                        <small>
                                            <del>{{ $single_product->price }} EGP</del>
                                        </small> {{ $single_product->discount_price }} EGP
                                    @else
                                        {{ $single_product->price }} EGP
                                    @endif
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
