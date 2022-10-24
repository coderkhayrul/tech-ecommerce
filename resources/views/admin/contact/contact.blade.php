@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Customer Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Contact Message </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Id</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Phome</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contact as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#MessageShow{{$row->id}}">View</a>
                                </td>
                            </tr>


                            <!-- LARGE MODAL -->
                            <div id="MessageShow{{$row->id}}" class="modal fade">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content tx-size-sm">
                                        <div class="modal-header pd-x-20">
                                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Form {{ $row->name }}</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body pd-20">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <p class="text-dark">{{ $row->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                {{ $row->email }}
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <p class="text-dark">{{ $row->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <p class="text-dark">{{ $row->message }}</p>
                                            </div>
                                        </div><!-- modal-body -->
                                    </div>
                                </div><!-- modal-dialog -->
                            </div><!-- modal -->
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
