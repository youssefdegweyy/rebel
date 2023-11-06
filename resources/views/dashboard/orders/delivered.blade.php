@extends('layouts.main')
@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            @include('layouts.navigation')
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Notice-->
                            <!--end::Notice-->
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-favourite text-primary"></i>
											</span>
                                        <h3 class="card-label">Delivered Orders</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                                           style="margin-top: 13px !important">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>User Address</th>
                                            <th>User Mobile</th>
                                            <th>User Area</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->mobile }}</td>
                                                <td>{{ $order->city->name }} - {{ $order->city->price }} EGP</td>
                                                <td>{{ $order->total }}</td>
                                                <td>Delivered</td>
                                                <td>{{ $order->note }}</td>
                                                <td>
                                                    <a href="#"
                                                       class="btn btn-primary font-weight-bolder font-size-sm"
                                                       data-toggle="modal"
                                                       data-target="#details{{$order->id}}">
                                                        <i class="flaticon-eye"
                                                           style="padding-right: 0rem !important;"></i>
                                                    </a>

                                                    <div class="modal fade" id="details{{$order->id}}" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                             role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Order
                                                                        Details - Products</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: left">
                                                                    @foreach(json_decode($order->products) as $product)
                                                                        <h3>
                                                                            {{ $product->name }}
                                                                            - {{ $product->pivot->quantity }}
                                                                            * {{ $product->pivot->size }}
                                                                        </h3>
                                                                    @endforeach
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-light-primary font-weight-bold"
                                                                            data-dismiss="modal">Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="#"
                                                       class="btn btn-danger font-weight-bolder font-size-sm"
                                                       data-toggle="modal"
                                                       data-target="#delete{{$order->id}}">
                                                        <i class="flaticon2-rubbish-bin-delete-button"
                                                           style="padding-right: 0rem !important;"></i>
                                                    </a>

                                                    <div class="modal fade" id="delete{{$order->id}}" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                             role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are
                                                                        you sure you want to move this order to
                                                                        cancelled orders?</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    method="POST"
                                                                    action="{{ route('mark_order_cancelled', $order) }}">
                                                                    <div class="modal-body" style="text-align: left">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <label>Enter Note:</label>
                                                                                <input type="text" name="note"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        @csrf
                                                                        <input
                                                                            type="submit"
                                                                            class="btn btn-danger font-weight-bolder font-size-sm"
                                                                            value="Confirm">
                                                                        <button type="button"
                                                                                class="btn btn-light-primary font-weight-bold"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('layouts.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
@endsection
