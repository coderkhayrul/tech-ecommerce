@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">
                    <h5>Order Details
                        <a href="{{ route('admin.order.new') }}" class="btn btn-primary btn-sm" style="float: right;">All
                            Orders</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h5 class="text-light">Order# {{ $order->status_code }} </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-light">Name :</th>
                                                <td>{{ $order->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light">Phone :</th>
                                                <td>{{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light">Payment Type :</th>
                                                <td>
                                                    {{ $order->payment_type }}
                                                    @if ($order->payment_type == 'stripe')
                                                        <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                                                    @elseif ($order->payment_type == 'paypal')
                                                        <i class="fa fa-paypal" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-meetup" aria-hidden="true"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light">Payment Id :</th>
                                                <td>{{ $order->payment_id }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light">Total Amount :</th>
                                                <td>${{ $order->total }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light">Month :</th>
                                                <td>{{ $order->month }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light">Date :</th>
                                                <td>{{ $order->date }}</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- col-md-6 end --}}
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h5 class="text-light">Shipping Details</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg-secondary text-light">Name :</th>
                                                <td>{{ $shipping->ship_name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-secondary text-light">Phone :</th>
                                                <td>{{ $shipping->ship_phone }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-secondary text-light">Email :</th>
                                                <td>{{ $shipping->ship_email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-secondary text-light">City :</th>
                                                <td>{{ $shipping->ship_city }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-secondary text-light">Address :</th>
                                                <td>{{ $shipping->ship_address }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-secondary text-light">Status :</th>
                                                <th>
                                                    @if ($order->status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif ($order->status == 1)
                                                        <span class="badge badge-info">Payment Accepted</span>
                                                    @elseif ($order->status == 2)
                                                        <span class="badge badge-primary">Progress</span>
                                                    @elseif ($order->status == 3)
                                                        <span class="badge badge-success">Delivery</span>
                                                    @else
                                                        <span class="badge badge-danger">Cancelled</span>
                                                    @endif
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- col-md-6 end --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="text-center text-light">Product Details</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-primary">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $row)
                                                <tr class="text-center">
                                                    <td>{{ $row->product_code }}</td>
                                                    <td>{{ $row->product_name }}</td>
                                                    <td><img class="wd-55" src="{{ asset($row->image_one) }}"
                                                            alt=""></td>
                                                    <td>{{ $row->color }}</td>
                                                    <td>{{ $row->size }}</td>
                                                    <td>{{ $row->quantity }}</td>
                                                    <td>${{ $row->singleprice }}</td>
                                                    <td>${{ $row->totalprice }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- col-md-12 end --}}
                    </div>
                    {{-- row end --}}
                    <div class="row d-flex justify-content-center">
                        @if ($order->status == 0)
                            <a href="{{ route('admin.payment.accepted', $order->id) }}"
                                class="btn btn-outline-info btn-lg mx-2">
                                <i class="fa fa-check-circle mg-r-10 text-success"></i>
                                Payment Accepted
                            </a>
                            <a href="{{ route('admin.order.cancelled', $order->id) }}"
                                class="btn btn-outline-danger btn-lg mx-2">
                                <i class="fa fa-ban mg-r-10"></i>
                                Order Cancelled
                            </a>
                        @elseif ($order->status == 1)
                            <a href="{{ route('admin.order.process', $order->id) }}"
                                class="btn btn-outline-info btn-lg mx-2">
                                <i class="fa fa-check-circle mg-r-10 text-success"></i>
                                Order Process
                            </a>
                            <a href="{{ route('admin.order.cancelled', $order->id) }}"
                                class="btn btn-outline-danger btn-lg mx-2">
                                <i class="fa fa-ban mg-r-10"></i>
                                Order Cancelled
                            </a>
                        @elseif ($order->status == 2)
                            <a href="{{ route('admin.order.delivery', $order->id) }}"
                                class="btn btn-outline-info btn-lg mx-2">
                                <i class="fa fa-check-circle mg-r-10 text-success"></i>
                                Order Delivery
                            </a>
                            <a href="{{ route('admin.order.cancelled', $order->id) }}"
                                class="btn btn-outline-danger btn-lg mx-2">
                                <i class="fa fa-ban mg-r-10"></i>
                                Order Cancelled
                            </a>
                        @elseif ($order->status == 3)
                            <a disabled class="btn btn-outline-info btn-lg mx-2">
                                <i class="fa fa-check-circle mg-r-10 text-success"></i>
                                This Product Delivery Successfully
                            </a>
                            <a id="delete" href="{{ route('admin.order.delete', $order->id) }}"
                                class="btn btn-outline-danger btn-lg mx-2">
                                <i class="fa fa-trash-o mg-r-10"></i>
                                Delete Order
                            </a>
                        @else
                            <a class="btn btn-outline-danger btn-lg mx-2">
                                <i class="fa fa-ban mg-r-10"></i>
                                Cancelled
                            </a>
                            <a id="delete" href="{{ route('admin.order.delete', $order->id) }}"
                                class="btn btn-outline-danger btn-lg mx-2">
                                <i class="fa fa-trash-o mg-r-10"></i>
                                Delete Order
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
