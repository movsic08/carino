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
    .btn-danger {
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
      line-height: 1.5;
      border-radius: 0.2rem;
    }
  </style>
</head>

<body>
  <!-- Wrapper -->
  <div class="wrapper">
    <!-- Sidebar Wrapper -->
    @include('admin.assets.sidebar')
    <!-- End Sidebar Wrapper -->

    <!-- Topbar -->
    @include('admin.assets.topbar')
    <!-- End Topbar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
      <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3"><b>Client Management</b></div>
          <div class="ps-3">
            <nav aria-label="Breadcrumb Navigation">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Assessments</li>
              </ol>
            </nav>
          </div>
        
          <div class="ms-auto">
            <a href="{{ route('admin.add.client') }}" class="btn btn-sm" style="background-color: #164863; color: #fff;">
              Add New Client <i class='bx bxs-user-plus'></i>
            </a>
          </div>
        </div>

        <hr />
        <form method="GET" action="{{ route('filter-assessment-records') }}">
          @csrf
          <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label for="fromDate" class="form-label">From Date</label>
                      @if (Request::filled('fromDate'))
                          : {{ Request::get('fromDate') }}
                      @endif
                      <input type="date" class="form-control form-control-sm" value="Request::get('fromDate') ?? date('Y-m-d')" id="fromDate" name="fromDate">
                    </div>
                    <div class="col-md-3">
                        <label for="toDate" class="form-label">To Date</label>
                        @if (Request::filled('toDate'))
                            : {{ Request::get('toDate') }}
                        @endif
                        <input type="date" class="form-control form-control-sm" id="toDate" name="toDate">
                    </div>
                    <div class="col-md-3">
                        <label for="filter" class="form-label">Method</label>
                        @if (Request::filled('filter'))
                            : {{ Request::get('filter') }}
                        @endif
                        <select class="form-select form-select-sm" id="filter" name="filter">
                          <option value="" disabled selected>Select Method</option>
                          <option value="COC" {{Request::get('method_accepted') == 'COC' ? 'selected' : ''}}>COC</option>
                          <option value="POP" {{Request::get('method_accepted') == 'POP' ? 'selected' : ''}}>POP</option>
                          <option value="Injectable" {{Request::get('method_accepted') == 'Injectable' ? 'selected' : ''}}>Injectable</option>
                          <option value="Implant" {{Request::get('method_accepted') == 'Implant' ? 'selected' : ''}}>Implant</option>
                          <option value="IUD" {{Request::get('method_accepted') == 'IUD' ? 'selected' : ''}}>IUD</option>
                          <option value="Condom" {{Request::get('method_accepted') == 'Condom' ? 'selected' : ''}}>Condom</option>
                          <option value="BOM_CMM" {{Request::get('method_accepted') == 'BOM_CMM' ? 'selected' : ''}}>BOM/CMM</option>
                          <option value="BBT" {{Request::get('method_accepted') == 'BBT' ? 'selected' : ''}}>BBT</option>
                          <option value="STM" {{Request::get('method_accepted') == 'STM' ? 'selected' : ''}}>STM</option>
                          <option value="SDM" {{Request::get('method_accepted') == 'SDM' ? 'selected' : ''}}>SDM</option>
                          <option value="LAM" {{Request::get('method_accepted') == 'LAM' ? 'selected' : ''}}>LAM</option>
                          <option value="OTHER" {{Request::get('method_accepted') == 'OTHER' ? 'selected' : ''}}>Other</option>
                      </select>
                      
                    </div>
                    
                    <div class="col-md-3 d-flex align-items-end">
                      <button class="btn btn-sm btn-dark w-100" type="submit" id="filterButton">
                          <i class='bx bxs-filter-alt'></i> Filter
                      </button>
                  </div>                
                </div>
            </div>
          </div>


        <div class="card">
          <div class="card-body">
            <div class="table-responsive" class="mb-4">
                <table id="example" class="table table-striped table-hover table-bordered text-center">
                    <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Client Code</th>
                          <th scope="col">Assessment Code</th>
                          <th scope="col">Date of Visit</th>
                          <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessmentRecords as $index => $assessmentRecord)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $assessmentRecord->assessment_client_name }}</td>
                                <td>{{ $assessmentRecord->client_coder }}</td>
                                <td>{{ $assessmentRecord->assessment_code }}</td>
                                <td>{{ $assessmentRecord->date_of_visit }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-success">
                                        <i class='bx bx-edit'></i> Edit
                                    </a>
                                    <a href="{{ route('delete-assessment', ['id' => $assessmentRecord->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to soft delete this assessment record?')">
                                      <i class='bx bx-trash'></i> Remove
                                  </a>
                                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>

      </form>
      </div>
    </div>

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