@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Seo Section</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Seo Setting</h6>

            <form action="{{ route('admin.seo.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $seo->id }}">
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Meta Title: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title"
                                    placeholder="Enter Meta Title" value="{{ $seo->meta_title }}">
                                    @error('meta_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Meta Author: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control @error('meta_author') is-invalid @enderror" type="text" name="meta_author"
                                    placeholder="Enter Meta Author" value="{{ $seo->meta_author }}">
                                    @error('meta_author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Meta Tag: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control @error('meta_tag') is-invalid @enderror" type="text" name="meta_tag"
                                    placeholder="Enter Meta Tag" value="{{ $seo->meta_tag }}">
                                    @error('meta_tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Meta Description: <span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" name="meta_description">{{ $seo->meta_description }}</textarea>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Google Analytics: <span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" name="google_analytics">{{ $seo->google_analytics }}</textarea>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Bing Analytics: <span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" name="bing_analytics">{{ $seo->bing_analytics }}</textarea>
                            </div>
                        </div><!-- col-12 -->
                    </div>
                    <!-- row -->
                    <br><br>
                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection
