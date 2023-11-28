@extends('staff.staff-layout')
@section('staff')

@php
$id = Auth::user()->id;
$staffId = App\Models\User::find($id);
$status = $staffId->status;
@endphp
@unless($status === 'active')
<h5 class="mb-0">Staff Account Is <span class="text-danger">Inactive</span></h5>
<small class="text-danger"><b>Please wait, admin will check and approve your account</b></small>
<hr>
@endunless
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h5 class="mb-3 mb-md-0">Welcome to Dashboard</h5>
    </div>
</div>






@endsection