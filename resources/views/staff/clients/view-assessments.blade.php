<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/public">
  <!-- Plugins -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
  <!-- Loader -->
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

  <!-- DataTable CSS -->
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Favicon -->
  <link rel="icon" href="assets/img/logo-2.png" type="image/png">
  <title>FCRMSys | Admin Dashboard</title>

  <style>
    .btn-success {
      background-color: #9EB384;
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
      line-height: 1.5;
      border-radius: 0.2rem;
      border-color: #9EB384;
    }

    .btn-primary {
      background-color: #91C8E4;
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
      line-height: 1.5;
      border-radius: 0.2rem;
      border-color: #91C8E4;
    }
  </style>
</head>

<body>
  <!-- Wrapper -->
  <div class="wrapper">
    <!-- Sidebar Wrapper -->
    @include('staff.body.sidebar')
    <!-- End Sidebar Wrapper -->

    <!-- Topbar -->
    @include('staff.body.topbar')
    <!-- End Topbar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
      <div class="page-content">

        <div class="d-flex justify-content-between mb-3">
            <h5 class="card-title">Client Assessment History</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary add-assessment-btn" href="{{ route('staff-add-assessment-record', ['id' => $client->id]) }}">
                        <i class="fa-solid fa-file-prescription" style="font-size: 0.8em;"></i> Add New Assessment
                    </a>
                </div>
            </div>
        </div>
        <hr/>
        <form method="GET" action="{{ route('filter-clients') }}">
          @csrf

          <div class="row d-flex ">
            <div class="col-md-4 flex-fill mb-0">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        @if(isset($client_image) && !empty($client_image))
                            <img src="{{ asset('upload/' . $client_image) }}" alt="Client Picture" class="img-fluid rounded-circle mx-auto" style="width: 120px; height: 120px; border: 2px solid black;">
                        @else
                            <img src="{{ asset('upload/no_image.jpg') }}" alt="No Image Available" class="img-fluid rounded-circle mx-auto" style="width: 120px; height: 120px; border: 2px solid black;">
                        @endif
        
                        @if($additionalAssessments->isNotEmpty())
                            <div class="mt-2 text-center">
                                <h6 class="mb-1">{{ $additionalAssessments[0]->assessment_client_name }}</h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        
            <div class="col-md-8 flex-fill mb-0">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-width mb-0">
                                <tbody>
                                    <tr>
                                        <th>Client Account Number</th>
                                        <td>{{ $client->client_idnumber }}</td>
                                    </tr>
                                    <tr>
                                        <th>Method Using</th>
                                        <td>{{ $client->method_accepted }}</td>
                                       
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td>{{ $client->age }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ implode(', ', array_filter([$client->street_number, $client->street_name, $client->barangay, $client->city_municipality, $client->province])) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        
        <hr>
        <div class="card">
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered table-hover text-center">
                      <thead style="background-color: #1F1717; color: white;">
                          <tr>
                            <th>#</th>
                              <th>Assessment Code</th>
                              <th>Date of Visit</th>
                              <th>Service Provider Name</th>
                              <th>Follow-up Visit Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php
                        
                    @endphp
                        @php
                        $counter = 1;
                        $filteredAssessments = $assessmentRecords->sortByDesc('created_at');
                    @endphp
      
                          @forelse($filteredAssessments as $assessment)
                              <tr>
                                <td>{{ $counter++ }}</td>
                                  <td>{{ $assessment->assessment_code }}</td>
                                  <td>{{ $assessment->date_of_visit }}</td>
                                  <td>
                                      <a href="#">
                                          {{ $assessment->service_provider_name }}
                                      </a>
                                  </td>
                                  <td>{{ $assessment->follow_up_visit_date }}</td>
                                  <td>
                                      <a href="{{ route('staff-view-individual-assessment', ['id' => $assessment->id]) }}"
                                          class="btn btn-primary rounded-pill">
                                          View Details
                                      </a>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="6">No assessments available.</td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      
        </form>

    <!-- Overlay -->
    <div class="overlay toggle-icon"></div>
    <!-- End Overlay -->

    <!-- Back To Top Button -->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!-- End Back To Top Button -->

    <footer class="page-footer">
      <p class="mb-0">Copyright © 2023. All right reserved.</p>
    </footer>
  </div>
    </div>
  </div>
  <!-- End Wrapper -->

  <!-- Bootstrap JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Plugins -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <!-- Vector map JavaScript -->
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Highcharts JS -->
  <script src="assets/plugins/highcharts/js/highcharts.js"></script>
  <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <script src="assets/js/index2.js"></script>
  <!-- App JS -->
  <script src="assets/js/app.js"></script>

  <!-- jQuery DataTables and DataTables Bootstrap 5 JavaScript -->
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      var table = $('#example2').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
      });

      table.buttons().container()
        .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
  </script>


  

</body>

</html>