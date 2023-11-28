@extends('admin.admin_dashboard')
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('admin')


<!-- Add a canvas element to render the chart -->
<canvas id="genderChart" width="400" height="200"></canvas>

<script>
    // Access the data passed from the controller
    var femaleData = {!! $femaleData !!};
    var maleData = {!! $maleData !!};

    // Set up the chart data
    var chartData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
            {
                label: 'Female',
                borderColor: 'rgba(255, 0, 0, 1)',
                data: femaleData,
            },
            {
                label: 'Male',
                borderColor: 'rgba(0, 0, 255, 1)',
                data: maleData,
            },
        ],
    };

    // Get the canvas element
    var ctx = document.getElementById('genderChart').getContext('2d');

    // Create the line chart
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: chartData,
    });
</script>

    
@endsection