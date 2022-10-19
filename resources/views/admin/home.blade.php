@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    @php
        $date = date('d-m-d');
        $today = DB::table('orders')
            ->where('date', $date)
            ->sum('total');
        $month = date('F');
        $month = DB::table('orders')
            ->where('month', $month)
            ->sum('total');
        $year = date('Y');
        $year = DB::table('orders')
            ->where('year', $year)
            ->sum('total');

        $total = DB::table('orders')
            ->where('status', 3)
            ->where('return_order', 0)
            ->sum('total');

        $delivery = DB::table('orders')
            ->where('status', 3)
            ->sum('total');
        $return = DB::table('orders')
            ->where('return_order', 2)
            ->sum('total');

        $products = DB::table('products')->get();
        $users = DB::table('users')->get();
    @endphp


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm mb-3">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Order</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $today }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="card pd-20 bg-info">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $month }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-purple">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Yeay</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $year }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Amount</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $total }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->

            <div class="row row-sm mb-3">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-success">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Delivery</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $delivery }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="card pd-20 bg-warning">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Return</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $return }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-danger">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Product</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($products) }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total User</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($users) }}</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
