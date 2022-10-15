@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Blog Category List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                        data-target="#modaldemo3">Add New Category</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-15p">Category Name English</th>
                                <th class="wd-15p">Category Name Hindi</th>
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogcat as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->category_name_en }}</td>
                                    <td>{{ $row->category_name_in }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.blog.category', $row->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <a id="delete" href="{{ route('admin.delete.blog.category', $row->id) }}"
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

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Blog Category Add</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.store.blog.category') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">
                        {{-- Error Show --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">Category Name English</label>
                            <input type="text" class="form-control" name="category_name_en" placeholder="Blog Category English">
                        </div>
                        <div class="form-group">
                            <label for="">Category Name Hindi</label>
                            <input type="text" class="form-control" name="category_name_in" placeholder="Blog Category Hindi">
                        </div>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection
