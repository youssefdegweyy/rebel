@extends('web_layouts.main')
@section('content')
    <div
        class="page-heading about-heading header-text"
        style="background-image: url({{ asset('web_assets/images/heading-6-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products call-to-action">
        <div class="container">
            <div class="inner-content">
                @if(Session::has('error'))
                    <h4 style="color: red; text-align: center; margin-bottom: 50px;">{{ Session::get('error') }}</h4>
                @endif
                <div class="contact-form">
                    <form action="{{ route('make-order') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Active Mobile Number:</label>
                                    @if ($errors->has('mobile'))
                                        <span style="color:red"><b> {{ $errors->first('mobile') }}</b></span>
                                    @endif
                                    <input type="text" placeholder="Enter mobile number" class="form-control"
                                           name="mobile" value="{{ old('mobile') }}"
                                           required/>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                    @if ($errors->has('address'))
                                        <span style="color:red"><b> {{ $errors->first('address') }}</b></span>
                                    @endif
                                    <input type="text" placeholder="Enter address" class="form-control" name="address"
                                           required
                                           value="{{ old('address') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Country:</label>
                                    @if ($errors->has('country'))
                                        <span style="color:red"><b> {{ $errors->first('country') }}</b></span>
                                    @endif
                                    <select class="form-control" name="country">
                                        <option selected value="Egypt">Egypt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">City:</label>
                                    @if ($errors->has('city'))
                                        <span style="color:red"><b> {{ $errors->first('city') }}</b></span>
                                    @endif
                                    <select class="form-control" name="city" required id="city_select">
                                        <option selected value="0" disabled>Please select city to calculate shipping
                                            fees
                                        </option>
                                        @foreach($cities as $city)
                                            <option
                                                value="{{ $city->id }}">{{ $city->name }}
                                                - {{ $city->price }} EGP
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <em>Sub-total</em>
                                    </div>

                                    <div class="col-6 text-right">
                                        <strong id="items-cost">{{ $total_price }}</strong><strong> EGP</strong>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <em>Delivery Fees</em>
                                    </div>

                                    <div class="col-6 text-right">
                                        <strong id="delivery-field">0</strong><strong> EGP</strong>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <em>Total</em>
                                    </div>

                                    <div class="col-6 text-right">
                                        <input hidden type="text" name="total" id="total_order_price">
                                        <strong id="total-cost">{{ $total_price }}</strong><strong> EGP</strong>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="clearfix">
                            <a href="{{ url('/cart') }}">
                                <button type="button" class="filled-button pull-left">
                                    Back to cart
                                </button>
                            </a>
                            <button type="submit" class="filled-button pull-right">
                                Confirm Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $('#city_select').on('change', function () {
            var city = this.value;
            jQuery.ajax({
                url: '/get-price',
                type: 'get',
                data: 'city=' + city,
                success: function (data) {
                    $("#delivery-field").html(data);
                    var delivery = parseInt($("#delivery-field").html());
                    var items = parseInt($("#items-cost").html());
                    var total = delivery + items;
                    $("#total-cost").html(total);
                    $("#total_order_price").val(total);
                }
            });
        });
    </script>
@endsection