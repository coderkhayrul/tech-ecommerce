@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Admin Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Admin List
                    <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Phone</th>
                                <th class="wd-60p">Access</th>
                                <th class="wd-10p text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>
                                        @if ($row->category == 1)
                                            <span class="badge badge-danger">Category</span>
                                        @endif
                                        @if ($row->coupon == 1)
                                            <span class="badge badge-info">Coupon</span>
                                        @endif
                                        @if ($row->product == 1)
                                            <span class="badge badge-warning">Product</span>
                                        @endif
                                        @if ($row->order == 1)
                                            <span class="badge badge-secondary">Order</span>
                                        @endif
                                        @if ($row->other == 1)
                                            <span class="badge badge-primary">Other</span>
                                        @endif
                                        @if ($row->report == 1)
                                            <span class="badge badge-danger">Report</span>
                                        @endif
                                        @if ($row->role == 1)
                                            <span class="badge badge-success">Role</span>
                                        @endif
                                        @if ($row->return == 1)
                                            <span class="badge badge-warning">Return</span>
                                        @endif
                                        @if ($row->contact == 1)
                                            <span class="badge badge-primary">Contact</span>
                                        @endif
                                        @if ($row->comment == 1)
                                            <span class="badge badge-secondary">Comment</span>
                                        @endif
                                        @if ($row->setting == 1)
                                            <span class="badge badge-danger">Setting</span>
                                        @endif
                                        @if ($row->blog == 1)
                                            <span class="badge badge-warning">Blog</span>
                                        @endif
                                        @if ($row->blog == 1)
                                            <span class="badge badge-warning">Stock</span>
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a id="delete" href="{{ route('admin.delete', $row->id) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
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
