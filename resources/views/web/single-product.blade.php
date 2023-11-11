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
                        <h4>{{ $product->category->name }}</h4>
                        <h2 class="productTitle" style="color:white;">{{ $product->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <div class="products">
        <div class="container">
            <div class="row">
            <div style="width:400px; max-height:400px; min-height:400px; margin-bottom:150px" id="carouselExample" class="carousel slide col-md-4" data-ride="carousel">
            <div class="carousel-inner">
    @foreach($product->gallery as $key => $single)
        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
            <img style="height: 100%; width: auto;" src="{{ asset($single->image) }}" class="d-block w-100" alt="Slide {{ $key + 1 }}">
        </div>
    @endforeach
</div>

    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

                <div class="col-md-8 col-xs-12">
                    <form action="{{ route('add_to_cart', $product->id) }}" method="post" class="form">
                        @csrf
                        <h2 style="color:white" >{{ $product->name }}</h2>
                        <br/>

                        <p class="lead">
                            @if($product->discount_price)
                                <small>
                                    <del style="font-size:20px; color:white">{{ $product->price }} EGP</del>
                                </small
                                ><strong class="text-primary" style="font-size:25px; margin-left:5px">{{ $product->discount_price }} EGP</strong>

                            @else
                                <strong class="text-primary">{{ $product->price }} EGP</strong>
                            @endif

                        </p>

                        <br/>

                        <p style="color:white" class="lead">{{ $product->description }}</p>

                        <br/>
                        <div class="row">
                            <div class="col-sm-4">
                                <label style="color:white" >Size</label>
                                <div class="sizePicker">
                                  <div class="sizeOption">  
                                    <p style="color:white; font-size: 20px">S</p>
                                  </div>
                                  <div class="sizeOption">  
                                    <p style="color:white; font-size: 20px">M</p>
                                  </div>
                                  <div class="sizeOption">  
                                    <p style="color:white; font-size: 20px">L</p>
                                  </div>
                                  <div class="sizeOption">  
                                    <p style="color:white; font-size: 20px">XL</p>
                                  </div>
                                 </div>
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
                                <label style="color:white" class="control-label">Quantity</label>
                                <div class="quanitityDiv">
                                  
                                    <div class="plusBox">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                    </div>
                                    <input class="quantityField" placeholder="4"/>
                                    <div class="plusBox">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
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
                                    @auth
                                        <div class="col-sm-6">
                                            <input value="Add to Cart" class="btn btn-primary btn-block" type="submit"/>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <a class="btn btn-primary btn-block" href="{{ url('/signup') }}">Add to
                                                cart</a>
                                        </div>
                                    @endauth

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
                        <a href="{{ url('/products/'. $product->id) }}">
                                <div  class="imageContainer">
                                <div style="background-image: url('{{ asset($product->image) }}');"></div>
                                <img class="object-fit:cover; background-position:center" src="{{ asset($product->image) }}" alt=""/>
                                </div>
                            </a>   
                            <div class="down-content">
                                <a href="{{ url('/products/'. $single_product->id) }}"
                                ><h4>{{ $single_product->name }}</h4></a
                                >
                                <h6>
                                    @if($single_product->discount_price)
                                    <div style="display:flex; gap:10px; align-items:center;">
                                            <del   style="color:white; font-size:15px; text-align:center;">
                                            {{ $product->price }} EGP
                                         </del>
                                        <p style="color:#3e7ceb; margin:0px; font-size:22px; text-align:center">    {{ $product->discount_price }} EGP</p> 
                                    </div>
                                    @else
                                        {{ $single_product->price }} EGP
                                    @endif
                                </h6>
                                <p class="productDesc" style="color:white;">
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
