@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Dashboard</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Detail
                    <a href="{{ route('admin.all.product') }}" class="btn btn-sm btn-success pull-right">All Product</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Show Product Information</p>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->product_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->product_code }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->product_quantity }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->category_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->subcategory_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->brand_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                <br><strong>{{ $product->product_size }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span
                                        class="tx-danger">*</span></label>
                                        <br><strong>{{ $product->product_color }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span
                                        class="tx-danger">*</span></label>
                                        <br><strong>{{ $product->selling_price }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: <span
                                        class="tx-danger">*</span></label>
                                        <br><strong>{!! $product->product_details !!}</strong>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                <br><p>{{ $product->video_link }}</p>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnail): <span
                                        class="tx-danger">*</span></label>
                                        <br>
                                <img class="ml-5 mt-2" src="{{ asset($product->image_one) }}" alt="" height="80px" width="80px">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                <br>
                                <img class="ml-5 mt-2" src="{{ asset($product->image_two) }}" alt="" height="80px" width="80px">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Three: <span
                                        class="tx-danger">*</span></label>
                                        <br>
                                        <img class="ml-5 mt-2" src="{{ asset($product->image_three) }}" alt="" height="80px" width="80px">
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <!-- row -->
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            @if ($product->main_slider)
                            <div class="form-group">
                                <span class="badge badge-success">Active</span>
                                <span> Main Slider</span>
                            </div>
                            @else
                            <div class="form-group">
                                <span class="badge badge-danger">InActive</span>
                                <span> Main Slider</span>
                            </div>
                            @endif
                        </div>
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            @if ($product->hot_deal)
                            <div class="form-group">
                                <span class="badge badge-success">Active</span>
                                <span> Hot Deal</span>
                            </div>
                            @else
                            <div class="form-group">
                                <span class="badge badge-danger">InActive</span>
                                <span> Hot Deal</span>
                            </div>
                            @endif
                        </div>
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            @if ($product->best_rated)
                            <div class="form-group">
                                <span class="badge badge-success">Active</span>
                                <span> Best Rated</span>
                            </div>
                            @else
                            <div class="form-group">
                                <span class="badge badge-danger">InActive</span>
                                <span> Best Rated</span>
                            </div>
                            @endif
                        </div>
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            @if ($product->trend)
                            <div class="form-group">
                                <span class="badge badge-success">Active</span>
                                <span> Trend Product</span>
                            </div>
                            @else
                            <div class="form-group">
                                <span class="badge badge-danger">InActive</span>
                                <span> Trend Product</span>
                            </div>
                            @endif
                        </div>
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            @if ($product->mid_slider)
                            <div class="form-group">
                                <span class="badge badge-success">Active</span>
                                <span> Midele Slider</span>
                            </div>
                            @else
                            <div class="form-group">
                                <span class="badge badge-danger">InActive</span>
                                <span> Midele Slider</span>
                            </div>
                            @endif
                        </div>
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            @if ($product->hot_new)
                            <div class="form-group">
                                <span class="badge badge-success">Active</span>
                                <span> Hot New</span>
                            </div>
                            @else
                            <div class="form-group">
                                <span class="badge badge-danger">InActive</span>
                                <span> Hot New</span>
                            </div>
                            @endif
                        </div>
                        <!-- col-4 -->
                    </div>
                    <!-- row -->
                </div><!-- form-layout -->
            </div>

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
