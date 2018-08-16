$(document).ready(function () {
    $.ajax({
        url: "http://localhost/onlinebns/include/student_data_array.php"
        , method: "GET"
        , success: function (data) {
            console.log(data);
            var account_email = [];
            var seller_rating = [];
            for (var i in data) {
                account_email.push(data[i].account_email);
                seller_rating.push(data[i].seller_rating);
            }
            var chartdata = {
                labels: account_email
                , datasets: [
                    {
                        label: [
                            'Top Rated Sellers',
                        ],
                        backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(155, 89, 182,1.0)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(142, 68, 173,1.0)'
            ],
                        borderWidth: 2,
                        data: seller_rating
                    }
                ]
            };
            var ctx = $("#mycanvas");
            var myBarChart  = new Chart(ctx, {
                type: 'bar'
                , data: chartdata,
                options:{
                    labelColor: 'rgba(255,255,255,1)'
                }
            });
        }
        , error: function (data) {
            console.log(data);
        }
    });
});
