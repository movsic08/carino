@extends('admin.admin-layout')
@section('admin')

<div class="card-body">
    <div class="card shadow-none bg-transparent">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h4 class="mb-3 mb-md-0">Clients Overview</h4>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div id="weeklyClientAdditionsChart"></div>
        </div>
    </div>
</div>


            
<!-- Chart Libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- App JS -->
<script src="assets/js/app.js"></script>
<script src="assets/js/loading.js"></script>

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
@endsection