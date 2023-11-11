@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/orders.css') }}"/>
@endsection
@section('content')
    <div
        class="page-heading"
        style="background-image: url({{ asset('web_assets/images/twotshirtsback.jpg') }})"
    >
        <div style="z-index:100" class="text-content">
            <h4>Your Orders</h4>
            <h2 style="color:white" >View and Track Your Orders</h2>
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
                        <div class="liContainer">
                            <div class="codeDiv">
                             <i style="font-size: 45px" class="fa fa-barcode" aria-hidden="true"></i>
                                 <div class="codeInnerDiv"> 
                                  <p style="margin:0px">Order Id:</p>
                                  <a href="{{ url('/orders/'. $order->id) }}">
                            
                          
                                  <p  style="margin:0px"> <strong>{{ $order->code }}</strong></p>
                                  </a>
                                </div>
                            </div>
                            <div class="codeDiv">
                            <i style="font-size: 45px" class="fa fa-calendar" aria-hidden="true"></i>
                                 <div class="codeInnerDiv"> 
                                  <p style="margin:0px">Date:</p>
                                  <p  style="margin:0px"> <strong>{{ \Carbon\Carbon::parse($order->created_at)->toDateString() }}</strong></p>
                                </div>
                            </div>

                         <div class="codeDiv">
                         <i style="font-size: 45px; fill:white" class="fa fa-truck" aria-hidden="true"></i>
                            <div class="codeInnerDiv">
                            <p style="margin:0px">Status:</p>
                                <p style="margin:0px">
                                <strong>

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
                                </strong>
                            </p>
                            </div>
                            
                            @php
                                $items = json_decode($order->products);
                            @endphp
                            </div>
                            
                            <ul class="order-items">
                            <div class="codeDiv">
                            <i style="font-size: 45px; fill:white" class="fa fa-gift" aria-hidden="true"></i>
                            <div class="codeInnerDiv">
                            <li>Product Name:</li>
                                @foreach($items as $product)
                                    <strong><li>{{ $product->name }} - {{ $product->pivot->quantity }}
                                        x {{ $product->pivot->size }}</li></strong>
                                @endforeach
                             </div>
                        </div>
                        </ul>
                        </div>
                
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
