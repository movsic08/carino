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
    @include('admin.assets.sidebar')
    <!-- End Sidebar Wrapper -->

    <!-- Topbar -->
    @include('admin.assets.topbar')
    <!-- End Topbar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
      <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Permission</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <a href="{{ route('add.roles') }}" class="btn btn-sm" style="background-color: #164863; color: #fff;">
                    Add Role <i class='bx bxs-user-plus'></i>
                </a>
              </div>

        </div>

        
        

        <hr />
        <form method="GET" action="{{ route('filter-clients') }}">
          @csrf

          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h6 class="card-title text-uppercase">Roles</h6>
                <hr>
                <table id="example" class="table table-striped table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>S1</th>
                            <th>Permission</th>
                            <th>Group Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->group_name }}</td>
                            <td>
                                <a href="#">View Details</a>
                                <a href="{{ route('edit.roles', $item->id) }}" class="btn btn-sm btn-warning mx-2">Edit</a>
                                <a href="{{ route('delete.roles', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
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

  <script>
    $(document).ready(function() {
    // Function to handle filter changes
    function applyFilters() {
        // Get selected filter values
        var fromDate = $('#fromDate').val();
        var toDate = $('#toDate').val();
        var method = $('#filter').val();

        // Make an AJAX request to the server
        $.ajax({
            url: '/filter-clients',
            method: 'GET',
            data: { fromDate: fromDate, toDate: toDate, filter: method },
            success: function(response) {
                // Update the table with the response
                $('#clientTable').html(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    // Attach the function to filter change events
    $('#fromDate, #toDate, #filter').change(function() {
        applyFilters();
    });

    // Initial application of filters when the page loads
    applyFilters();
});
  </script>

  

  

</body>

</html>
