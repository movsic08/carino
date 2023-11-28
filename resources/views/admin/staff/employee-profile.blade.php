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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

						
                            <div class="card">
                                <div class="card-header">Employee Profile</div>

                                <div class="card-body">
                                    @if(session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class="row">
                                        <!-- Profile Image (on the left) -->
                                        <div class="col-md-4">
                                            @if ($employee->image)
                                                <img src="{{ asset('employeeprofile/' . $employee->image) }}" alt="Employee Image" class="img-fluid">
                                            @else
                                                <p>No image available</p>
                                            @endif
                                        </div>

                                        <!-- Employee Information (on the right) -->
                                        <div class="col-md-8">
                                            <h4>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }}</h4>
                                            <p><strong>Phone Number:</strong> {{ $employee->phone }}</p>
                                            <p><strong>Email:</strong> {{ $employee->email }}</p>
                                            <p><strong>Position:</strong> {{ $employee->position }}</p>
                                            <!-- You can display additional medical-related fields here -->
                                        </div>
                                    </div>

                                    <!-- Add a back button or link to return to the employee list or previous page -->
                                    <a href="{{ url('admin/staff-directory') }}" class="btn btn-primary mt-3">Back to Employee List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	<!--end wrapper-->



	<!--start switcher-->
	<!--end switcher-->
	<!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
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