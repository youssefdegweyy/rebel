@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/orders.css') }}"/>
@endsection
@section('content')
    <div
        class="page-heading"
        style="background-image: url({{ asset('web_assets/images/heading-6-1920x500.jpg') }})"
    >
        <div class="text-content">
            <h4>Your Orders</h4>
            <h2>View and Track Your Orders</h2>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Orders</h2>
            </div>
            <ul class="order-list">
                @foreach($orders as $order)
                    <li class="order-item">
                        <a href="{{ url('/orders/'. $order->id) }}">
                            <p><strong>Order ID:</strong> {{ $order->code }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->toDateString() }}
                            </p>
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
                            @php
                                $items = json_decode($order->products);
                            @endphp
                            <ul class="order-items">
                                @foreach($items as $product)
                                    <li>{{ $product->name }} - {{ $product->pivot->quantity }}
                                        x {{ $product->pivot->size }}</li>
                                @endforeach
                            </ul>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
