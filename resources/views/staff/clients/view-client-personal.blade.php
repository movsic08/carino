@extends('staff.staff-layout')
@section('admin')
<style>
    .custom-background {
        background-color: #161A30;
        color: #fff;
    }

    input[readonly] {
        background-color: #f8f9fa;
        color: #6c757d;
        cursor: not-allowed;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3"><b>Client Management</b></div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Client Personal Information</li>
            </ol>
        </nav>
    </div>

    <div class="ms-auto">
        <a href="{{ route('edit-client-personal-info', ['id' => $client->id]) }}" class="btn btn-sm" style="background-color: #164863; color: #fff;">
            Update Client Information <i class='bx bxs-pencil'></i>
        </a>
    </div>
</div>

    <hr>
    <!--end breadcrumb-->
    
    <hr>


    <div class="card">
        <!-- Card Body -->
        <div class="card-body">

            <div class="container">
                <div class="row mb-3">
                    <div class="col-2">
                        <button class="btn btn-sm" onclick="goToClientDirectory()" style="background: none; border: none;">
                        <i class="fas fa-arrow-left fa-xxs"></i></i>
                        </button>
                    </div>
                    <div class="col-8 text-center">
                        <h5 class="text-uppercase"><strong>Client Information</strong></h5>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="row g-3">
                        <h6 class="mb-3">Personal Information</h6>

                        <div class="row mb-3">
                            <!-- First Name (Read-Only) -->
                            <div class="col-md-4">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" placeholder="" aria-label="First Name" name="first_name" value="{{ $client->first_name }}" readonly>
                            </div>
                        
                            <!-- Middle Name (Read-Only) -->
                            <div class="col-md-4">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Middle Name" name="middle_name" value="{{ $client->middle_name }}" readonly>
                            </div>
                        
                            <!-- Last Name (Read-Only) -->
                            <div class="col-md-4">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Last Name" name="last_name" value="{{ $client->last_name }}" readonly>
                            </div>
                        </div>                                        

                        <div class="row mb-3">
                            <!-- Date of Birth (Read-Only) -->
                            <div class="col-md-4">
                                <label class="form-label">Date of Birth *</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Date of Birth" name="date_of_birth" value="{{ $client->date_of_birth }}" readonly>
                            </div>
                        
                            <!-- Age (Read-Only) -->
                            <div class="col-md-4">
                                <label class="form-label">Age *</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Age" name="age" value="{{ $client->age }}" readonly>
                            </div>
                        
                            <!-- Gender (Read-Only) -->
                            <div class="col-md-4">
                                <label class="form-label">Gender *</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Gender" name="gender" value="{{ $client->gender }}" readonly>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mb-3">

                <!-- Street Number (Read-Only) -->
                <div class="col-md-4">
                    <label class="form-label">Street Number *</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Street Number" name="street_number" value="{{ $client->street_number }}" readonly>
                </div>

                <!-- Street Name (Read-Only) -->
                <div class="col-md-4">
                    <label class="form-label">Street Name *</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Street Name" name="street_name" value="{{ $client->street_name }}" readonly>
                </div>

                <!-- Barangay (Read-Only) -->
                <div class="col-md-4">
                    <label class="form-label">Barangay</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Barangay" name="barangay" value="{{ $client->barangay }}" readonly>
                </div>

    </div>
    <div class="row mb-3">
        <!-- City/Municipality (Read-Only) -->
        <div class="col-md-6">
            <label class="form-label">City/Municipality *</label>
            <input type="text" class="form-control" placeholder="" aria-label="City/Municipality" name="city_municipality" value="{{ $client->city_municipality }}" readonly>
        </div>
    
        <!-- Province (Read-Only) -->
        <div class="col-md-6">
            <label class="form-label">Province *</label>
            <input type="text" class="form-control" placeholder="" aria-label="Province" name="province" value="{{ $client->province }}" readonly>
        </div>
    </div>
    

    <div class="row mb-3">
        <!-- Contact Number (Read-Only) -->
        <div class="col-md-4">
            <label class="form-label">Contact Number *</label>
            <input type="text" class="form-control" placeholder="" aria-label="Contact Number" name="contact_number" value="{{ $client->contact_number }}" readonly>
        </div>
    
        <!-- Educational Attainment (Read-Only) -->
        <div class="col-md-4">
            <label class="form-label">Educational Attainment *</label>
            <input type="text" class="form-control" placeholder="" aria-label="Educational Attainment" name="educational_attainment" value="{{ $client->educational_attainment }}" readonly>
        </div>
    
        <!-- Occupation (Read-Only) -->
        <div class="col-md-4">
            <label class="form-label">Occupation *</label>
            <input type="text" class="form-control" placeholder="" aria-label="Occupation" name="occupation" value="{{ $client->occupation }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <!-- Civil Status (Read-Only) -->
        <div class="col-md-6">
            <label class="form-label">Civil Status *</label>
            <input type="text" class="form-control" placeholder="" aria-label="Civil Status" name="civil_status" value="{{ $client->civil_status }}" readonly>
        </div>
    
        <!-- Religion (Read-Only) -->
        <div class="col-md-6">
            <label class="form-label">Religion *</label>
            <input type="text" class="form-control" placeholder="" aria-label="Religion" name="religion" value="{{ $client->religion }}" readonly>
        </div>
    </div>


        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h6 class="mb-3">Spouse Information</h6>
            <!-- Spouse Information -->
            <div class="row mb-3">
                <!-- Spouse First Name -->
                <div class="col-md-4">
                    <label class="form-label">Spouse First Name</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Spouse First Name" name="spouse_first_name" value="{{ $client->spouse_first_name }}" readonly>
                </div>
                
                <!-- Spouse Middle Name -->
                <div class="col-md-4">
                    <label class="form-label">Spouse Middle Name</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Spouse Middle Name" name="spouse_middle_name" value="{{ $client->spouse_middle_name }}" readonly>
                </div>

                <!-- Spouse Last Name -->
                <div class="col-md-4">
                    <label class="form-label">Spouse Last Name</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Spouse Last Name" name="spouse_last_name" value="{{ $client->spouse_last_name }}" readonly>
                </div>
            </div>
        
                
    <div class="row mb-3">
                <!-- Spouse Date of Birth -->
                <div class="col-md-4">
                    <label class="form-label">Spouse Date of Birth</label>
                    <input type="date" class="form-control" placeholder="" aria-label="Spouse Date of Birth" name="spouse_date_of_birth" value="{{ $client->spouse_date_of_birth }}" readonly>
                </div>
    
                <!-- Spouse Age -->
                <div class="col-md-4">
                    <label class="form-label">Spouse Age</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Spouse Age" name="spouse_age" value="{{ $client->spouse_age }}" readonly>
                </div>
    
                <!-- Spouse Occupation -->
                <div class="col-md-4">
                    <label class="form-label">Spouse Occupation</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Spouse Occupation" name="spouse_occupation" value="{{ $client->spouse_occupation }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
    
                <!-- Number of Children -->
                <div class="col-md-4">
                    <label class="form-label">Number of Children</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Number of Children" name="number_of_children" value="{{ $client->number_of_children }}" readonly>
                </div>
    
                <!-- Plan for More Children -->
                <div class="col-md-4">
                    <label class="form-label">Plan for More Children</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Plan for More Children" name="plan_more_children" value="{{ $client->plan_more_children }}" readonly>
                </div>
    
                <!-- Average Monthly Income -->
                <div class="col-md-4">
                    <label class="form-label">Average Monthly Income</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Average Monthly Income" name="average_monthly_income" value="{{ $client->average_monthly_income }}" readonly>
                </div>
    
            </div>
        </div>
    </div>

    <hr>

    <div class="card custom-background">
        <div class="card-body">
            <div class="row">
                <!-- Reason for Family Planning -->
                <div class="col-md-4">
                    <label class="form-label">Reason for Family Planning</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Reason for Family Planning" name="reason_for_fp" value="{{ $client->reason_for_fp }}" readonly>
                </div>
    
                <!-- Method Accepted -->
                <div class="col-md-4">
                    <label class="form-label">Method Accepted</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Method Accepted" name="method_accepted" value="{{ $client->method_accepted }}" readonly>
                </div>
    
                <!-- Edit Button with Icon -->
                <div class="col-md-4 mt-4">
                    <label class="form-label"></label>
                    <button type="button" class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fa-regular fa-floppy-disk fa-2x"></i> Change Method
                    </button>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields for editing here -->
                <div class="mb-3">
                    <label for="edit_method_accepted" class="form-label">Change Method</label>
                    <input type="text" class="form-control" id="edit_method_accepted" name="edit_method_accepted" value="{{ $client->method_accepted }}">
                </div>
                <div class="mb-3">
                    <label for="edit_reason_for_change" class="form-label">Reason for Change</label>
                    <input type="text" class="form-control" id="edit_reason_for_change" name="edit_reason_for_change">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function goToClientDirectory() {
        window.location.href = "{{ url('admin/client-directory') }}";
    }
</script>
    
@endsection