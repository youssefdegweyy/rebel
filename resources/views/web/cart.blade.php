@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/cart.css') }}"/>
@endsection
@section('content')
    <div class="cart-content">
        <h2>Your Shopping Cart</h2>
        @php
            $total_items = 0;
            $total_price = 0;
        @endphp
        <div class="cart-items">
            <!-- Sample cart items go here -->
            @forelse($cart_products as $product)
                @php
                    $total_items += $product->pivot->quantity;
                    $total_price += ($product->pivot->quantity * $product->discount_price ?? $product->price)
                @endphp
                <div class="cart-item">
                    <img src="{{ asset($product->image) }}" alt="Product Image"/>
                    <div class="item-details">
                        <h3>{{ $product->name }}</h3>
                        <p>Price: {{ $product->discount_price ?? $product->price }} EGP</p>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-button minus">-</button>
                        <input type="text" value="{{ $product->pivot->quantity }}"/>
                        <button class="quantity-button plus">+</button>
                    </div>
                    <div class="item-total">
                        <p>Total: {{ ($product->pivot->quantity * $product->discount_price ?? $product->price) }}
                            EGP</p>
                    </div>
                    <div class="item-remove">
                        <button>Remove</button>
                    </div>
                </div>
            @empty
                <h2>No products in your cart, try adding some first.</h2>
            @endforelse
        </div>
        @if(count(auth()->user()->cart) > 0)
            <div class="cart-summary">
                <p>Total Items: {{ $total_items }}</p>
                <p>Subtotal: {{ $total_price }} EGP</p>
                <a href="{{ url('/checkout') }}">
                    <button>Proceed to Checkout</button>
                </a>
            </div>
        @else
            <a href="{{ url('/products') }}">
                <button>Back to products</button>
            </a>
        @endif
    </div>
@endsection
