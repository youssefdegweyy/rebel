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
                                        <h3 class="card-label">Rebel Dashboard</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <!--begin::Stats Widget 30-->
                                            <a href="{{ url('/admin/delivered-orders') }}">
                                                <div class="card card-custom bg-primary card-stretch gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                                        <span
                                                            class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ $sold_orders }}</span>
                                                        <span class="font-weight-bold text-white font-size-sm">Total Orders Delivered</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                            </a>
                                            <!--end::Stats Widget 30-->
                                        </div>
                                        <div class="col-xl-3">
                                            <!--begin::Stats Widget 30-->
                                            <a href="">
                                                <div class="card card-custom bg-info card-stretch gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                                        <span
                                                            class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block"></span>
                                                        <span
                                                            class="font-weight-bold text-white font-size-sm">Total</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                            </a>
                                            <!--end::Stats Widget 30-->
                                        </div>
                                        <div class="col-xl-3">
                                            <!--begin::Stats Widget 31-->
                                            <a href="">
                                                <div class="card card-custom bg-danger card-stretch gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                                        <span
                                                            class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block"></span>
                                                        <span
                                                            class="font-weight-bold text-white font-size-sm">Total</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                            </a>
                                            <!--end::Stats Widget 31-->
                                        </div>
                                        <div class="col-xl-3">
                                            <!--begin::Stats Widget 32-->
                                            <a href="">
                                                <div class="card card-custom bg-dark card-stretch gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
															<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
															<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                                                        <span
                                                            class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block"></span>
                                                        <span
                                                            class="font-weight-bold text-white font-size-sm">Total</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Stats Widget 32-->
                                            </a>
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
                <!--begin::Footer-->
                @include('layouts.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
@endsection
