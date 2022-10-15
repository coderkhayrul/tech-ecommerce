@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Product Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List
                    <a href="{{ route('admin.add.product') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>
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
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $row)
                                <tr>
                                    <td>{{ $row->product_code }}</td>
                                    <td>{{ Str::limit($row->product_name, 20, '...') }}</td>
                                    <td><img src="{{ asset($row->image_one) }}" alt=""
                                            height="70px" width="80px">
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
                                    <td>
                                        <a title="Edit" href="{{ route('admin.edit.product', $row->id) }}"
                                            class="btn btn-sm btn-info"><i class="icon ion-edit"></i></a>

                                        <a title="Delete" id="delete" href="{{ route('admin.delete.product', $row->id) }}"
                                            class="btn btn-sm btn-danger"><i class="icon ion-trash-a"></i></a>

                                        <a title="Show" href="{{ route('admin.view.product', $row->id) }}"
                                            class="btn btn-sm btn-info"><i class="icon ion-eye"></i></a>

                                        @if ($row->status == 1)
                                        <a title="Inactive" href="{{ route('admin.inactive.product', $row->id) }}"
                                            class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></a>
                                        @else
                                        <a title="Active" href="{{ route('admin.active.product', $row->id) }}"
                                        class="btn btn-sm btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
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
