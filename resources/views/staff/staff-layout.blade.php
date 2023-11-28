<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FCRMSys | Staff Dashboard</title>
    @vite(['resources/js/app.js'])
	
	<!--favicon-->
	<link rel="icon" href="assets/img/logo-2.png" type="image/png">	
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

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Custom Styles -->
<link href="assets/css/app.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/dark-theme.css" />
<link rel="stylesheet" href="assets/css/semi-dark.css" />
<link rel="stylesheet" href="assets/css/header-colors.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/custom.css" />


    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>



	<style>
		#client-analytics-chart {
			min-height: 325px;
		}
        .dropdown-item:active {
            background-color: #1F4172; 
            transform: translateY(4px); 
        }
	</style>


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

                @yield('staff')


			</div>
		</div>
		<!--end page wrapper -->

        <!--start footer -->
		
		<!--end footer -->
		
	</div>
	<!--end wrapper-->

	<!-- search modal -->
   
    <!-- end search modal -->



	<!--start switcher-->
	<!--end switcher-->
	
	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!-- Plugins -->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<!-- Vector map JavaScript -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

	<!-- jQuery DataTables and DataTables Bootstrap 5 JavaScript -->
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

	<!-- Highcharts and Apexcharts -->
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


	<!-- App JS -->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/loading.js"></script>
	<script src="assets/js/datas.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
    }
    @endif 
</script>

<script src="{{ asset('backend/assets/js/code.js') }}"></script>

<script>
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            }) 
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var user_id = $(this).data('id'); 
               
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success', 
                        showConfirmButton: false,
                        timer: 3000 
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success, 
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error, 
                        })
                    }
                }
            });
        })
    })
</script>


</body>


</html>