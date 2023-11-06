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
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header py-3">
                                    <div class="card-title">
											<span class="card-icon">
												<span class="svg-icon svg-icon-md svg-icon-primary">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="12" y="4" width="3"
                                                                  height="13" rx="1.5"/>
															<rect fill="#000000" opacity="0.3" x="7" y="9" width="3"
                                                                  height="8" rx="1.5"/>
															<path
                                                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
															<rect fill="#000000" opacity="0.3" x="17" y="11" width="3"
                                                                  height="6" rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
											</span>
                                        <h3 class="card-label">Edit Order Status</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card card-custom">
                                        <div class="card card-custom">
                                            <!--begin::Form-->
                                            <form class="form" method="POST"
                                                  action="{{ route('orders.update', $order) }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <div></div>
                                                        <select class="form-control" name="status">
                                                            <option disabled value="-1">Select Status</option>
                                                            <option
                                                                value="{{ \App\Models\Order::PENDING }}" {{ $order->status == \App\Models\Order::PENDING ? 'selected' : '' }}>
                                                                Pending
                                                            </option>
                                                            <option
                                                                value="{{ \App\Models\Order::CONFIRMED }}" {{ $order->status == \App\Models\Order::CONFIRMED ? 'selected' : '' }}>
                                                                Confirmed
                                                            </option>
                                                            <option
                                                                value="{{ \App\Models\Order::PROGRESS }}" {{ $order->status == \App\Models\Order::PROGRESS ? 'selected' : '' }}>
                                                                In Progress
                                                            </option>
                                                            <option
                                                                value="{{ \App\Models\Order::DELIVERED }}" {{ $order->status == \App\Models\Order::DELIVERED ? 'selected' : '' }}>
                                                                Delivered
                                                            </option>
                                                            <option
                                                                value="{{ \App\Models\Order::CANCELLED }}" {{ $order->status == \App\Models\Order::CANCELLED ? 'selected' : '' }}>
                                                                Cancelled
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('status'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('status') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Note</label>
                                                        <div></div>
                                                        <input class="form-control" name="note" type="text"
                                                               placeholder="Note" value="{{ $order->note }}"
                                                               autocomplete="off"/>
                                                        @if ($errors->has('note'))
                                                            <span style="color:red"><b> {{ $errors->first('note') }}</b></span>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                    <a href="{{ url('admin/orders') }}"
                                                       class="btn btn-secondary">Cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
@endsection

