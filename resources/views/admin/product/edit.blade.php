@extends('admin.admin_layouts')

@section('admin_content')
    @php
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $sub_categories = DB::table('sub_categories')->get();
    @endphp
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Update
                    <a href="{{ route('admin.all.product') }}" class="btn btn-sm btn-success pull-right">All Product</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update From Product</p>

                <form action="{{ route('admin.update.without.product', $product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                        placeholder="Enter Product Name" value="{{ $product->product_name }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text"
                                        name="product_code"placeholder="Enter Product Code"
                                        value="{{ $product->product_code }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity"
                                        placeholder="Enter Quantity" value="{{ $product->product_quantity }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price"
                                        placeholder="Enter Discount" value="{{ $product->discount_price }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category" tabindex="-1"
                                        aria-hidden="true" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}"
                                                {{ $row->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" tabindex="-1" aria-hidden="true"
                                        name="subcategory_id">
                                        @foreach ($sub_categories as $row)
                                            <option value="{{ $row->id }}"
                                                {{ $row->id == $product->subcategory_id ? 'selected' : '' }}>
                                                {{ $row->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Brand" tabindex="-1"
                                        aria-hidden="true" name="brand_id">
                                        <option label="Choose Brand"></option>
                                        @foreach ($brands as $br)
                                            <option value="{{ $br->id }}"
                                                {{ $br->id == $product->brand_id ? 'selected' : '' }}>
                                                {{ $br->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <input id="size" class="form-control" type="text" name="product_size"
                                        data-role="tagsinput" value="{{ $product->product_size }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_color" data-role="tagsinput"
                                        id="color" value="{{ $product->product_color }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price"
                                        placeholder="Selling Price" value="{{ $product->selling_price }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span
                                            class="tx-danger">*</span></label>
                                    <textarea id="summernote" class="form-control" name="product_details">{{ $product->product_details }}</textarea>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="video_link"
                                        placeholder="Video Link " value="{{ $product->video_link }}">
                                </div>
                            </div><!-- col-12 -->

                        </div>
                        <!-- row -->
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->main_slider == 1 ? 'checked' : '' }} type="checkbox"
                                            name="main_slider" value="1">
                                        <span>Main Slider</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->hot_deal == 1 ? 'checked' : '' }} type="checkbox"
                                            name="hot_deal" value="1">
                                        <span>Hot Deal</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->best_rated == 1 ? 'checked' : '' }} type="checkbox"
                                            name="best_rated" value="1">
                                        <span>Best Rated</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->trend == 1 ? 'checked' : '' }} type="checkbox" name="trend"
                                            value="1">
                                        <span>Trend Product</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->mid_slider == 1 ? 'checked' : '' }} type="checkbox"
                                            name="mid_slider" value="1">
                                        <span>Midele Slider</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->buyone_getone == 1 ? 'checked' : '' }} type="checkbox"
                                            name="buyone_getone" value="1">
                                        <span>Buyone Getone</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input {{ $product->hot_new == 1 ? 'checked' : '' }} type="checkbox"
                                            name="hot_new" value="1">
                                        <span>Hot New</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                        </div>
                        <!-- row -->
                        <br><br>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update Form</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
            <br>


            {{-- IMAGE UPDATE Card --}}

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Image Update
                    <a href="{{ route('admin.all.product') }}" class="btn btn-sm btn-success pull-right">All Product</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update From Product</p>
                <form action="{{ route('admin.update.with.product', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnail): <span
                                        class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input onchange="readURL(this)" name="image_one" type="file" id="file"
                                        class="custom-file-input">
                                    <input type="hidden" name="old_one" value="{{ $product->image_one }}">
                                    <span class="custom-file-control"></span>
                                </label>
                                <img class="ml-5 mt-2" src="{{ asset($product->image_one) }}" id="one"
                                    alt="">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                <br>
                                <label class="custom-file">
                                    <input onchange="readURL2(this)" name="image_two" type="file" id="file"
                                        class="custom-file-input">
                                    <input type="hidden" name="old_two" value="{{ $product->image_two }}">
                                    <span class="custom-file-control"></span>
                                </label>
                                <img class="ml-5 mt-2" src="{{ asset($product->image_two) }}" id="two"
                                    alt="">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                                <br>
                                <label class="custom-file">
                                    <input onchange="readURL3(this)" name="image_three" type="file" id="file"
                                        class="custom-file-input">
                                    <input type="hidden" name="old_three" value="{{ $product->image_three }}">
                                    <span class="custom-file-control"></span>
                                </label>
                                <img class="ml-5 mt-2" src="{{ asset($product->image_three) }}" id="three"
                                    alt="">
                            </div>
                        </div><!-- col-4 -->
                        <br>
                        <div class="form-layout-footer py-5">
                            <button type="submit" class="btn btn-warning mg-r-5">Update Form</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </form>

            </div>

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    {{-- JQUERY CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    {{-- TAH INPUT JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
