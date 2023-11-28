@extends('frontend.frontend-dashboard')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    



  @php

            $id = Auth::user()->id;
            $userData = App\Models\User::find($id);

        @endphp




        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
            <div class="blog-sidebar">
              <div class="sidebar-widget post-widget">
                    <div class="widget-title">
                        <h4>User Profile </h4>
                    </div>
                    <div class="post-inner">
                        <div class="post">
                            <figure class="post-thumb"><a href="blog-details.html">
        <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt=""></a></figure>
        <h5><a href="blog-details.html">{{ $userData->name }} </a></h5>
         <p>{{ $userData->email }} </p>
                        </div> 
                    </div>
                </div> 
       
        <div class="sidebar-widget category-widget">
            <div class="widget-title">
               
            </div>
             

     @include('frontend.dashboard.dashboard-sidebar')


          </div> 
                         
                        </div>
                    </div>




  <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    
                                    <div class="lower-content">
                                        
                                         
                                      
          
 <form action="{{ route('user.profile.store') }}" method="post" class="default-form" enctype="multipart/form-data">
 	@csrf

 	  <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ $userData->username }}" >
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $userData->name }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $userData->email }}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $userData->phone }}">
        </div>

         <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="{{ $userData->address }}">
        </div>


  <div class="form-group">
            <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" name="photo" type="file" id="image">
        </div>

          <div class="form-group">
            <label for="formFile" class="form-label"> </label>
 <img id="showImage"  src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px;"></a>
        </div>


        <div class="form-group message-btn">
            <button type="submit" class="theme-btn btn-one">Save Changes </button>
        </div>
    </form>

 

                                    </div>
                                </div>
                            </div>
                             
                            
                        </div>

 
                    </div> 


                </div>
            </div>
        </section>
        <!-- sidebar-page-container -->

        <



<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});


</script>



        @endsection