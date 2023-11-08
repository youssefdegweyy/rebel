@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/cart.css') }}"/>
@endsection
@section('content')
    @if (Session::has('product_remove'))
        <script>
            alert("Product removed.");
        </script>
    @endif

    @if (Session::has('error_product_remove'))
        <script>
            alert("Error removing product.");
        </script>
    @endif

    @if (Session::has('max_quantity'))
        <script>
            alert("Maximum quantity allowed.");
        </script>
    @endif

    @if (Session::has('over_stock'))
        <script>
            alert("Requested quantity is over the stock available at the moment.");
        </script>
    @endif
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
                        <h3>{{ $product->name }} - {{ $product->pivot->size }}</h3>
                        <p>Price: {{ $product->discount_price ?? $product->price }} EGP</p>
                    </div>
                    <div class="item-quantity">
                        <form method="POST" action="{{ route('change-quantity', $product->id) }}">
                            @csrf
                            <input hidden type="text" name="type" value="1">
                            <input hidden type="text" name="size" value="{{ $product->pivot->size }}">
                            <button class="quantity-button minus">-</button>
                        </form>
                        <input type="text" value="{{ $product->pivot->quantity }}" disabled/>
                        <form method="POST" action="{{ route('change-quantity', $product->id) }}">
                            @csrf
                            <input hidden type="number" name="type" value="2">
                            <input hidden type="text" name="size" value="{{ $product->pivot->size }}">
                            <button class="quantity-button plus">+</button>
                        </form>
                    </div>
                    <div class="item-total">
                        <p>Total: {{ ($product->pivot->quantity * $product->discount_price ?? $product->price) }}
                            EGP</p>
                    </div>
                    <div class="item-remove">
                        <form method="POST" action="{{ route('remove-item-from-cart', $product->id) }}">
                            @csrf
                            <button type="submit">Remove</button>
                        </form>
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
