@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Seach Report</h5>
            </div><!-- sl-page-title -->

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('admin.search.by.date') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Search By Date</label>
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end col --}}
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('admin.search.by.month') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Search By Month</label>
                                    <select class="form-control" name="month" id="">
                                        <option label="Select Month"></option>
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end col --}}
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('admin.search.by.year') }}" method="POST">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="">Seach By Year</label>
                                    <select class="form-control" name="year" id="">
                                        <option label="Select Year"></option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end col --}}
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
