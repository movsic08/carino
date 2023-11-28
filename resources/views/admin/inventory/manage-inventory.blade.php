<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/public">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">

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

  <title>FCRMSys | Admin Dashboard</title>

  <style>
    .table tbody td:nth-child(3),
    .table tbody td:nth-child(5) {
      max-width: 100px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    .btn-primary{
      background-color: #9EB384;
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
      line-height: 1.5;
      border-radius: 0.2rem;
      border-color: #9EB384;
    }

    .btn-info{
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

    /* Custom styles for SweetAlert */
    .swal2-popup {
        font-size: 1.6rem;
    }
    .swal2-title {
        font-size: 2.2rem;
        color: #333;
    }
    .swal2-content {
        font-size: 1.8rem;
        color: #555;
    }
    .swal2-confirm, .swal2-cancel {
        font-size: 1.8rem;
    }
    .swal2-confirm {
        background-color: #d33 !important;
        color: #fff !important;
    }
    .swal2-cancel {
        background-color: #3085d6 !important;
        color: #fff !important;
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
          <div class="breadcrumb-title pe-3"><b>Inventory</b></div>
          <div class="ps-3">
            <nav aria-label="Breadcrumb Navigation">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Inventory</li>
              </ol>
            </nav>
          </div>
        
          <div class="ms-auto">
            <a href="{{ route('admin.inventory.add') }}" class="btn btn-sm" style="background-color: #164863; color: #fff;">
              <i class="fa-solid fa-plus fa-xs"></i> Add New Item 
              </a>
          </div>
        </div>
        

        <hr />

        <div class="card">
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered table-hover text-center align-middle">
                      <thead style="background-color: #072541; color: white;">
                          <tr>
                              <th>Item Code</th>
                              <th>Item Photo</th>
                              <th>Name</th>
                              <th>Stocks</th>
                              <th>Date Added</th>
                              <th>Availability</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($inventoryItems as $item)
                          <tr>
                              <td>{{ $item->item_code }}</td>
                              <td>
                                  @if ($item->item_photo)
                                  <img src="{{ asset('/upload/inventory_photos/' . $item->item_photo) }}" alt="Item Photo" style="max-width: 100px;">
                                  @else
                                  No Photo
                                  @endif
                              </td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->stocks }}</td>
                              <td>{{ $item->created_at->format('Y-m-d') }}</td>
                              <td>{{ $item->availability ? 'Available' : 'Not Available' }}</td>
                              <td>
                                  <a href="{{ route('admin.inventory.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                      <i class='bx bx-edit-alt'></i> Update
                                  </a>
                                  <a href="{{ route('admin.inventory.view', $item->id) }}" class="btn btn-info btn-sm">
                                      <i class='bx bx-book-open'></i> View
                                  </a>
                                  <form id="deleteForm" action="{{ route('admin.inventory.delete', $item->id) }}" method="post" style="display:inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteConfirmation()">
                                          <i class='bx bx-trash'></i> Delete
                                      </button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
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

<!-- Include SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function showDeleteConfirmation() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, submit the form
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
  
</body>

</html>