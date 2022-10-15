@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Post Section</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Post Update
                <a href="{{ route('admin.all.blog.post') }}" class="btn btn-sm btn-success pull-right">All Product</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">Post Update Form</p>

            <form action="{{ route('admin.update.blog.post',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Title (English): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control @error('post_title_en') is-invalid @enderror" type="text" name="post_title_en"
                                    placeholder="Enter Title English" value="{{ $post->post_title_en }}">
                                    @error('post_title_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Title (Hindi): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control @error('post_title_in') is-invalid @enderror" type="text" name="post_title_in"
                                    placeholder="Enter Title Hindi" value="{{ $post->post_title_in }}">
                                    @error('post_title_in')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 @error('category_id') is-invalid @enderror" data-placeholder="Choose Category" tabindex="-1"
                                    aria-hidden="true" name="category_id">
                                    <option label="Choose Category"></option>
                                    @foreach ($categories as $row)
                                    <option {{ $post->category_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Details (English): <span
                                        class="tx-danger">*</span></label>
                                <textarea id="summernote" class="form-control" name="details_en">{{ $post->details_en }}</textarea>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Details (Hindi): <span
                                        class="tx-danger">*</span></label>
                                <textarea id="summernote1" class="form-control" name="details_in">{{ $post->details_in }}</textarea>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input onchange="readURL(this)" name="post_image" type="file" id="file"
                                        class="custom-file-input @error('post_image') is-invalid @enderror">
                                    <span class="custom-file-control"></span>
                                </label>
                                <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                                @error('post_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img class="ml-5 mt-2" src="{{ asset($post->post_image) }}" id="one" alt="" height="100" width="200">
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <!-- row -->
                    <br><br>
                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
