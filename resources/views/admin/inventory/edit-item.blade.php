@extends('admin.admin-layout')
@section('admin')
<style>
  #imagePreview {
    padding: 10px;
    height: 300px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    overflow: hidden;
  }

  #imagePreview img {
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin: 0 auto;
  }
</style>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3"><b>Inventory</b></div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Inventory Item</li>
      </ol>
    </nav>
  </div>
</div>
<hr>
<!--end breadcrumb-->

<div class="card">
    <div class="card-body">
      <div class="row">
  
        <!-- Left Column for Details -->
        <div class="col-md-6">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
  
          <form action="{{ route('admin.inventory.update', $inventoryItem->id) }}" method="post" enctype="multipart/form-data">
              @csrf
            @method('PUT')
  
            <div class="form-group mb-1">
              <label for="item_code">Item Code:</label>
              <input type="text" name="item_code" class="form-control" id="item_code" value="{{ $inventoryItem->item_code }}" required>
            </div>
  
            <div class="form-group mb-1">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $inventoryItem->name }}" required>
              </div>
    
              <div class="form-group mb-1">
                <label for="stocks">Stocks:</label>
                <input type="number" name="stocks" class="form-control" id="stocks" value="{{ $inventoryItem->stocks }}" required>
              </div>
    
              <div class="form-group mb-1">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description" rows="5" required>{{ $inventoryItem->description }}</textarea>
              </div>
    
              <div class="form-group mb-1">
                <label for="availability">Availability:</label>
                <select name="availability" class="form-control" id="availability" required>
                  <option value="1" {{ $inventoryItem->availability == 1 ? 'selected' : '' }}>Available</option>
                  <option value="0" {{ $inventoryItem->availability == 0 ? 'selected' : '' }}>Not Available</option>
                </select>
              </div>
          </div>
  
        <!-- Right Column for Image Selection and Preview -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="item_photo">Item Photo:</label>
            <input type="file" name="item_photo" class="form-control-file mb-3" id="item_photo" onchange="previewImage()">
          </div>
  
          <!-- Image Preview Placeholder -->
          <div id="imagePreview">
            <img src="{{ asset('upload/inventory_photos/' . $inventoryItem->item_photo) }}" alt="{{ $inventoryItem->name }}" class="img-thumbnail">
        </div>
          
  
          <hr class="mt-3 mb-3">
  
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa-regular fa-floppy-disk fa-2xs"></i> Update Item</button>
          </div>
  
        </div>
      </form>
      </div>
    </div>
  </div>
  
  

<script>
  function previewImage() {
    var preview = document.getElementById("imagePreview");
    var fileInput = document.getElementById("item_photo");
    var files = fileInput.files;

    // Check if files are selected
    if (files.length > 0) {
      var reader = new FileReader();

      // Set up the reader to read the image file as a data URL
      reader.onload = function (e) {
        // Create an image element
        var img = document.createElement("img");

        // Set the source of the image to the data URL
        img.src = e.target.result;

        // Set the alt attribute of the image to the file name
        img.alt = files[0].name;

        // Append the image to the preview div
        preview.innerHTML = "";
        preview.appendChild(img);
      };

      // Read the image file as a data URL
      reader.readAsDataURL(files[0]);
    } else {
      // If no file is selected, clear the preview
      preview.innerHTML = "";
    }
  }
</script>
@endsection
