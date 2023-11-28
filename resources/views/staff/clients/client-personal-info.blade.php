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
    <!--favicon-->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">
    <title>FCRMSys | Admin Profile</title>
</head>
<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('staff.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start topbar -->
        @include('staff.body.topbar')
        <!--end topbar -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">
                        {{ $client->first_name . ' ' . ($client->middle_name ? $client->middle_name . ' ' : '') . $client->last_name }}
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Information</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-file-medical"></i> Add New Record
                        </button>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                            <a class="dropdown-item" href="{{ route('add-medical-record', ['id' => $client->id]) }}">
                                <i class="fa-solid fa-file-waveform"></i> Add Medical Information
                            </a>
                            <a class="dropdown-item" href="{{ route('add-assessment-record-form', ['id' => $client->id]) }}">
                                <i class="fa-solid fa-file-prescription"></i> Add Assessment Record
                            </a>
                        </div>
                    </div>
                </div>

                </div>
                <!--end breadcrumb-->
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="assets/icons/client-2.jpeg" alt="Admin" class="rounded-circle p-1 white" width="110">
                                            <div class="mt-3">
                                                <h5>{{ $client->first_name . ' ' . ($client->middle_name ? $client->middle_name . ' ' : '') . $client->last_name }}</h5>
                                               
                                                <p class="text-secondary mb-1">
                                                   <strong>Client ID: </strong>{{ $client->client_idnumber }}
                                                </p>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Full Name:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->first_name . ' ' . ($client->middle_name ? $client->middle_name . ' ' : '') . $client->last_name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
													<div class="row">
														<div class="col-5 text-left">
															<p class="text-muted mb-2 font-13"><strong>Address:</strong></p>
														</div>
														<div class="col-7 text-left">
															<p class="text-muted mb-2 font-13">
																{{ implode(', ', array_filter([$client->street_number, $client->street_name, $client->barangay, $client->city_municipality, $client->province])) }}
															</p>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-5 text-left">
															<p class="text-muted mb-2 font-13"><strong>Mobile:</strong></p>
														</div>
														<div class="col-7 text-left">
															<p class="text-muted mb-2 font-13">{{ $client->contact_number }}</p>
														</div>
													</div>
												</div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Age:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->age }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Date of Birth:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->date_of_birth }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Method Accepted:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->method_accepted }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
												<p class="font-weight-bold text-uppercase mb-3">Registration Information</p>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Registered Date:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->created_at }}</p>
                                                        </div>
                                                    </div>
                                                </div>
												
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Actual Date Joined:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->actual_date_joined }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="medical-info-tab" data-toggle="tab" href="#medical-info" role="tab" aria-controls="medical-info" aria-selected="true">
                                                <i class="fa-solid fa-receipt"></i> Medical Information</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="assessment-tab" data-toggle="tab" href="#assessment" role="tab" aria-controls="assessment" aria-selected="false">
                                                <i class="fa-solid fa-book-medical"></i> Assessment Record</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="medical-info" role="tabpanel" aria-labelledby="medical-info-tab">
                                                @if($hasMedHistory)
                                                    <!-- Your code for displaying client medical history goes here -->
                                                    @include('staff.clients.medrecord.med-history-content', ['medHistory' => $medHistory])
                                                @else
                                                    <div class="text-center info-box" style="height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                                        <p style="font-size: 24px; opacity: 0.7;">No Medical History Available</p>
                                                        <i class="fa-solid fa-file-circle-exclamation fa-fade" style="font-size: 60px;"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="tab-pane fade" id="assessment" role="tabpanel" aria-labelledby="assessment-tab">
                                                @if($hasAssessmentRecords)
                                                    <!-- Your code for displaying assessment records goes here -->
                                                @else
                                                <div class="text-center info-box" style="height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                                    <p style="font-size: 24px; opacity: 0.7;">No Assessment Records</p>
                                                        <i class="fa-solid fa-file-circle-exclamation fa-fade" style="font-size: 60px;"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>

    <script>
    $(document).ready(function () {
        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

    
</body>
</html>