@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupon Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Edit
                    <a href="{{ route('admin.coupon') }}" class="btn btn-sm btn-warning" style="float: right;">All
                        Coupon</a>
                </h6>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('admin.update.coupon', $coupon->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Coupon Code</label>
                                <input type="text" class="form-control" name="coupon" value="{{ $coupon->coupon }}">
                            </div>
                            <div class="form-group">
                                <label for="">Coupon Discount(%)</label>
                                <input type="number" class="form-control" name="discount" value="{{ $coupon->discount }}">
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
