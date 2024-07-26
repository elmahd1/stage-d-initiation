<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php 
$con = new mysqli('localhost', 'root', '', 'budget');
$rub=$_POST["rub"];

$query = $con->query("
    SELECT 
    MONTHNAME(created) as monthname,
    SUM(amount) as amount,
    MONTH(created) as monthnum
    FROM `$rub`
    GROUP BY monthname, monthnum
    ORDER BY monthnum
");

$amount = [];
foreach ($query as $data) {
    
    $amount[] = $data['amount'];
}
$query2 = $con->query("
    SELECT 
    MONTHNAME(created) as monthname,
    SUM(amount) as amount,
    MONTH(created) as monthnum
    FROM `RESTE$rub`
    GROUP BY monthname, monthnum
    ORDER BY monthnum
");

$amount2 = [];
foreach ($query2 as $data2) {
   
    $amount2[] = $data2['amount'];
}

?>

<body>
    <div style="width: 800px;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const labels = ['janvier','fevrier','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre'];
        const data = {
            labels: labels,
            datasets: [
                {
                    type: 'bar',
                    label: 'Monthly Expenses (Bar)',
                    data: <?php echo json_encode($amount); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    order: 2
                },
                {
                    type: 'line',
                    label: 'Monthly Expenses (Line)',
                    data: <?php echo json_encode($amount2); ?>,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: false,
                    tension: 0.1,
                    order: 1
                }
            ]
        };

        const config = {
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
