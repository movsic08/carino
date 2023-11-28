<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>FCRMSys | Admin Dashboard</title>
	
	<!--favicon-->
	<link rel="icon" href="assets/img/logo-2.png" type="image/png">	
	<base href="/public">
	<!--plugins-->
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />

<!-- loader-->
<link href="assets/css/pace.min.css" rel="stylesheet" />
<script src="assets/js/pace.min.js"></script>

<!-- Bootstrap CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-extended.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link href="assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet" />
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />

<!-- Custom Styles -->
<link href="assets/css/app.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/dark-theme.css" />
<link rel="stylesheet" href="assets/css/semi-dark.css" />
<link rel="stylesheet" href="assets/css/header-colors.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/custom.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code/code.js') }}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>



	<style>
		#client-analytics-chart {
			min-height: 325px;
		}
        .dropdown-item:active {
            background-color: #1F4172; 
            transform: translateY(4px); 
        }
	</style>


</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.assets.sidebar')
		<!--end sidebar wrapper -->

		<!--start topbar -->
		@include('admin.assets.topbar')
		<!--end topbar -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

                @yield('admin')


			</div>
		</div>
		<!--end page wrapper -->

        <!--start footer -->
		
		<!--end footer -->
		
	</div>
	<!--end wrapper-->

	<!-- search modal -->
   
    <!-- end search modal -->

	<!--start switcher-->
	<!--end switcher-->
	
	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!-- Plugins -->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<!-- Vector map JavaScript -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

	<!-- jQuery DataTables and DataTables Bootstrap 5 JavaScript -->
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

	<!-- Highcharts and Apexcharts -->
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>

	<script src="assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

	<!-- App JS -->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/loading.js"></script>
	<script src="assets/js/datas.js"></script>

	<!-- Input Tags -->
	<script src="{{ asset('backend/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>

	 <!-- tinymce -->
	 <script src="{{ asset('backend/assets/vendors/tinymce/tinymce.min.js') }}"></script>
     <script src="{{ asset('backend/assets/js/tinymce.js') }}"></script>
	<!-- tinymce -->

	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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

	<!-- Add this script to your HTML -->
	<script>
		function toggleDarkMode() {
			// Toggle the 'dark-mode' class on the body
			document.body.classList.toggle('dark-mode');
	
			// Store the dark mode preference in localStorage
			var darkModeEnabled = document.body.classList.contains('dark-mode');
			localStorage.setItem('darkModeEnabled', darkModeEnabled);
		}
	
		function checkDarkModePreference() {
			var darkModeEnabled = localStorage.getItem('darkModeEnabled') === 'true';
	
			// Apply dark mode based on the user's preference
			if (darkModeEnabled) {
				document.body.classList.add('dark-mode');
			} else {
				document.body.classList.remove('dark-mode');
			}
		}
	
		// Add a click event listener to the dark mode switch using its ID
		var darkModeSwitch = document.getElementById('darkModeToggle');
		darkModeSwitch.addEventListener('click', toggleDarkMode);
	
		// Call the checkDarkModePreference function when the page loads
		document.addEventListener('DOMContentLoaded', checkDarkModePreference);
	</script>


</body>


</html>