@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Post Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post List
                    <a href="{{ route('admin.create.blog.post') }}" class="btn btn-sm btn-warning" style="float: right;">Add New Post</a>
                </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Title English</th>
                                <th class="wd-10p">Image</th>
                                <th class="wd-10p">Category</th>
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $row)
                                <tr>
                                    <td>{{ Str::limit($row->post_title_en, 20, '...') }}</td>
                                    <td><img src="{{ asset($row->post_image) }}" alt=""
                                            height="70px" width="80px">
                                    </td>
                                    <td>{{ $row->category_name_en }}</td>
                                    <td>
                                        <a title="Edit" href="{{ route('admin.edit.blog.post', $row->id) }}"
                                            class="btn btn-sm btn-info"><i class="icon ion-edit"></i></a>

                                        <a title="Delete" id="delete" href="{{ route('admin.delete.blog.post', $row->id) }}"
                                            class="btn btn-sm btn-danger"><i class="icon ion-trash-a"></i></a>

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
