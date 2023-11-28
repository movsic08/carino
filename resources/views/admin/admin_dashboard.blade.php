<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
    
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     
    
    <!-- Layout styles -->  
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->
    
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
</head>
<body>
    <div class="main-wrapper">
    
        <!-- partial:partials/_sidebar.html -->
        @include('admin.body.sidebar')
        <!-- partial -->
        <div class="page-wrapper text-center">
            <!-- partial:partials/_navbar.html -->
            @include('admin.body.header')
            <!-- partial -->
        
            @yield('admin')
        

            <br><br><br>
            <!-- Add a button -->
            <div>
                <a href="{{ route('admin.dashboard3') }}" class="btn btn-primary">Click me</a>
            </div>
        
        
        </div>
        
    </div>
    
    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- End plugin js for this page -->
    
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->
    
    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

<script>
    $(document).ready(function () {
      // Event listener for input changes
      $('.search-bar input[type="search"]').on('input', function () {
        var searchQuery = $(this).val();
  
        // Make an AJAX request to the Laravel route
        $.ajax({
          url: '/search',
          method: 'GET',
          data: { query: searchQuery },
          success: function (response) {
            // Handle the search results
            console.log('Search results:', response.results);
  
            // Update your modal or UI with the search results as needed
          },
          error: function (error) {
            console.error('Error:', error);
          }
        });
      });
    });
  </script>
  
    
</body>
</html>
