@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Brand Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand Edit
                    <a href="{{ route('admin.brands') }}" class="btn btn-sm btn-warning" style="float: right;">All
                        Brand</a>
                </h6>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('admin.update.brand', $brand->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                                    value="{{ $brand->brand_name }}"id="brand_name" name="brand_name">
                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_url">Brand Url</label>
                                <input type="text" class="form-control" value="{{ $brand->brand_url }}"id="brand_url"
                                    name="brand_url">
                            </div>
                            <div class="form-group">
                                <label for="brand_logo">Brand Logo</label>
                                <input type="file" class="form-control" id="brand_logo" name="brand_logo">
                            </div>
                            <div class="form-group">
                                <img width="120px" height="80px" id="old_image" class="mb-3" src="{{ URL::to($brand['brand_logo']) }}"
                                    alt="{{ $brand->brand_name }}">
                                <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
