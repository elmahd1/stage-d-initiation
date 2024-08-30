<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
$a1=$_POST["a1"];
$a2=$_POST["a2"];

$query = $conn->query("
    
SELECT 'january' AS monthname, SUM(DEPENSES_JANVIER) AS amount, 1 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'February' AS monthname, SUM(DEPENSES_FEVRIER) AS amount, 2 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'March' AS monthname, SUM(DEPENSES_MARS) AS amount, 3 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'April' AS monthname, SUM(DEPENSES_AVRIL) AS amount, 4 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'May' AS monthname, SUM(DEPENSES_MAI) AS amount, 5 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'June' AS monthname, SUM(DEPENSES_JUIN) AS amount, 6 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'July' AS monthname, SUM(DEPENSES_JUILLET) AS amount, 7 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'August' AS monthname, SUM(DEPENSES_AOUT) AS amount, 8 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'September' AS monthname, SUM(DEPENSES_SEPTEMBRE) AS amount, 9 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'October' AS monthname, SUM(DEPENSES_OCTOBRE) AS amount, 10 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'November' AS monthname, SUM(DEPENSES_NOVEMBRE) AS amount, 11 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'December' AS monthname, SUM(DEPENSES_DECEMBRE) AS amount, 12 AS monthnum FROM EE$a1 WHERE INTITULE_RUBRIQUE = 'SOMME'
ORDER BY monthnum;

");
$s="SELECT DOTATION_$a1 FROM EE$a1 where INTITULE_RUBRIQUE='SOMME'";
$result=$conn->query($s);
$row = $result->fetch_assoc();
$dot = $row['DOTATION_'.$a1];
$amount11 = [];

foreach ($query as $data) {

    $amount11[] = $data['amount'];
    
}

$n='';
array_unshift($amount11, $n);


$query = $conn->query("
    
SELECT 'january' AS monthname, SUM(DEPENSES_JANVIER) AS amount, 1 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'February' AS monthname, SUM(DEPENSES_FEVRIER) AS amount, 2 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'March' AS monthname, SUM(DEPENSES_MARS) AS amount, 3 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'April' AS monthname, SUM(DEPENSES_AVRIL) AS amount, 4 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'May' AS monthname, SUM(DEPENSES_MAI) AS amount, 5 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'June' AS monthname, SUM(DEPENSES_JUIN) AS amount, 6 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'July' AS monthname, SUM(DEPENSES_JUILLET) AS amount, 7 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'August' AS monthname, SUM(DEPENSES_AOUT) AS amount, 8 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'September' AS monthname, SUM(DEPENSES_SEPTEMBRE) AS amount, 9 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'October' AS monthname, SUM(DEPENSES_OCTOBRE) AS amount, 10 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'November' AS monthname, SUM(DEPENSES_NOVEMBRE) AS amount, 11 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
UNION ALL
SELECT 'December' AS monthname, SUM(DEPENSES_DECEMBRE) AS amount, 12 AS monthnum FROM EE$a2 WHERE INTITULE_RUBRIQUE = 'SOMME'
ORDER BY monthnum;

");


$amount2 = [];

foreach ($query as $data) {
   
    $amount2[] = $data['amount'];
}


$n='';
array_unshift($amount2, $n);
$tev1=[];


$tev1 = [
    ($amount11[0] == 0) ? 0 : (floatval($amount2[0]) - floatval($amount11[0])) * 100 / floatval($amount11[1]),
    ($amount11[1] == 0) ? 0 : (floatval($amount2[1]) - floatval($amount11[1])) * 100 / floatval($amount11[1]),
    ($amount11[2] == 0) ? 0 : (floatval($amount2[2]) - floatval($amount11[2])) * 100 / floatval($amount11[2]),
    ($amount11[3] == 0) ? 0 : (floatval($amount2[3]) - floatval($amount11[3])) * 100 / floatval($amount11[3]),
    ($amount11[4] == 0) ? 0 : (floatval($amount2[4]) - floatval($amount11[4])) * 100 / floatval($amount11[4]),
    ($amount11[5] == 0) ? 0 : (floatval($amount2[5]) - floatval($amount11[5])) * 100 / floatval($amount11[5]),
    ($amount11[6] == 0) ? 0 : (floatval($amount2[6]) - floatval($amount11[6])) * 100 / floatval($amount11[6]),
    ($amount11[7] == 0) ? 0 : (floatval($amount2[7]) - floatval($amount11[7])) * 100 / floatval($amount11[7]),
    ($amount11[8] == 0) ? 0 : (floatval($amount2[8]) - floatval($amount11[8])) * 100 / floatval($amount11[8]),
    ($amount11[9] == 0) ? 0 : (floatval($amount2[9]) - floatval($amount11[9])) * 100 / floatval($amount11[9]),
    ($amount11[10] == 0) ? 0 : (floatval($amount2[10]) - floatval($amount11[10])) * 100 / floatval($amount11[10]),
    ($amount11[11] == 0) ? 0 : (floatval($amount2[11]) - floatval($amount11[11])) * 100 / floatval($amount11[11]),
    ($amount11[12] == 0) ? 0 : (floatval($amount2[12]) - floatval($amount11[12])) * 100 / floatval($amount11[11])
];


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique de Taux d'Évolution</title>
    
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <!-- Canvas pour afficher le graphique -->
    <canvas id="evolutionChart" width="500" height="200"></canvas>

    <!-- Script pour créer le graphique -->
    <script>
        // Assurez-vous que le DOM est chargé avant d'exécuter le script
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('evolutionChart').getContext('2d');

            // Données de l'évolution (exemple fictif)
            const evolutionData = {
                labels: ['','Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin','juillet','aout','septembre','octobre','novembre','decembre'],  // Mois de l'année
                datasets: [{
                    label: 'Taux d\'Évolution (%)',
                    data: <?php echo json_encode($tev1); ?>,  // Exemple de taux d'évolution par mois
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: false,  // Pas de remplissage sous la ligne
                    tension: 0.1  // Tension de la ligne pour une courbe plus lisse
                }]
            };

            // Configuration du graphique
            const config = {
                type: 'line',
                data: evolutionData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,  // L'axe Y commence à 0
                            title: {
                                display: true,
                                text: 'Taux d\'Évolution (%)'  // Titre de l'axe Y
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Mois'  // Titre de l'axe X
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'  // Position de la légende
                        }
                    }
                }
            };

            // Création du graphique
            const evolutionChart = new Chart(ctx, config);
        });
    </script>
</body>
</html>
