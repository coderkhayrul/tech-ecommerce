@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Product Add
                    <a href="{{ route('admin.all.product') }}" class="btn btn-sm btn-success pull-right">All Product</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Product Add From</p>

                <form action="{{ route('admin.store.product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                        placeholder="Enter Product Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text"
                                        name="product_code"placeholder="Enter Product Code">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity"
                                        placeholder="Enter Quantity">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price"
                                        placeholder="Enter Discount Price">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category" tabindex="-1"
                                        aria-hidden="true" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" tabindex="-1" aria-hidden="true"
                                        name="subcategory_id">
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
                                            <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <input id="size" class="form-control" type="text" name="product_size"
                                        data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_color" data-role="tagsinput"
                                        id="color">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price"
                                        placeholder="Selling Price">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span
                                            class="tx-danger">*</span></label>
                                    <textarea id="summernote" class="form-control" name="product_details"></textarea>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="video_link"
                                        placeholder="Video Link">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image One (Main Thumbnail): <span
                                            class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input onchange="readURL(this)" name="image_one" type="file" id="file"
                                            class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <img class="ml-5 mt-2" src="" id="one" alt="">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                    <br>
                                    <label class="custom-file">
                                        <input onchange="readURL2(this)" name="image_two" type="file" id="file"
                                            class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <img class="ml-5 mt-2" src="" id="two" alt="">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three: <span
                                            class="tx-danger">*</span></label>
                                    <br>
                                    <label class="custom-file">
                                        <input onchange="readURL3(this)" name="image_three" type="file"
                                            id="file" class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <img class="ml-5 mt-2" src="" id="three" alt="">
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <!-- row -->
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="main_slider" value="1">
                                        <span>Main Slider</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_deal" value="1">
                                        <span>Hot Deal</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="best_rated" value="1">
                                        <span>Best Rated</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="trend" value="1">
                                        <span>Trend Product</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="mid_slider" value="1">
                                        <span>Midele Slider</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_new" value="1">
                                        <span>Hot New</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="buyone_getone" value="1">
                                        <span>Buyone Getone</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                        </div>
                        <!-- row -->
                        <br><br>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
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
