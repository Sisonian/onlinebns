$(document).ready(function () {
    $.ajax({
        url: "http://localhost/onlinebns/include/student_data_array1.php"
        , method: "GET"
        , success: function (data) {
            console.log(data);
            var item_category = [];
            var votes_sum = [];
            for (var i in data) {
                item_category.push(data[i].item_category);
                votes_sum.push(data[i].votes_sum);
            }
            var chartdata = {
                labels: item_category
                , datasets: [
                    {
                        label: [
                            'Number of Items per Category',
                        ],
                        backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(155, 89, 182,0.2)',
                'rgba(149, 165, 166,0.2)',
                'rgba(231, 76, 60,0.2)',
                'rgba(241, 196, 15,0.2)',
                'rgba(46, 204, 113,0.2)',
                'rgba(52, 73, 94,0.2)',
                'rgba(236, 240, 241,0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(155, 89, 182,0.2)',
                'rgba(149, 165, 166,0.2)',
                'rgba(231, 76, 60,0.2)',
                'rgba(241, 196, 15,0.2)',
                'rgba(46, 204, 113,0.2)',
                'rgba(52, 73, 94,0.2)',
                'rgba(236, 240, 241,0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(142, 68, 173,1.0)',
                'rgba(127, 140, 141,1.0)',
                'rgba(192, 57, 43,1.0)',
                'rgba(243, 156, 18,1.0)',
                'rgba(39, 174, 96,1.0)',
                'rgba(44, 62, 80,1.0)',
                'rgba(189, 195, 199,1.0)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(142, 68, 173,1.0)',
                'rgba(127, 140, 141,1.0)',
                'rgba(192, 57, 43,1.0)',
                'rgba(243, 156, 18,1.0)',
                'rgba(39, 174, 96,1.0)',
                'rgba(44, 62, 80,1.0)',
                'rgba(189, 195, 199,1.0)'
            ],
                        borderWidth: 2,
                        data: votes_sum
                    }
                ]
            };
             var  options = {
     scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true,
                 userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
             }
         }],
     },
 }
            var ctx = $("#mycanvas7");
            var myBarChart  = new Chart(ctx, {
                type: 'bar'
                , data: chartdata,
                options:options
            });
        }
        , error: function (data) {
            console.log(data);
        }
    });
});
