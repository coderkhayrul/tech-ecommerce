@extends('layouts.app')

@section('content')
    @php
        $order = DB::table('orders')
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();

    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($order as $row)
                    <div class="">
                        <div
                            class="row d-flex align-items-center justify-content-between border border-secondary rounded p-1">
                            <p class="m-0">Order # {{ $row->status_code }}</p>
                            <p class="m-0">
                                <a href="{{ route('user.order.view', $row->id) }}" class="btn btn-sm btn-link"
                                    style="text-decoration: none;">Manage</a>
                            </p>
                        </div>
                        @php
                            $details = DB::table('orders_details')
                                ->join('products', 'orders_details.product_id', 'products.id')
                                ->select('orders_details.*', 'products.product_code', 'products.image_one')
                                ->where('orders_details.order_id', $row->id)
                                ->get();
                        @endphp
                        @foreach ($details as $detail)
                            <div class="row border border-bottom p-1 d-flex align-items-center">
                                <div class="col-md-2">
                                    <img class="img-responsive" src="{{ asset($detail->image_one) }}" alt=""
                                        style="width: 100%; height:100%">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-dark">{{ $detail->product_name }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p>Qty: <strong class="text-dark">{{ $detail->quantity }}</strong></p>
                                </div>
                                <div class="col-md-2">
                                    <p>
                                        <span class="badge badge-secondary">
                                            @if ($row->status == 0)
                                                Pending
                                            @elseif ($row->status == 1)
                                                Payment Accept
                                            @elseif ($row->status == 2)
                                                Progress
                                            @elseif ($row->status == 3)
                                                Delivered
                                            @else
                                                Cancel
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-dark">
                                        @if ($row->status == 3)
                                            03 Aug 2021
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <br>
                @endforeach
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img class="card-image-top mt-4" src="{{ asset('backend/img/img1.jpg') }}" alt=""
                        style="height: 90px; width: 90px; margin-left: 35%;">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ Auth::user()->name }}</h4>
                    </div>
                    <ul class="list-group list-group-flash text-center">
                        <li class="list-group-item"><a href="{{ route('web.password.update') }}">Change Password</a></li>
                        <li class="list-group-item"><a href="">Change Password</a></li>
                        <li class="list-group-item"><a href="">Change Password</a></li>
                        <li class="list-group-item">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
