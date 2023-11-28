@extends('admin.admin-layout')

@section('admin')
<div class="container-fluid">
    <h1 class="mt-4">Audit Trail</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Audit Trail</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Action</th>
                            <th>Model</th>
                            <th>Model ID</th>
                            <th>User ID</th>
                            <th>Changes</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($auditTrail as $audit)
                            <tr>
                                <td>{{ $audit->id }}</td>
                                <td>{{ $audit->action }}</td>
                                <td>{{ $audit->model }}</td>
                                <td>{{ $audit->model_name }}</td>
                                <td>{{ $audit->user_id }}</td>
                                <td>{{ $audit->changes }}</td>
                                <td>{{ $audit->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
