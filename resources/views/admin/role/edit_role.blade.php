@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Starlight</a>
            <span class="breadcrumb-item active">Admin Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Admin Add</h6>
                <p class="mg-b-20 mg-sm-b-30"> Admin Edit From</p>

                <form action="{{ route('admin.update', $user->id) }}" method="post">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input value="{{ $user->name }}" class="form-control" type="text" name="name"
                                        placeholder="Enter Name" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                    <input value="{{ $user->phone }}" class="form-control" type="text"
                                        name="phone"placeholder="Enter Phone" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input value="{{ $user->email }}" class="form-control" type="email" name="email"
                                        placeholder="Enter Email" required>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <!-- row -->
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="category" value="1"
                                            {{ $user->category == 1 ? 'checked' : '' }}>
                                        <span>Category</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="coupon" value="1"
                                            {{ $user->coupon == 1 ? 'checked' : '' }}>
                                        <span>Coupon</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="product" value="1"
                                            {{ $user->product == 1 ? 'checked' : '' }}>
                                        <span>Product</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="order" value="1"
                                            {{ $user->order == 1 ? 'checked' : '' }}>
                                        <span>Order</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="other" value="1"
                                            {{ $user->other == 1 ? 'checked' : '' }}>
                                        <span>Other</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="report" value="1"
                                            {{ $user->report == 1 ? 'checked' : '' }}>
                                        <span>Report</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="role" value="1"
                                            {{ $user->role == 1 ? 'checked' : '' }}>
                                        <span>Role</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="return" value="1"
                                            {{ $user->return == 1 ? 'checked' : '' }}>
                                        <span>Return</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="contact" value="1"
                                            {{ $user->contact == 1 ? 'checked' : '' }}>
                                        <span>Contact</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="comment" value="1"
                                            {{ $user->comment == 1 ? 'checked' : '' }}>
                                        <span>Comment</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="setting" value="1"
                                            {{ $user->setting == 1 ? 'checked' : '' }}>
                                        <span>Setting</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="stock" value="1"
                                            {{ $user->stock == 1 ? 'checked' : '' }}>
                                        <span>Blog</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="blog" value="1"
                                            {{ $user->blog == 1 ? 'checked' : '' }}>
                                        <span>Blog</span>
                                    </label>
                                </div>
                            </div>
                            <!-- col-4 -->
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
@endsection
