
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<base href="/public">
	<!-- Plugins -->
	<link rel="stylesheet" href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css">
	<link rel="stylesheet" href="assets/plugins/simplebar/css/simplebar.css">
	<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/plugins/metismenu/css/metisMenu.min.css">
	<link rel="stylesheet" href="assets/plugins/highcharts/css/highcharts.css">

	<!-- Loader -->
	<link rel="stylesheet" href="assets/css/pace.min.css">
	<script src="assets/js/pace.min.js"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-extended.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" href="assets/css/icons.css">

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css">
	<link rel="stylesheet" href="assets/css/semi-dark.css">
	<link rel="stylesheet" href="assets/css/header-colors.css">

	<!-- ApexCharts -->
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

	<!--favicon-->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">
	<title>FCRMSys | Admin Dashboard</title>

	<style>
		#client-analytics-chart {
			min-height: 330px;
		}
	
		#lineChart {
			margin: 35px auto;
		}
	
		.apexcharts-xaxis-title {
			color: #333;
			text-transform: uppercase;
		}
	</style>
	


</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.assets.sidebar')
		<!--end sidebar wrapper -->

		<!--start topbar -->
		@include('admin.assets.topbar')
		<!--end topbar -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

			a

				
			
				
				

				


			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!---<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>---->
	</div>
	<!--end wrapper-->

	<!-- search modal -->
   
    <!-- end search modal -->



	<!--start switcher-->
	<!--end switcher-->
	
	<!-- jQuery -->
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

<!-- Highcharts and Apexcharts -->
<script src="assets/plugins/highcharts/js/highcharts.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/js/index2.js"></script>

<!-- Chart Libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- App JS -->
<script src="assets/js/app.js"></script>
<script src="assets/js/loading.js"></script>
<script src="assets/js/datas.js"></script>

<script>
	document.addEventListener("DOMContentLoaded", function () {
        var options = {
            chart: {
			foreColor: "#9ba7b2",
			height: 330,
			type: "area",
			zoom: {
				enabled: !1
			},
			toolbar: {
				show: !0
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .1
			}
		},
            series: [{
                name: 'Weekly Clients',
                data: {!! json_encode($weeklyData) !!},
                curve: 'smooth',
                type: 'area',
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.9,
                        stops: [0, 100]
                    }
                },
                stroke: {
					width: 5,
					curve: "smooth"
				},
            }],
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: {!! json_encode($weeklyLabels) !!},
                title: {
                    text: 'FPOP Weekly New Clients',
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        cssClass: 'apexcharts-xaxis-title',
                        offsetX: 0,
                        offsetY: -10
                    }
                }
            },
			title: {
			text: "FPOP",
			align: "left",
			style: {
				fontSize: "16px",
				color: "#666"
				}
			},
			fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				gradientToColors: ["#0d6efd"],
				shadeIntensity: 1,
				type: "vertical",
				opacityFrom: .7,
				opacityTo: .2,
				stops: [0, 100, 100, 100]
			}
		},
            axisBorder: {
				show: true,
				color: '#78909C',
				height: 3,
				width: '100%',
				offsetX: 0,
				offsetY: 0
			},
            yaxis: {
                title: {
                    text: 'Count',
                },
            },
            markers: {
			size: 5,
			colors: ["#0d6efd"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		dataLabels: {
			enabled: !1
		},
		colors: ["#0d6efd"],
		grid: {
			show: true,
			borderColor: 'rgba(0, 0, 0, 0.15)',
			strokeDashArray: 4,
		},
        };

        var chart = new ApexCharts(document.querySelector("#weeklyClientAdditionsChart"), options);
        chart.render();
    });
</script>



</body>


</html>