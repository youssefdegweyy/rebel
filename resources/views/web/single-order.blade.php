@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/order-detail.css') }}"/>
@endsection
@section('content')
    <div class="page-heading">
        <div class="text-content">
            <h4>Order Details</h4>
            <h2>Order ID: {{ $order->code }}</h2>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Order Information</h2>
            </div>
            <div class="order-details">
                <p><strong>Total Order:</strong>
                    @if($order->payment_type == \App\Models\Order::CASH)
                        {{ $order->total }} EGP (+ shipping {{ $order->city->price }} EGP)
                    @else
                        {{ $order->total }} Points + {{ $order->city->price }} EGP shipping
                    @endif
                </p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->toDateString() }}</p>
                <p><strong>Status:</strong>
                    @if($order->status == \App\Models\Order::PENDING)
                        Pending
                    @elseif($order->status == \App\Models\Order::CONFIRMED)
                        Order Confirmed
                    @elseif($order->status == \App\Models\Order::PROGRESS)
                        Out For Delivery
                    @elseif($order->status == \App\Models\Order::DELIVERED)
                        Delivered
                    @elseif($order->status == \App\Models\Order::CANCELLED)
                        Cancelled
                    @endif
                </p>
                <!-- Add more order information here -->
            </div>
            <div class="order-items">
                <h2>Ordered Items</h2>
                @php
                    $items = json_decode($order->products)
                @endphp
                @foreach($items as $product)
                    <div class="ordered-item-card">
                        <div class="item-image">
                            <img src="{{ asset($product->image) }}" alt="Product Image"/>
                        </div>
                        <div class="item-details">
                            <h6>{{ $product->name }} - {{ $product->pivot->size }}
                                * {{ $product->pivot->quantity }}</h6>
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
                <!-- Add more ordered item cards here -->
            </div>
            <h4 style="color: white;"><strong>If you have any troubles with your order don't hesitate to contact us immediately</strong></h4>
            <!-- You can add more order details or images here as needed -->
        </div>
    </div>
@endsection
