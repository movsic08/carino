var options = {
    series: [{
        name: 'Client Counts',
        data: []  // This array will be populated with the actual client counts data
    }],
    chart: {
        height: 350,
        type: 'line',
    },
    stroke: {
        width: 5,
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: []  // This array will be populated with the corresponding dates
    },
    title: {
        text: 'Client Counts Overview',
        align: 'left',
        style: {
            fontSize: "16px",
            color: '#666'
        }
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            gradientToColors: ['#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
        },
    },
    yaxis: {
        min: 0,
        title: {
            text: 'Number of Clients'
        }
    }
};

// Fetch data from the Laravel route and update the chart
fetch('/data-analytics/client-data')
    .then(response => response.json())
    .then(data => {
        const clientCounts = data.map(entry => entry.clientCounts);
        const dates = data.map(entry => entry.date);

        options.series = [{ name: 'Client Counts', data: clientCounts }];
        options.xaxis.categories = dates;

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });