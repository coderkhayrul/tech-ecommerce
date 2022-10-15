@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Edit
                    <a href="{{ route('admin.sub.categories') }}" class="btn btn-sm btn-warning" style="float: right;">All
                        Category</a>
                </h6>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('admin.update.sub.category', $subcategory->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="subcategory_name">Sub Category Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $subcategory->subcategory_name }}"id="subcategory_name"
                                    name="subcategory_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($category as $row)
                                        <option {{ $subcategory->category_id == $row->id ? 'selected' : '' }}
                                            value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endforeach
                                </select>
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
