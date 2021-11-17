$(document).ready(function () {
    $.ajax({
        url: "data.php",
        type: "POST",
        success: function (data) {
            var average_star_rating = [];
            var title = ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th"];
            // var count = 1;
            for (var i in data) {
                average_star_rating.push("" + data[i].average_star_rating);
                // title.push(data[i].title);
                // var num = count++;
                // title.push(num);
            }

            var chartdata = {
                labels: title,
                datasets: [
                    {
                        label: "Searched",
                        fill: false,
                        backgroundColor: chartColors.green,
                        borderColor: chartColors.green,
                        pointHoverBackgroundColor: chartColors.green,
                        pointHoverBorderColor: chartColors.green,
                        hoverBackgroundColor: chartColors.gold,
                        borderWidth: 1,
                        data: average_star_rating
                    }
                ]
            };

            var ctx = $("#myChart").get(0).getContext("2d");

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    title: {
                        display: false,
                        maintainAspectRatio: false
                    },
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    scales: {
                        
                        borderColor: 'black',
                        yAxes: [{
                            gridLines: {
                                drawOnChartArea: true,
                                color: "black",
                            },
                            display: true,
                            ticks: { 
                                fontSize: 16,
                                fontColor: 'black',
                                min: 0,
                                max: 6,
                            },
                            scaleLabel: {
                                display: true,
                                fontSize: 20,
                                fontColor: 'black',
                                labelString: 'Times Searched'
                            }
                        }],
                        
                        xAxes: [{
                            
                            gridLines: {
                                drawOnChartArea: false,
                                zeroLineColor: "black",
                                color: "black",
                            },
                            display: true,
                            ticks: { 
                                fontSize: 20,
                                fontColor: 'black',
                            }
                        }]
                    }
                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
});
window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    gold: 'rgb(248,193,28)',
    grey: 'rgb(201, 203, 207)'
};