@extends('admin.admin-layout')

@section('admin')
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
                </ol>
            </nav>
        </div>
    </div>
    <hr>

    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-2">
                        <button class="btn btn-sm" onclick="redirectToAssessmentDirectory()" style="background: none; border: none;">
                            <i class="fas fa-arrow-left fa-2xs"></i>
                        </button>
                    </div>
                    <div class="col-8 text-center">
                        <h5 class="text-uppercase"><strong>Add Permission</strong></h5>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

            <hr>

            <form action="{{ route('update.permission') }}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{ $permission->id }}">

                <div class="card bg-light">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Permission Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="group_name">Group Name:</label>
                                    <select class="form-select" id="group_name" name="group_name">
                                        <option value="" disabled {{ $permission->group_name ? '' : 'selected'}}>Select Group</option>
                                        <option value="Clients" {{ $permission->group_name == 'Clients' ? 'selected' : ''}}>Clients</option>
                                        <option value="Assessments" {{ $permission->group_name == 'Assessments' ? 'selected' : ''}}>Assessments</option>
                                        <option value="Inventory" {{ $permission->group_name == 'Inventory' ? 'selected' : ''}}>Inventory</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Permission Name'
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    
@endsection
