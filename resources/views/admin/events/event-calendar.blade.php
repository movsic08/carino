<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/app-fullcalender.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 03:55:10 GMT -->
<head>
    <base href="/public">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
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
	<title>FCRMSys | Admin Dashboard</title>
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
		
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Event</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Event Calendar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id='calendar'></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--footer -->
        @include('admin.assets.footer')
        <!--end footer -->

	</div>
	<!--end wrapper-->

	<!-- search modal -->
    <!-- end search modal -->

	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
    <!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Simplebar -->
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>

<!-- MetisMenu -->
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<!-- Vector Map JavaScript -->
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Highcharts JS -->
<script src="assets/plugins/highcharts/js/highcharts.js"></script>

<!-- Apexcharts -->
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

<!-- Custom Scripts -->
<script src="assets/js/index2.js"></script>

<!-- App JS -->
<script src="assets/js/app.js"></script>

	
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
				},
				initialView: 'dayGridMonth',
				initialDate: new Date(),
				navLinks: true, // can click day/week names to navigate views
				selectable: true,
				nowIndicator: true,
				dayMaxEvents: true, // allow "more" link when too many events
				editable: true,
				selectable: true,
				businessHours: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: [{
					title: 'All Day Event',
					start: '2020-09-01',
				}, {
					title: 'Long Event',
					start: '2020-09-07',
					end: '2020-09-10'
				}, {
					groupId: 999,
					title: 'Repeating Event',
					start: '2020-09-09T16:00:00'
				}, {
					groupId: 999,
					title: 'Repeating Event',
					start: '2020-09-16T16:00:00'
				}, {
					title: 'Conference',
					start: '2020-09-11',
					end: '2020-09-13'
				}, {
					title: 'Meeting',
					start: '2020-09-12T10:30:00',
					end: '2020-09-12T12:30:00'
				}, {
					title: 'Lunch',
					start: '2020-09-12T12:00:00'
				}, {
					title: 'Meeting',
					start: '2020-09-12T14:30:00'
				}, {
					title: 'Happy Hour',
					start: '2020-09-12T17:30:00'
				}, {
					title: 'Dinner',
					start: '2020-09-12T20:00:00'
				}, {
					title: 'Birthday Party',
					start: '2020-09-13T07:00:00'
				}, {
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2020-09-28'
				}]
			});
			calendar.render();
		});
	</script>

	
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>