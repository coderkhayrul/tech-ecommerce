@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Blog Category Edit
                    <a href="{{ route('admin.all.blog.category') }}" class="btn btn-sm btn-warning" style="float: right;">All
                        Category</a>
                </h6>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('admin.update.blog.category', $category->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name English</label>
                                <input type="text" class="form-control"
                                    value="{{ $category->category_name_en }}"id="category_name_en" name="category_name_en">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Category Name Hindi</label>
                                <input type="text" class="form-control"
                                    value="{{ $category->category_name_in }}"id="category_name_in" name="category_name_in">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
