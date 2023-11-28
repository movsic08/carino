@extends('staff.staff-layout')
@section('staff')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Schedule Request All </h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usermsg as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['user']['name'] }}</td>
                                    <td>{{ $item->visit_date }}</td>
                                    <td>{{ $item->visit_time }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge rounded-pill bg-success">Confirm</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                      <a href="{{ route('staff.details.schedule', $item->id) }}" class="btn btn-inverse-info" title="Details"><i class="fa-solid fa-expand fa-xs"></i></a>
                                      <a href="#" class="btn btn-inverse-danger" id="delete" title="Delete"><i class="fa-solid fa-trash-can fa-xs"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
