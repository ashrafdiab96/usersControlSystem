var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Visitors',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45, 30, 42, 29, 22, 12]
        }]
    },

    // Configuration options go here
    options: {
        scales: {
        yAxes: [{
            ticks: {
                max: 50,
                min: 0,
                stepSize: 10
            }
        }]
    }
    }
});

