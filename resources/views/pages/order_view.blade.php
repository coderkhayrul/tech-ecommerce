@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between border border-secondary rounded p-1">
            <p class="m-0">Order # {{ $order->status_code }}</p>
            <p class="m-0">Placed on: <span class="text-dark">{{ $order->date }}</span></p>
            <p class="m-0">Payment Method:
                <strong class="text-primary">{{ Str::upper($order->payment_type) }}</strong>
            </p>
            <p class="m-0"><strong>Total:</strong> ${{ $order->total }}</p>
        </div>
        {{-- Row End --}}
        <div class="row d-flex align-items-center justify-content-between my-2 border border-secondary rounded">
            <table class="table table-response mb-2">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Size</th>
                        <th scope="col">Single Price</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $row)
                        <tr>
                            <td scope="col">
                                <img src="{{ asset($row->image_one) }}" alt="" style="width: 70px; height: 70px;">
                            </td>
                            <td scope="col">{{ $row->product_name }}</td>
                            <td scope="col">{{ $row->color }}</td>
                            <td scope="col">{{ $row->size }}</td>
                            <td scope="col">{{ $row->singleprice }}</td>
                            <td scope="col">{{ $row->totalprice }}</td>
                            <td scope="col">{{ $row->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Row End --}}
        <div class="row">
            <div class="col-md-6" style="padding-left: 0px;">
                <ul class="list-group m-2">
                    <li class="list-group-item">
                        <h5>Shipping Address</h5>
                    </li>
                    <li class="list-group-item">
                        <td>{{ $shipping->ship_name }}</td>
                    </li>
                    <li class="list-group-item"><strong
                            class="border border-primary rounded bg-primary text-light">Home</strong>
                        {{ $shipping->ship_address }}
                    </li>
                    <li class="list-group-item">{{ $shipping->ship_city }}</li>
                    <li class="list-group-item">{{ $shipping->ship_phone }}</li>
                </ul>
            </div>
            <div class="col-md-6" style="padding-right: 0px;">
                <ul class="list-group m-2">
                    <li class="list-group-item">
                        <h5>Total Summery</h5>
                    </li>
                    <li class="list-group-item">
                        Subtotal: <span class="float-right">${{ $order->subtotal }}</span>
                    </li>
                    <li class="list-group-item">
                        VAT: <span class="float-right">${{ $setting->vat }}</span>
                    </li>
                    <li class="list-group-item">
                        Shipping Fee: <span class="float-right">${{ $setting->shipping_charge }}</span>
                    </li>
                    <li class="list-group-item">
                        Total: <span
                            class="float-right">${{ $order->subtotal + $setting->vat + $setting->shipping_charge }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
