@extends('admin.admin-layout')
<style>
    .form-check{
        text-transform: capitalize;
    }
</style>

@section('admin')
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Roles in Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Roles Permission</li>
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
                        <h5 class="text-uppercase"><strong>Add Role Permission</strong></h5>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

            <hr>

            <form action="{{ route('role.permission.store') }}" method="post">
                @csrf
            
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="role_id">Roles Name</label>
                                    <select class="form-select mb-2" id="role_id" name="role_id">
                                        <option value="" selected disabled>Select Group</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultmain" name="checkDefaultmain">
                                    <label class="form-check-label" for="checkDefaultmain">
                                        Permission All
                                    </label>
                                </div>
                                
            
                                <hr>
            
                                @foreach($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="checkDefaults">
                                            <label class="form-check-label" for="checkDefaults">
                                                {{ $group->group_name }}
                                            </label>
                                        </div>
                                    </div>
                            
                                    <div class="col-9">
                                        @php 
                                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp
                            
                                        @foreach($permissions as $permission)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}">
                                                <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            
                            </div>
                        </div>
            
                        <hr>
            
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
            

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    

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
                        required: 'Please Enter Roles Name'
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#checkDefaultmain').click(function(){
                if($(this).is(':checked')){
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    $('input[type=checkbox]').prop('checked', false);
                }
            });
        });
    </script>

    
@endsection
