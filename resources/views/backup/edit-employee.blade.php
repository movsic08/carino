<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
  	<base href="/public">
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />

	<!--favicon-->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">
	<title>FCRMSys | Admin Dashboard</title>

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
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Employee</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Employee Profile</li>
					</ol>
					</nav>
				</div>
				</div>
				<h6 class="mb-0 text-uppercase">Edit Employee Information</h6>
				<hr/>
				<div class="card">
				<div class="card-body p-4">
					<div class="card-body">
					@if(session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
					@endif
					<form method="POST" action="{{ route('update_employee_profile', ['id' => $employee->id]) }}" enctype="multipart/form-data" class="row g-3">
						@csrf
						@method('PUT')
						<div class="col-md-12">
						<label for="input25" class="form-label">First Name</label>
						<div class="input-group">
							<span class="input-group-text"><i class='bx bx-user'></i></span>
							<input type="text" id="input25" name="firstname" class="form-control" value="{{ $employee->firstname }}" required>
						</div>
						</div>
						<div class="col-md-12">
						<label for="input25" class="form-label">Middle Name</label>
						<div class="input-group">
							<span class="input-group-text"><i class='bx bx-user'></i></span>
							<input type="text" id="input25" name="middlename" class="form-control" value="{{ $employee->middlename }}">
						</div>
						</div>
						<div class="col-md-12">
						<label for="input26" class="form-label">Last Name</label>
						<div class="input-group">
							<span class="input-group-text"><i class='bx bx-user'></i></span>
							<input type="text" id="input26" name="lastname" class="form-control" value="{{ $employee->lastname }}" required>
						</div>
						</div>
						<div class="col-md-12">
						<label for="input28" class="form-label">Phone Number</label>
						<div class="input-group">
							<span class="input-group-text"><i class='bx bx-phone'></i></span>
							<input type="text" id="input28" name="number" class="form-control" value="{{ $employee->phone }}" required>
						</div>
						</div>
						<div class="col-md-12">
						<label for="input27" class="form-label">Email Address</label>
						<div class="input-group">
							<span class="input-group-text"><i class='bx bx-envelope'></i></span>
							<input type="email" id="input27" name="email" class="form-control" value="{{ $employee->email }}" required>
						</div>
						</div>
						<div class="col-md-12">
						<label for="input27" class="form-label">Position</label>
						<div class="input-group">
							<span class="input-group-text"><i class='bx bx-briefcase'></i></span>
							<input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
						</div>
						</div>
						<!-- You can add password fields here if you want to allow updating passwords -->
						<div class="mb-3">
						<label for="formFile" class="form-label">Upload Image</label>
						<div class="input-group">
							<input type="file" class="form-control" id="formFile" name="file" accept="image/*">
						</div>
						</div>

						<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							<button type="submit" class="btn btn-primary">Update Employee</button>
							<button type="button" class="btn btn-light px-4">Reset</button>
						</div>
						</div>
					</form>
					</div>
				</div>
				</div>
			</div>
		</div>

		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->



	<!--start switcher-->
	<!--end switcher-->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/input-tags/js/tagsinput.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- highcharts js -->
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>


	
</body>

</html>