<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <base href="/public">

    <!--favicon-->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">
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
    <link rel="stylesheet" href="assets/css/custom/med-profile.css" />

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
                                <li class="breadcrumb-item active" aria-current="page">Client Medical Information</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a class="btn btn-sm add-assessment-btn" href="{{ route('staff-add-assessment-record', ['id' => $client->id]) }}">
                                <i class="fa-solid fa-file-prescription" style="font-size: 0.8em;"></i> Add New Assessment
                            </a>
                        </div>
                    </div>
                </div>
                 <hr>
                <!--end breadcrumb-->
               
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="assets/icons/client-2.jpeg" alt="Admin" class="rounded-circle p-1 white" width="110">
                                            <div class="mt-3">
                                                <h5>{{ $client->first_name . ' ' . $client->last_name }}</h5>

                                               
                                                <p class="text-secondary mb-3">
                                                   <strong>Client ID: </strong>{{ $client->client_idnumber }}
                                                </p>
                                                
                                                <a href="{{ route('staff.view.client.personal', ['id' => $client->id]) }}" class="btn btn-outline-secondary btn-sm" id="viewProfileBtn">
                                                    <i class="fa-solid fa-user fa-2xs"></i> View Profile
                                                </a>
                                                
                                                
                                                <a href="#" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fa-solid fa-address-card fs-2xs"></i> Registration
                                                </a>
                                                                                  
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
                                                
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Mobile:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->contact_number }}</p>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Age:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->age }}</p>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row">
                                                        <div class="col-5 text-left">
                                                            <p class="text-muted mb-2 font-13"><strong>Date of Birth:</strong></p>
                                                        </div>
                                                        <div class="col-7 text-left">
                                                            <p class="text-muted mb-2 font-13">{{ $client->date_of_birth }}</p>
                                                        </div>
                                                    </div>
                                                
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
												<div class="container text-center">
                                                    <div class="form-group">
                                                        <p class="font-weight-bold text-uppercase">Registration Information</p>
                                                
                                                        <div class="col-12">
                                                            <label for="actual_date_joined_display" class="text-muted mb-2 font-13"><strong>Actual Date Joined:</strong></label>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-8">
                                                                @if ($client->actual_date_joined)
                                                                    <span id="actual_date_joined_display" class="form-control form-control-sm small">{{ $client->actual_date_joined }}</span>
                                                                @else
                                                                    <span id="actual_date_joined_display" class="form-control form-control-sm small text-muted">Enter Date</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-outline-secondary btn-sm form-control small" type="button" id="editButton" data-bs-toggle="modal" data-bs-target="#editDateModal">Edit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                  
                                                
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="medical-info-tab" data-toggle="tab" href="#medical-info" role="tab" aria-controls="medical-info" aria-selected="true">
                                                    <i class="fa-solid fa-receipt"></i> Health Evaluation
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a class="nav-link" id="assessment-tab" data-toggle="tab" href="#assessment" role="tab" aria-controls="assessment" aria-selected="false">
                                                <i class="fa-solid fa-book-medical"></i> Assessment Record</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent" style="height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                            <div class="tab-pane fade show active" id="medical-info" role="tabpanel" aria-labelledby="medical-info-tab">
                                               <!-- resources/views/admin/clients/medrecord/medical-info.blade.php -->
                                               @if($client->medicalRecord)
                                               <!-- Display health evaluation information for the client -->
                                                @include('staff.clients.medrecord.med-info')
                                                @else
                                                    <!-- Display a message and a button to add medical information -->
                                                    <div class="text-center info-box">
                                                        <p style="font-size: 24px; opacity: 0.7;">No Medical Information</p>
                                                        <i class="fa-solid fa-file-circle-exclamation fa-fade" style="font-size: 60px;"></i>
                                                        <div>
                                                            <a href="{{ route('add-medical-record', ['id' => $client->id]) }}" class="btn btn-outline-secondary custom-small-btn mt-5">
                                                                <i class="fas fa-file-circle-plus small-icon" style="font-size: 0.7em;"></i> Add Medical Information
                                                            </a>                                                        
                                                        </div>
                                                    </div>
                                                @endif
                                           
                                            </div>
                                            <div class="tab-pane fade" id="assessment" role="tabpanel" aria-labelledby="assessment-tab">
                                                @if ($client->assessmentRecords && $client->assessmentRecords->isNotEmpty())
                                                    @include('staff.clients.medrecord.latest')
                                                @else
                                                    <div class="text-center info-box">
                                                        <p style="font-size: 24px; opacity: 0.7;">No Assessment Records</p>
                                                        <i class="fa-solid fa-file-circle-exclamation fa-fade" style="font-size: 60px;"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card mx-auto">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Client Assessment History</h5>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover table-bordered table-striped text-center mt-1" id="assessmentTable">
                                                <thead class="thead-dark" style="background-color: #072541; color: #ffffff;">
                                                    <tr>
                                                        <th>Date of Visit</th>
                                                        <th>Activity Type</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>                                                
                                                <tbody>
                                                    @if ($client->assessmentRecords && $client->assessmentRecords->isNotEmpty())
                                                        @foreach ($client->assessmentRecords->sortByDesc('date_of_visit')->take(4) as $assessment)
                                                            <tr>
                                                                <td>{{ $assessment->date_of_visit }}</td>
                                                                <td>
                                                                    @if ($assessment->id)
                                                                        Assessment
                                                                    @else
                                                                        Unknown Activity Type
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($assessment->id)
                                                                        @if ($assessment->medical_findings)
                                                                            Client to undergo assessment
                                                                        @else
                                                                            Details not available
                                                                        @endif
                                                                    @else
                                                                        Details not available
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="3" class="text-center">No Assessment Records Available</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
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
        <!-- Modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="editDateModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content bg-primary">
                    <form action="{{ route('update-client-profile', ['id' => $client->id]) }}" method="post">
                        @csrf
                        @method('PUT')
        
                        <div class="modal-header">
                            <h6 class="modal-title text-white">Client Information</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
        
                        <div class="modal-body text-white">
                            <div class="form-group">
                                <label for="editDate" class="form-label">Edit Joining Date:</label>
                                <input type="date" class="form-control" id="editDate" name="actual_date_joined" value="{{ $client->actual_date_joined }}">
                            </div>
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        
        

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
