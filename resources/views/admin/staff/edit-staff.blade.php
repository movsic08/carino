@extends('admin.admin-layout')
@section('admin')

<div class="page-content">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

       
        <div class="row profile-body">
          <!-- left wrapper start -->
          
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">

			<h6 class="card-title">Edit Staff   </h6>

  <form id="myForm" method="POST" action="{{ route('update.staff') }}" class="forms-sample">
				@csrf
 
    <input type="hidden" name="id" value="{{ $allstaff->id }}">

				<div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Staff Name   </label>
	 <input type="text" name="name" class="form-control" value="{{ $allstaff->name }}" > 
				</div>

                <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Staff Email   </label>
     <input type="email" name="email" class="form-control"  value="{{ $allstaff->email }}" > 
                </div>


                <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Staff Phone   </label>
     <input type="text" name="phone" class="form-control"  value="{{ $allstaff->phone }}"  > 
                </div>



                <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Staff Address   </label>
     <input type="text" name="address" class="form-control"  value="{{ $allstaff->address }}" > 
                </div>

  
			 
				 
	 <button type="submit" class="btn btn-primary me-2">Save Changes </button>
			 
			</form>

              </div>
            </div>




            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
         
          <!-- right wrapper end -->
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

@endsection