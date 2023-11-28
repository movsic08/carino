@extends('admin.admin-layout')
@section('admin')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3"><b>Inventory</b></div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Item Information</li>
            </ol>
        </nav>
    </div>

    <div class="ms-auto">
        <a href="{{ route('admin.audit-trail.show') }}" class="btn btn-sm" style="background-color: #164863; color: #fff;">
            View Audit Trail <i class='bx bx-history'></i>
        </a>
    </div>
</div>
<hr>
<!--end breadcrumb-->

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-sm" onclick="redirectToAssessmentDirectory()" style="background: none; border: none;">
                        <i class="fas fa-arrow-left fa-2xs"></i></i>
                        </button>
                    </div>
                    <div class="col-8 text-center">
                        <h3 class="fw-bold text-center">{{ $inventoryItem->name }}</h3>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="col-md-12">

                <hr>
                <div class="card mb-4">
                    <img src="{{ $inventoryItem->item_photo ? asset('/upload/inventory_photos/' . $inventoryItem->item_photo) : asset('placeholder.jpg') }}" alt="Item Photo" class="card-img-top" style="object-fit: cover; height: 300px;">
                    
                    <div class="card-body">
                        <h6 class="card-title">Item Description</h6>
                        <p class="card-text justify">{{ $inventoryItem->description }}</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Item Details</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Item Code:</th>
                                    <td>{{ $inventoryItem->item_code }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Stocks:</th>
                                    <td>{{ $inventoryItem->stocks }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Availability:</th>
                                    <td>{{ $inventoryItem->availability ? 'Available' : 'Not Available' }}</td>
                                </tr>
                            </tbody>
                        </table>
    

                        <hr>
                        <a href="{{ route('admin.inventory.manage') }}" class="btn btn-primary">Back to Inventory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container mt-4">

</div>

<h1>Inventory Item: {{ $inventoryItem->name }}</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Quantity Change</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockHistories as $history)
                <tr>
                    <td>{{ $history->created_at }}</td>
                    <td>{{ $history->quantity_change }}</td>
                    <td>{{ $history->action }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

<script>
    function redirectToAssessmentDirectory() {
        window.location.href = 'inventory/manage';
    }
 </script>
@endsection
