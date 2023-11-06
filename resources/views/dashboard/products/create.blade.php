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
                                        <h3 class="card-label">Add Product</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card card-custom">
                                        <div class="card card-custom">
                                            <!--begin::Form-->
                                            <form class="form" method="POST"
                                                  action="{{ route('admin-products.store') }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <div></div>
                                                        <input class="form-control" name="name" type="text"
                                                               placeholder="Name"
                                                               value="{{old('name')}}"/>
                                                        @if ($errors->has('name'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('name') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <div></div>
                                                        <input class="form-control" name="price" type="number"
                                                               placeholder="Price"
                                                               value="{{old('price')}}"/>
                                                        @if ($errors->has('price'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('price') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Discount Price</label>
                                                        <div></div>
                                                        <input class="form-control" name="discount_price" type="number"
                                                               placeholder="Leave blank if no discount"
                                                               value="{{old('discount_price')}}"/>
                                                        @if ($errors->has('discount_price'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('discount_price') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" id="exampleTextarea" rows="10"
                                                                  name="description">{{ old('description') }}</textarea>
                                                        @if ($errors->has('description'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('description') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Size One Stock</label>
                                                        <div></div>
                                                        <input class="form-control" name="size_one_stock" type="number"
                                                               placeholder="Size One Stock"
                                                               value="{{old('size_one_stock')}}"/>
                                                        @if ($errors->has('size_one_stock'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('size_one_stock') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Size Two Stock</label>
                                                        <div></div>
                                                        <input class="form-control" name="size_two_stock" type="number"
                                                               placeholder="Size Two Stock"
                                                               value="{{old('size_two_stock')}}"/>
                                                        @if ($errors->has('size_two_stock'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('size_two_stock') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <div></div>
                                                        <select class="form-control selectpicker"
                                                                data-size="7"
                                                                data-live-search="true"
                                                                name="category_id">
                                                            <option disabled selected value="0">Select Category
                                                            </option>
                                                            @foreach($categories as $category)
                                                                <option
                                                                    value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('category_id'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('category_id') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <div></div>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input"
                                                                   id="customFile"/>
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('image') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Gallery</label>
                                                        <div></div>
                                                        <div class="custom-file">
                                                            <input type="file" multiple name="gallery[]"
                                                                   class="custom-file-input"
                                                                   id="customFiles"/>
                                                            <label class="custom-file-label" for="customFiles">Choose
                                                                files</label>
                                                        </div>
                                                        @if ($errors->has('gallery'))
                                                            <span
                                                                style="color:red"><b> {{ $errors->first('gallery') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Featured</label>
                                                        <div></div>
                                                        <span class="switch switch-md switch-icon">
                                                            <label>
                                                                <input
                                                                    type="checkbox"
                                                                    {{ old('featured') == 'on' ? 'checked' : '' }}
                                                                    name="featured"/>
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                    <a href="{{ url('/admin/products') }}" class="btn btn-secondary">Cancel</a>
                                                </div>
                                            </form>
                                            <!--end::Form-->
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

