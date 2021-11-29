var variableName = variableName || null;
if (!variableName) {
    variableName = 1;

    function createChart()
    {
        $.ajax(
            {
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

                

                    if (!window.chart) {

                        var chartdata = {
                            labels: title,
                            datasets: [
                            {
                                label: "Stars",
                                fill: false,
                                backgroundColor: chartColors.deep_Purple,
                                borderColor: chartColors.light_purple,
                                pointHoverBackgroundColor: chartColors.deep_Purple,
                                hoverBackgroundColor: [
                                    'rgb(255,215,0)',
                                    'rgb(233,232,225)',
                                    'rgb(205,127,50)',
                                    'rgb(123, 207, 233)',
                                    'rgb(123, 207, 233)',
                                    'rgb(123, 207, 233)',
                                    'rgb(123, 207, 233)',
                                    'rgb(123, 207, 233)',
                                    'rgb(123, 207, 233)',
                                    'rgb(123, 207, 233)',
                                ],
                                borderWidth: 1,
                                data: average_star_rating
                            }
                            ]
                        };

                        var ctx = $("#myChart").get(0).getContext("2d");

                        window.chart = new Chart(
                            ctx, {
                                animation: false,
                                type: 'bar',
                                data: chartdata,
                                animationEnabled: false,
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
                                                max: 5,
                                            },
                                            scaleLabel: {
                                                display: true,
                                                fontSize: 20,
                                                fontColor: 'black',
                                                labelString: 'Star Rating'
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
                            }
                        );
                    } else {
                        window.chart.data.datasets[0].data = average_star_rating;
                        window.chart.update();
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            }
        );
    }
    $(document).ready(
        function () {
            createChart();
            setInterval(
                function () {
                    $("#top-ten-table").load("top_ten_script.php");
                    createChart();
                },
                5000
            );

        }
    );
}

window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    deep_Purple: 'rgb(153, 102, 255)',
    light_purple: 'rgb(94, 96, 206)',
    gold: 'rgb(255,215,0)',
    grey: 'rgb(201, 203, 207)'
};
window.hoverColours = {
    gold: 'rgb(255,215,0)',
    silver: 'rgb(192,192,192)',
    platinum: 'rgb(233,232,225)',
    bronze: 'rgb(205,127,50)'

};
