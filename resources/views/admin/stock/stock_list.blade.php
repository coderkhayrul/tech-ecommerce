@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Stock Product Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Stock Product List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Product Code</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-10p">Image</th>
                                <th class="wd-10p">Category</th>
                                <th class="wd-10p">Brand</th>
                                <th class="wd-5p">Quantity</th>
                                <th class="wd-5p">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $row)
                                <tr>
                                    <td>{{ $row->product_code }}</td>
                                    <td>{{ Str::limit($row->product_name, 20, '...') }}</td>
                                    <td><img src="{{ asset($row->image_one) }}" alt="" height="70px"
                                            width="80px">
                                    </td>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{{ $row->brand_name }}</td>
                                    <td>{{ $row->product_quantity }}</td>
                                    <td>
                                        @if ($row->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">InActive</span>
                                        @endif
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
