@extends('admin.admin-layout')
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
@section('admin')

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Admin Profile</li>
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
                            src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}"
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
                                <h5 class="card-title">Update Admin Profile</h5>
                                <hr>
                                <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label float-start">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$profileData->name}}" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputUsername1" class="form-label float-start">Username</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}" placeholder="Username">
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label float-start">Email address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$profileData->email}}" placeholder="Email">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputPhone" class="form-label float-start">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="exampleInputPhone" value="{{$profileData->phone}}" placeholder="Phone">
                                        </div>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="exampleInputAddress" class="form-label float-start">Address</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputAddress" value="{{$profileData->address}}" placeholder="Address">
                                    </div>
                                
                                    <div class="mb-3">
                                        <label class="form-label float-start" for="formFile">Photo</label>
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>
                                
                                    <hr>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
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
        @include('admin.assets.footer')
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
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>
@endsection