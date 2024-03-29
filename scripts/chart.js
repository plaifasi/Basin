document.addEventListener('DOMContentLoaded', function () {
    var rainfallData = [0, 20, 30, 40, 50, 60, 70, 80, 90, 100];
    var numberOfCharts = 5; // Change this to the number of charts you want
    
    for (var i = 1; i <= numberOfCharts; i++) {
        createRainChart('rainChart' + i, 'Chart ' + i, rainfallData, getRandomColor());
    }

    function createRainChart(canvasId, chartLabel, data, borderColor) {
        var rainChartCanvas = document.getElementById(canvasId).getContext('2d');
        new Chart(rainChartCanvas, getChartConfig('Days', 'Rainfall (mm)', data, chartLabel, borderColor));
    }

    function getChartConfig(xAxisLabel, yAxisLabel, data, chartLabel, borderColor) {
        return {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
                datasets: [{
                    label: chartLabel,
                    data: data,
                    borderColor: borderColor,
                    borderWidth: 2,
                    pointRadius: 5,
                    pointBorderWidth: 2,
                    borderDash: [],
                }]
            },
            options: {
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: xAxisLabel,
                        },
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: yAxisLabel,
                        },
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 1, // Adjust this value based on your preferences
            },
        };
    }




    
    // Function to generate random color
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
});
