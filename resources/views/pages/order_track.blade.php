@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between border border-secondary rounded p-1">
            <p class="m-0">Order # {{ $code->status_code }}</p>
            <p class="m-0">Placed on: <span class="text-dark">{{ $code->date }}</span></p>
            <p class="m-0">Payment Method:
                <strong class="text-primary">{{ Str::upper($code->payment_type) }}</strong>
            </p>
            <p class="m-0"><strong>Total:</strong> ${{ $code->total }}</p>
        </div>
        {{-- Row End --}}
        <div class="row">
            <div class="col-md-12" style="padding-left: 0px;">
                <div class="mar"  style="margin-top: 100px">
                    <h3 class="text-center">Order Status</h3>
                    <br>
                    <div class="progress">
                        @if($code->status == 0)
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100">Pending
                            </div>
                        @elseif($code->status == 1)
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                Payment Accepted
                            </div>
                        @elseif($code->status == 2)
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                Order Processing
                            </div>
                        @elseif($code->status == 3)
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                Delivery
                            </div>
                        @else
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                Order Cancelled
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
