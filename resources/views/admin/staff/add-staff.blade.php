@extends('admin.admin-layout')
@section('admin')
<style>
    .img-small {
        max-width:100%;
        height: auto;
        max-height: 350px;
    }
</style>

</style>
<div class="page-content">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
       
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><b>Staff</b></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Staff</li>
                </ol>
            </nav>
        </div>
    </div>
    <hr>

    
      <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-2">
                        <button class="btn btn-sm" onclick="goToClientDirectory()" style="background: none; border: none;">
                        <i class="fas fa-arrow-left fa-xxs"></i></i>
                        </button>
                    </div>
                    <div class="col-8 text-center">
                        <h5 class="text-uppercase"><strong>Add New Staff</strong></h5>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            
            
            <hr>


            <div class="row">
                <div class="col-6 d-flex justify-content-center">
                    <img src="https://icon-library.com/images/staff-icon-png/staff-icon-png-2.jpg" alt="Staff Image" class="img-fluid img-small">
                </div>

                <!-- Form inputs column -->
                <div class="col-6">
                    <form id="myForm" method="POST" action="{{ route('store.staff') }}" class="forms-sample">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Staff Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Staff Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Staff Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Staff Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Staff Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-secondary btn-sm float-end">
                            <i class='bx bx-save'></i> Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                 email: {
                    required : true,
                },
                 phone: {
                    required : true,
                },
                 password: {
                    required : true,
                },

                
            },
            messages :{
                name: {
                    required : 'Please Enter Name',
                }, 
                 email: {
                    required : 'Please Enter Email',
                }, 
                 phone: {
                    required : 'Please Enter Phone',
                }, 
                 password: {
                    required : 'Please Enter Password',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

<script type="text/javascript">
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                // console.log(data.success)
  
                  // Start Message 
  
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success', 
                    showConfirmButton: false,
                    timer: 3000 
              })
              if ($.isEmptyObject(data.error)) {
                      
                      Toast.fire({
                      type: 'success',
                      title: data.success, 
                      })
  
              }else{
                 
             Toast.fire({
                      type: 'error',
                      title: data.error, 
                      })
                  }
  
                // End Message   
  
  
              }
          });
      })
    })
  </script>

<script>
    function goToClientDirectory() {
        window.location.href = "{{ url('/all/staff') }}";
    }
</script>

@endsection