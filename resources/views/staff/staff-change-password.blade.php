@extends('staff.staff-layout')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        #showImage {
        width: 150px;
        height: 150px; 
        border-radius: 50%;
        margin-bottom: 15px;
    }  
    </style>
</head>
@section('staff')

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Staff Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Staff Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <hr>
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-5 col-xl-5 left-wrapper">
                <div class="card rounded border">
                    <div class="card-body text-center">
                        <img class="wd-150 rounded-circle mb-3" id="showImage"
                            src="{{ (!empty($profileData->photo)) ? url('upload/staff_images/'.$profileData->photo) : url('upload/no_image.jpg') }}"
                            alt="profile">
                        <h4 class="mb-0">{{$profileData->name}}</h4>
                        <p class="text-muted mt-1">{{$profileData->email}}</p>
                        <hr>
                        <h6 class="card-title mb-0">About</h6>
                        <div class="mt-2">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Username</label>
                            <p class="text-muted">{{$profileData->username}}</p>
                        </div>
                        <div class="mt-2">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone</label>
                            <p class="text-muted">{{$profileData->phone}}</p>
                        </div>
                        <div class="mt-2">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address</label>
                            <p class="text-muted">{{$profileData->address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-7 col-xl-7 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <h5 class="card-title">Staff Change Password</h5>
                                <hr>
                                <form method="POST" action="{{ route('staff.update.password') }}">    
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="old_password" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" autocomplete="off">
                                            @error('old_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>                                                                            
                                    </div>
                                    
                                
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror"
                                                placeholder="New Password" autocomplete="off">
                                            @error('new_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                                placeholder="Confirm Password" autocomplete="off">
                                            @error('new_password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <hr>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-secondary" onclick="return confirm('Are you sure you want to cancel?')">Cancel</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <!-- right wrapper end -->
        </div>

        <!--footer-->
        @include('staff.body.footer')
        <!--end footer-->
        

        <script>
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                });
            });
        </script>
@endsection