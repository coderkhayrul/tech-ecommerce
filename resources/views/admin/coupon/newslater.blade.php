@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscriber Table</h5>
            </div><!-- sl-page-title -->

            <form method="POST">
                @csrf
                @method('DELETE')
                <button formaction="{{ route('admin.newslater.alldelete') }}" type="submit" class="btn btn-danger">All
                    Delete</button>
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Subscriber List</h6>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-5p">Id</th>
                                    <th class="wd-15p">Email</th>
                                    <th class="wd-15p">Subscribe Time</th>
                                    <th class="wd-10p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newslater as $key => $row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{ $row->id }}">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a id="delete" href="{{ route('admin.delete.newslater', $row->id) }}"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </form>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
