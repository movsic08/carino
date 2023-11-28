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

	<!--favicon-->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">
	<title>FCRMSys | Admin Dashboard</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <style type="text/css">
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
        @include('staff.body.sidebar')
        <!-- End sidebar wrapper -->

        <!-- Topbar -->
        @include('staff.body.topbar')
        <!-- End topbar -->

        <!-- Page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><b>Client Profile</b></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Client Information</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <hr/>

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
                                    <button class="btn btn-sm" onclick="goToClientDirectory()" style="background: none; border: none;">
                                    <i class="fas fa-arrow-left fa-xxs"></i></i>
                                    </button>
                                </div>
                                <div class="col-8 text-center">
                                    <h5 class="text-uppercase"><strong>Family Planning (FP) Form</strong></h5>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        
                        
                        <hr>

                        <form method="POST" action="{{ route('staff.store.client') }}" enctype="multipart/form-data" id="multi-page-form" class="row g-3">
                            @csrf

                            <!-- Client Information -->
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="mb-3" style="text-transform: uppercase;">Client Information</h6>
                                    <!-- Name of Client -->
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter last name" value="{{ old('last_name') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first_name" class="form-label">Given Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter given name" value="{{ old('first_name') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middle_name" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter middle name" value="{{ old('middle_name') }}">
                                        </div>
                                    </div>                                    

                                    <div class="form-group row mt-3">
                                        <div class="col-md-4">
                                            <label for="date_of_birth" class="form-label">Date of Birth (MM-DD-YYYY)</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD" value="{{ old('date_of_birth') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" required readonly value="{{ old('age') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="civil_status" class="form-label">Civil Status</label>
                                            <select class="form-select" id="civil_status" name="civil_status" required>
                                                <option value="">Select Civil Status</option>
                                                <option value="Single" {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                                <option value="Married" {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                                <option value="Divorced" {{ old('civil_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option value="Widowed" {{ old('civil_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                <option value="Separated" {{ old('civil_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="religion" class="form-label">Religion</label>
                                            <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter Religion" value="{{ old('religion') }}">
                                        </div>
                                    </div>                                    

                                    <div class="form-group row mt-3">
                                        <div class="col-md-2">
                                            <label for="street_number" class="form-label">No.</label>
                                            <input type="text" class="form-control" id="street_number" name="street_number" placeholder="Enter No.">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="street_name" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="street_name" name="street_name" required placeholder="Enter Street">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="barangay" class="form-label">Barangay</label>
                                            <input type="text" class="form-control" id="barangay" name="barangay" required placeholder="Enter Barangay">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="city_municipality" class="form-label">Municipality/City</label>
                                            <input type="text" class="form-control" id="city_municipality" name="city_municipality" required placeholder="Enter Municipality/City">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="province" class="form-label">Province</label>
                                            <input type="text" class="form-control" id="province" name="province" required placeholder="Enter Province">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <div class="col-md-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                                                <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="contact_number" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="educational_attainment" class="form-label">Educational Attainment</label>
                                            <input type="text" class="form-control" id="educational_attainment" name="educational_attainment" placeholder="Enter Educational Attainment">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="occupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END Client Information -->

                            <!-- Spouse Information -->
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="mb-3" style="text-transform: uppercase;">Spouse's Information</h6>
                                    <div class="form-group">
                                        <label for="spouse_last_name">Name of Spouse:</label>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="spouse_last_name" name="spouse_last_name"
                                                    placeholder="Last Name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="spouse_first_name" name="spouse_first_name"
                                                    placeholder="Given Name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="spouse_middle_name" name="spouse_middle_name"
                                                    placeholder="Middle Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-4">
                                            <label for="spouse_date_of_birth" class="form-label">Spouse's Date of Birth (YYYY-MM-DD):</label>
                                            <input type="date" class="form-control" id="spouse_date_of_birth" name="spouse_date_of_birth" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="spouse_age" class="form-label">Spouse's Age:</label>
                                            <input type="number" class="form-control" id="spouse_age" name="spouse_age" placeholder="Enter spouse's age" required readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="spouse_occupation" class="form-label">Spouse's Occupation:</label>
                                            <input type="text" class="form-control" id="spouse_occupation" name="spouse_occupation" placeholder="Enter occupation" required>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="number_of_children">No. of Living Children:</label>
                                            <input type="number" class="form-control" id="number_of_children" name="number_of_children" placeholder="Enter the number of living children" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="plan_more_children">PLAN TO HAVE MORE CHILDREN?</label>
                                            <select class="form-select" id="plan_more_children" name="plan_more_children">
                                                <option value="" disabled selected>Select Yes/No</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="average_monthly_income">AVERAGE MONTHLY INCOME:</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₱</span>
                                                <input type="number" class="form-control" id="average_monthly_income" name="average_monthly_income" value="0" min="0" step="100" required placeholder="Enter income">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Spouse Information -->

                            <!-- Client Type Information -->
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="mb-3" style="text-transform: uppercase;">Client Type Information</h6>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="type_of_client" class="mb-1">TYPE OF CLIENT</label>
                                                <input type="text" class="form-control" id="type_of_client" name="type_of_client" value="New Acceptor" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group" id="reason_for_fp_group">
                                                <label for="reason_for_fp" class="mb-1">REASON FOR FAMILY PLANNING:</label>
                                                <select class="form-select" id="reason_for_fp" name="reason_for_fp">
                                                    <option value="" disabled selected>Select Reason</option>
                                                    <option value="Spacing">Spacing</option>
                                                    <option value="Limiting">Limiting</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group" id="other_reason_group" style="display: none;">
                                                <label for="other_reason">Other Reason:</label>
                                                <input type="text" class="form-control" id="other_reason" name="other_reason">
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Method Accepted -->
                                    <div class="row mt-3">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="method_accepted" class="mb-1">Method Accepted:</label>
                                                <select class="form-select" id="method_accepted" name="method_accepted">
                                                    <option value="" selected disabled>Select Method</option>
                                                    <option value="COC">COC (Combined Oral Contraceptive)</option>
                                                    <option value="POP">POP (Progestin-Only Pill)</option>
                                                    <option value="Injectable">Injectable</option>
                                                    <option value="Implant">Implant</option>
                                                    <option value="IUD">IUD (Intrauterine Device)</option>
                                                    <option value="Condom">Condom</option>
                                                    <option value="BOM_CMM">BOM/CMM (Billings Ovulation Method/Cervical Mucus Method)</option>
                                                    <option value="BBT">BBT (Basal Body Temperature Method)</option>
                                                    <option value="STM">STM (Symptothermal Method)</option>
                                                    <option value="SDM">SDM (Standard Days Method)</option>
                                                    <option value="LAM">LAM (Lactational Amenorrhea Method)</option>
                                                    <option value="OTHER">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5" id="iud_suboptions" style="display: none;">
                                            <div class="form-group">
                                                <label for="iud_type" class="mb-1">IUD Type:</label>
                                                <select class="form-select" id="iud_type" name="iud_type">
                                                    <option value="" selected disabled>Select IUD Type</option>
                                                    <option value="Interval">Interval</option>
                                                    <option value="Post Interval">Post Interval</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5" id="other_method_input" style="display: none;">
                                            <div class="form-group">
                                                <label for="other_method_reason" class="mb-1">Specify Other Method:</label>
                                                <input type="text" class="form-control" id="other_method_reason" name="other_method_reason" placeholder="Please Specify">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- End Method Accepted -->
                            
                                </div>
                            </div>
                            <!-- END Client Type Information -->

                            <hr/>
                            <div class="row">
                                <div class="col">
                                    <div class="btn-group" role="group" aria-label="Undo Redo Clear">
                                        <button type="button" id="undo-button" class="btn btn-outline-dark btn-sm">
                                            <i class="bx bx-undo"></i> Undo
                                        </button>
                                        <button type="button" id="redo-button" class="btn btn-outline-dark btn-sm">
                                            <i class="bx bx-redo"></i> Redo
                                        </button>
                                        <button type="button" id="clear-button" class="btn btn-outline-dark btn-sm">
                                            <i class="bx bx-reset"></i> Reset
                                        </button>
                                    </div>
                                </div>
                                <div class="col" style="text-align: right;">
                                    <button type="submit" id="submit-button" class="btn btn-info px-5">
                                        <i class="bx bx-save mr-1"></i> Submit
                                    </button>
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
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer-->
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-2 py-1 border-top small text-center">
            <p class="text-muted mt-2 mb-1 mb-md-0">Copyright © 2022.</p>
            <p class="text-muted mt-2 mb-1 mb-md-0">CAPSTONE PROJECT<i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
        </footer>
        <!--end footer-->
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

    <script src="assets/js/client-form.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const methodSelect = document.getElementById("method_accepted");
        const iudSuboptions = document.getElementById("iud_suboptions");
        const otherMethodInput = document.getElementById("other_method_input");
    
        function updateSuboptions() {
            const selectedMethod = methodSelect.value;
            if (selectedMethod === "IUD") {
                iudSuboptions.style.display = "block";
                otherMethodInput.style.display = "none";
            } else if (selectedMethod === "OTHER") {
                otherMethodInput.style.display = "block";
                iudSuboptions.style.display = "none";
            } else {
                iudSuboptions.style.display = "none";
                otherMethodInput.style.display = "none";
            }
        }
        
        updateSuboptions();
    
        methodSelect.addEventListener("change", updateSuboptions);
    });
    </script>
    <script>
        function goToClientDirectory() {
            window.location.href = "{{ url('admin/client-directory') }}";
        }
    </script>


</body>

</html>