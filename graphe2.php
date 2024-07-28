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
    
SELECT 'january' AS monthname, SUM(DEPENSES_JANVIER) AS amount, 1 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'February' AS monthname, SUM(DEPENSES_FEVRIER) AS amount, 2 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'March' AS monthname, SUM(DEPENSES_MARS) AS amount, 3 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'April' AS monthname, SUM(DEPENSES_AVRIL) AS amount, 4 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'May' AS monthname, SUM(DEPENSES_MAI) AS amount, 5 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'June' AS monthname, SUM(DEPENSES_JUIN) AS amount, 6 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'July' AS monthname, SUM(DEPENSES_JUILLET) AS amount, 7 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'August' AS monthname, SUM(DEPENSES_AOUT) AS amount, 8 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'September' AS monthname, SUM(DEPENSES_SEPTEMBRE) AS amount, 9 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'October' AS monthname, SUM(DEPENSES_OCTOBRE) AS amount, 10 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'November' AS monthname, SUM(DEPENSES_NOVEMBRE) AS amount, 11 AS monthnum FROM budget_table WHERE Rubrique = $rub
UNION ALL
SELECT 'December' AS monthname, SUM(DEPENSES_DECEMBRE) AS amount, 12 AS monthnum FROM budget_table WHERE Rubrique = $rub
ORDER BY monthnum;

");
$s="SELECT DOTATION_2024 FROM budget_table where Rubrique=$rub";
$result=$con->query($s);
$row = $result->fetch_assoc();
$dot = $row['DOTATION_2024'];
$amount = [];
$amount2=[];
foreach ($query as $data) {
   
    $amount[] = $data['amount'];
}
$amount2 = [$dot - $amount[0] ,$dot - $amount[0] - $amount[1] , $dot - $amount[0]- $amount[1]- $amount[2] , $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3] ,$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4] ,$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5] , $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6] ,  $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7] , $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8], $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8]- $amount[9],$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8]- $amount[9]- $amount[10], $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8]- $amount[9]- $amount[10]-$amount[11]];




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
