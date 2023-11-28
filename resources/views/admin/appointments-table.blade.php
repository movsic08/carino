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
	.table tbody td:nth-child(2),
	.table tbody td:nth-child(3),
	.table tbody td:nth-child(4),
	.table tbody td:nth-child(5),
	.table tbody td:nth-child(6)
	.table tbody td:nth-child(7) {
		max-width: 100px;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

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
          <div class="breadcrumb-title pe-3"><b>Appointments</b></div>
          <div class="ps-3">
            <nav aria-label="Breadcrumb Navigation">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pendings</li>
              </ol>
            </nav>
          </div>
    
        </div>

        <hr />

          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table table id="example" class="table table-striped table-bordered table-hover text-center">
                    <thead style="background-color: #072541; color: white;">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Added At</th>
							<th scope="col">Name</th>
							<th scope="col">Appointment #</th>
							<th scope="col">Date & Time</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($appointments as $appointmentData)
							@if($appointmentData->status == 'Pending')
								<tr>
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $appointmentData->created_at->diffForHumans() }}</td>
									<td>{{ $appointmentData->name }}</td>
									<td>{{ $appointmentData->appointment_number }}</td>
									<td>{{ $appointmentData->date . ' ' . $appointmentData->time }}</td>
									<td>
										@if($appointmentData->status == 'Pending')
											<span class="badge badge-warning rounded-pill text-uppercase" style="background-color: #F1EB90; color: #1F1717;">{{ $appointmentData->status }}</span>
										@elseif($appointmentData->status == 'Approved')
											<span class="badge badge-success rounded-pill text-uppercase" style="background-color: #9FBB73; color: #1F1717;">{{ $appointmentData->status }}</span>
										@endif
									</td>
									<td>
										<div>
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#appointmentModal">
												<i class="far fa-calendar-check" style="font-size: 0.9rem;"></i> View
											  </button>											  
										</div>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
                </table>


				<!-- Modal -->
				<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
						  <div class="row">
							<div class="col-5">
							  <strong>Appointment Number:</strong><br>
							  <strong>Date Added:</strong><br>
							  <hr>
							  <strong>Client Name:</strong><br>
							  <strong>Contact Phone:</strong><br>
							  <strong>Contact Email:</strong><br>
							  <strong>Date:</strong><br>
							  <strong>Time:</strong><br>
							  <strong>Message:</strong><br>
							</div>
							<div class="col-7">
							  {{ $appointmentData->appointment_number }}<br>
							  {{ $appointmentData->created_at->format('Y-m-d H:i:s') }}<br>
							  <hr>
							  {{ $appointmentData->name }}<br>
							  {{ $appointmentData->phone }}<br>
							  {{ $appointmentData->email }}<br>
							  {{ $appointmentData->date }}<br>
							  {{ \Carbon\Carbon::parse($appointmentData->time)->format('g:i A') }}<br>
							  {{ $appointmentData->message }}<br>
							</div>
						  </div>
						</div>
						<div class="modal-footer">
						  <a href="{{ route('appointments.approve', $appointmentData->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to approve this appointment?')">
							<i class="fas fa-check" style="font-size: 0.9rem;"></i> Approve
						  </a>
						  <a href="{{ route('appointments.reject', $appointmentData->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject this appointment?')">
							<i class="fas fa-times" style="font-size: 0.9rem;"></i> Reject
						  </a>
						</div>
					  </div>
					</div>
				  </div>
				  
				  <!--End Modal -->
				  
						  
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

 <!-- jQuery and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

<!-- Other Plugins -->
<script src="assets/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/plugins/highcharts/js/highcharts.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

<!-- Your custom scripts -->
<script src="assets/js/index2.js"></script>
<script src="assets/js/app.js"></script>

<!-- DataTables initialization -->
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

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