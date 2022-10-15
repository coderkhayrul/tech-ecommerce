@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Month Report</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="badge badge-primary" style="font-size: 20px">Total Amount This Month : ${{ $total }}</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-20p">Payment Type</th>
                                <th class="wd-20p">Translation ID</th>
                                <th class="wd-20p">SubTotal</th>
                                <th class="wd-20p">Shippig</th>
                                <th class="wd-20p">Total</th>
                                <th class="wd-20p">Date</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-uppercase">{{ $row->payment_type }}</td>
                                    <td>{{ $row->blnc_transection }}</td>
                                    <td>${{ $row->subtotal }}</td>
                                    <td>{{ $row->shipping }}</td>
                                    <td>${{ $row->total }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>
                                        @if ($row->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($row->status == 1)
                                            <span class="badge badge-info">Payment Accepted</span>
                                        @elseif($row->status == 2)
                                            <span class="badge badge-primary">Process</span>
                                        @elseif($row->status == 3)
                                            <span class="badge badge-success">Delivery</span>
                                        @else
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.order.view', $row->id) }}"
                                            class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
