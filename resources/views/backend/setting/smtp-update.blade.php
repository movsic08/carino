@extends('admin.admin-layout')
@section('admin')
<style>
     /* Adjust text size */
     .smtp-description {
       font-size: 10px;
     }
   </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
     <div class="breadcrumb-title pe-3"><b>Settings</b></div>
     <div class="ps-3">
       <nav aria-label="Breadcrumb Navigation">
         <ol class="breadcrumb mb-0 p-0">
           <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Home</a></li>
           <li class="breadcrumb-item active" aria-current="page">SMTP Update</li>
         </ol>
       </nav>
     </div>
   </div>
   <hr>


             <div class="card">
              <div class="card-body">

			<h6 class="card-title mb-3">Update Smtp Setting   </h6>
                    <form id="myForm" method="POST" action="{{ route('update.smpt.setting') }}" class="forms-sample">
				@csrf
                    <input type="hidden" name="id" value="{{ $setting->id }}">

                    <div class="row">
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Mailer</label>
                                 <input type="text" name="mailer" class="form-control" value="{{ $setting->mailer }}">
                             </div>
                         </div>
                     
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Host</label>
                                 <input type="text" name="host" class="form-control" value="{{ $setting->host }}">
                             </div>
                         </div>
                     </div>
                     
                     <div class="row">
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Post</label>
                                 <input type="text" name="post" class="form-control" value="{{ $setting->post }}">
                             </div>
                         </div>
                     
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Username</label>
                                 <input type="text" name="username" class="form-control" value="{{ $setting->username }}">
                             </div>
                         </div>
                     </div>
                     
                     <div class="row">
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Password</label>
                                 <input type="text" name="password" class="form-control" value="{{ $setting->password }}">
                             </div>
                         </div>
                     
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Encryption</label>
                                 <input type="text" name="encryption" class="form-control" value="{{ $setting->encryption }}">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                             <div class="form-group mb-3">
                                 <label for="exampleInputEmail1" class="form-label">From Address</label>
                                 <input type="text" name="from_address" class="form-control" value="{{ $setting->from_address }}">
                             </div>
                         </div>
                     </div>
                     

		<hr>	 
				 
          <div class="container mt-3 mx-auto">
               <div class="row">
                 <!-- Left part of the page -->
                 <div class="col-md-6">
                   <span class="smtp-description">
                     Configure your SMTP settings to enable email functionality. Enter the required information in the form fields.
                   </span>
                 </div>
             
                 <!-- Right part of the page -->
                 <div class="col-md-6">
                   <div class="col-12 text-end">
                     <button type="submit" class="btn btn-sm btn-primary me-2">
                       <i class='bx bx-save'></i> Save Changes
                     </button>
                   </div>
                 </div>
               </div>
             </div>
           
			</form>

              </div>
            </div>



 

@endsection