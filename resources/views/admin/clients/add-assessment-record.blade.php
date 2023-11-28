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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link rel="stylesheet" href="assets/css/form.css" />

	<!--favicon-->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">
	<title>FCRMSys | Admin Dashboard</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <style type="text/css">
        .ck-editor__editable_inline
        {
            height: 300px;
        }
        .form-control[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }     
    </style>



</head>

<body>
	    <!--wrapper-->
        <div class="wrapper">
        <!-- Sidebar wrapper -->
        @include('admin.assets.sidebar')
        <!-- End sidebar wrapper -->

        <!-- Topbar -->
        @include('admin.assets.topbar')
        <!-- End topbar -->

        <!-- Page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Client Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Assessment Record</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <hr>

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-2">
                                    <button class="btn btn-sm" onclick="redirectToAssessmentDirectory()" style="background: none; border: none;">
                                    <i class="fas fa-arrow-left fa-2xs"></i></i>
                                    </button>
                                </div>
                                <div class="col-8 text-center">
                                    <h5 class="text-uppercase"><strong>Family Planning Client Assessment Record</strong></h5>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>

                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="card-text">
                                    <p><strong>Instructions for Physicians, nurses and Midwives:</strong> <em>Make sure that the client is not pregnant by using the questions listed. Refer accordingly for any abnormal history/findings for further medical evaluation.</em></p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <form action="{{ route('store-assessment-record', ['id' => $client->id]) }}" method="post">
                            @csrf

                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="assessment_client_name">Client Name</label>
                                                <input type="text" class="form-control" id="assessment_client_name" name="assessment_client_name" value="{{ $client->first_name . ' ' . ($client->middle_name ? $client->middle_name . ' ' : '') . $client->last_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="date_of_visit">Date of Visit</label>
                                                <input type="text" class="form-control" id="date_of_visit" name="date_of_visit" value="{{ now()->toDateString() }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                           <label for="medical_findings" class="col-form-label">Medical Findings</label>
                                            <p class="form-text text-muted">
                                                Instructions: Enter the medical findings including medical observations, complaints/complications, services rendered/procedures, laboratory examinations, treatments, and referrals.
                                            </p>
                                            <textarea class="form-control mt-3" id="medical_findings" name="medical_findings" rows="6" placeholder="Enter medical findings..."></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="row mb-3 mt-3">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label" for="method_accepted">Method Accepted</label>
                                                <input type="text" class="form-control" id="method_accepted" name="method_accepted" value="{{ $client->method_accepted ?? '' }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4" id="service_provider_section">
                                            <label class="form-label" for="service_provider_name">Name of the Service Provider:</label>
                                            <select class="form-select" id="service_provider_name" name="service_provider_name">
                                                <option value="" selected disabled>Select Service Provider</option>
                                                @foreach(\App\Models\User::where('role', 'staff')->get() as $user)
                                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-3" id="contraceptives_section">
                                            <label class="form-label" for="contraceptive_item">Select Contraceptive Item:</label>
                                            <select class="form-select" id="contraceptive_item" name="contraceptive_item">
                                                <option value="" selected disabled>Select Contraceptive Item</option>
                                                @foreach(\App\Models\Inventory::where('availability', true)->get() as $inventoryItem)
                                                    <option value="{{ $inventoryItem->id }}">
                                                        {{ $inventoryItem->name }} (Available: {{ $inventoryItem->stocks }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-2" id="quantity_section">
                                            <label class="form-label" for="quantity_used">Quantity Used:</label>
                                            <input type="number" class="form-control" id="quantity_used" name="quantity_used" min="1" value="1">
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="follow_up_visit_date">Date of Follow-Up Visit</label>
                                                <input type="date" class="form-control" id="follow_up_visit_date" name="follow_up_visit_date">
                                            </div>
                                        </div>

                                        <!-- Display Today's Date -->
                                        <div class="col-6">
                                            <div class="form-group mb-3 text-center border rounded p-3 d-flex align-items-center justify-content-center">
                                                <p class="medium">
                                                    <label class="form-label">Today's Date: </label><br>
                                                    @php
                                                        $today = \Carbon\Carbon::now();
                                                    @endphp
                                                    <strong>{{ $today->format('F d, Y') }} ({{ $today->format('l') }})</strong>
                                                    <br>
                                                    <small>{{ $today->format('h:i A') }}</small>
                                                </p>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. All rights reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (load it ) -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Other plugins -->
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<!-- Vector map JavaScript -->
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Highcharts and ApexCharts -->
<script src="assets/plugins/highcharts/js/highcharts.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

<!-- Custom scripts -->
<script src="assets/js/index2.js"></script>
<script src="assets/js/app.js"></script>

<!-- Multi-tab form script -->
<script src="assets/js/multi-tab-form.js"></script>

<!-- Form interactions script -->
<script src="assets/js/form-interactions.js"></script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/43.0.1/classic/ckeditor.js"></script>
<script src="/public/ckeditor/ckeditor.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    ClassicEditor.create(document.querySelector('#medical_findings')).catch(error => {
        console.error(error);
    });
 
    function redirectToAssessmentDirectory() {
        window.location.href = 'admin/assessment-directory';
    }
 </script>

    
</body>

</html>