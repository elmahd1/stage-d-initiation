<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$intitule = $_POST["intitule"];
$selected_options = $_POST['options']; 
$index = 0;
$amount = [];
$amount2 = [];
$dot = [];

foreach ($selected_options as $option) {
    $index++;
    $a = $option; // Option value used directly

    // Construct the query for fetching monthly sums
    $query = $conn->query("
        SELECT 'January' AS monthname, SUM(DEPENSES_JANVIER) AS amount, 1 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'February' AS monthname, SUM(DEPENSES_FEVRIER) AS amount, 2 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'March' AS monthname, SUM(DEPENSES_MARS) AS amount, 3 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'April' AS monthname, SUM(DEPENSES_AVRIL) AS amount, 4 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'May' AS monthname, SUM(DEPENSES_MAI) AS amount, 5 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'June' AS monthname, SUM(DEPENSES_JUIN) AS amount, 6 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'July' AS monthname, SUM(DEPENSES_JUILLET) AS amount, 7 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'August' AS monthname, SUM(DEPENSES_AOUT) AS amount, 8 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'September' AS monthname, SUM(DEPENSES_SEPTEMBRE) AS amount, 9 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'October' AS monthname, SUM(DEPENSES_OCTOBRE) AS amount, 10 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'November' AS monthname, SUM(DEPENSES_NOVEMBRE) AS amount, 11 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        UNION ALL
        SELECT 'December' AS monthname, SUM(DEPENSES_DECEMBRE) AS amount, 12 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
        ORDER BY monthnum;
    ");
    
    // Query to fetch DOTATION value
    $s = "SELECT DOTATION_$a FROM EE$a WHERE INTITULE_RUBRIQUE='$intitule'";
    $result = $conn->query($s);
    
    if ($result) {
        $row = $result->fetch_assoc(); // Fetch associative array from result
        $dot[$index] = $row['DOTATION_' . $a] ?? null; // Avoid undefined index error
    } else {
        echo "Error fetching DOTATION for $a: " . $conn->error;
    }

    $amount[$index] = [];
    $amount2[$index] = [];
    
    foreach ($query as $data) {
        $amount[$index][] = $data['amount'];
    }

    // Calculate remaining amounts (amount2)
    $amount2[$index][] = $dot[$index];
    for ($i = 0; $i < 12; $i++) {
        if ($i == 0) {
            $amount2[$index][] = ($amount[$index][$i] == 0) ? null : $dot[$index] - $amount[$index][$i];
        } else {
            $amount2[$index][] = ($amount[$index][$i] == 0) ? null : $amount2[$index][$i] - $amount[$index][$i];
        }
    }

    array_unshift($amount[$index], ''); // Add empty string to the beginning of $amount
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="container" style="width: 800px;">
    <canvas id="myChart"></canvas>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = ['', 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
const data = {
    labels: labels,
    datasets: [
        <?php foreach ($selected_options as $index => $option) { ?> 
        {
            type: 'bar',
            label: 'Depenses des mois pour <?php echo $option; ?>',
            data: <?php echo json_encode($amount[$index + 1]); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1,
            barThickness: 20,
            categoryPercentage: 0.8,
        },
     
        {
            type: 'line',
            label: 'Ligne pour le reste de la dotation pour <?php echo $option; ?>',
            data: <?php echo json_encode($amount2[$index + 1]); ?>,
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgb(54, 162, 235)',
            fill: false,
            tension: 0.1,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: 'rgb(54, 162, 235)',
            order: 1
        },
        <?php } ?>
    ]
};

const config = {
    data: data,
    options: {
        scales: {
            x: {
                stacked: false,
            },
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
