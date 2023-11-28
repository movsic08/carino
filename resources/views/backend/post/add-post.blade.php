@extends('admin.admin-layout')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3"><b>Blog</b></div>
  <div class="ps-3">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Blog Post</li>
          </ol>
      </nav>
  </div>

 
  
</div>

  <hr>
  <!--end breadcrumb-->



  

       
<div class="row profile-body">
  
  <!-- left wrapper start -->
  
  <!-- left wrapper end -->
  <!-- middle wrapper start -->
  <div class="col-md-12 col-xl-12 middle-wrapper">
    <div class="row">
     <div class="card">
      <div class="card-body">

<h6 class="card-title">Add Post   </h6>

<form method="POST" action="{{ route('store.post') }}" class="forms-sample" enctype="multipart/form-data">
@csrf


<div class="row">
<div class="col-sm-6">
    <div class="form-group mb-3">
        <label class="form-label">Post Title   </label>
        <input type="text" name="post_title" class="form-control"  >
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group mb-3">
        <label class="form-label">Blog Category </label>
       <select name="blogcat_id" class="form-select" id="exampleFormControlSelect1">
        <option selected="" disabled="">Select Category</option>
        @foreach($blogcat as $cat)
        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option> 
        @endforeach
    </select>
    </div>
</div><!-- Col -->
</div>



<div class="col-sm-12">
    <div class="mb-3">
        <label class="form-label">Short Description</label>
  <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
         
    </div>
</div><!-- Col -->



<div class="col-sm-12">
    <div class="mb-3">
        <label class="form-label">Long Description</label>

        <textarea name="long_descp" class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
         
    </div>
</div><!-- Col -->

<div class="col-sm-6">
    <div class="form-group mb-3">
        <label class="form-label">Post Tags   </label>
<input name="post_tags" id="tags" value="Family Planning" />
    </div>
</div><!-- Col -->



 <div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Select Picture </label>
<input class="form-control"  name="post_image" type="file" id="image">
</div>

<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Image Preview</label>
  <div class="image-container border p-3 text-center">
    <img id="showImage" class="wd-80" src="{{ url('upload/no_image.jpg') }}" alt="profile" style="height: 200px; object-fit: contain;">
    <!-- Set a fixed height (e.g., height: 200px) and use object-fit: contain; to maintain the aspect ratio and fit the container -->
  </div>
</div>


 <hr>
 <button type="submit" class="btn btn-secondary btn-sm float-end">
  <i class='bx bx-save'></i> Save Changes
</button>




</form>

      </div>
    </div>




    </div>
  </div>
  <!-- middle wrapper end -->
  <!-- right wrapper start -->
 
  <!-- right wrapper end -->
</div>


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