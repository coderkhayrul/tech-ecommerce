@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Starlight</a>
            <span class="breadcrumb-item active">Website Setting</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Site Setting</h6>
                <p class="mg-b-20 mg-sm-b-30"> Website Setting</p>

                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="setting_id" value="{{ $setting->id }}">
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone One: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->phone_one }}" class="form-control" type="text" name="phone_one" placeholder="Enter First Phone Number">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->phone_two }}" class="form-control" type="text" name="phone_two" placeholder="Enter Second Phone Number">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->email }}" class="form-control" type="email" name="email" placeholder="Enter Email">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->company_name }}" class="form-control" type="text" name="company_name" placeholder="Enter Company Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->company_address }}" class="form-control" type="text" name="company_address" placeholder="Enter Company Address">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook Url: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->facebook_link }}" class="form-control" type="text" name="facebook_link" placeholder="Enter Facebook Url">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Youtube Url: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->youtube_link }}" class="form-control" type="text" name="youtube_link" placeholder="Enter Youtube Url">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Instagram Url: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->instragram_link }}" class="form-control" type="text" name="instragram_link" placeholder="Enter Instagram Url">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Twitter Url: <span class="tx-danger">*</span></label>
                                    <input value="{{ $setting->twitter_link }}" class="form-control" type="text" name="twitter_link" placeholder="Enter Twitter Url">
                                </div>
                            </div><!-- col-4 -->
                        <!-- row -->
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </form>
            </div>

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
