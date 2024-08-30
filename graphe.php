<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        
        header {
            background-color: #003d7a;
            color: #ffffff;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
        .navbar {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .navbar a {
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            font-size: 16px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
        }
        
        .navbar a:hover, .navbar .dropdown:hover .dropbtn {
            background-color: #002a5d;
            color: #ffffff;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            z-index: 1000;
            top: 100%;
            left: 0;
        }
        
        .dropdown-content a {
            color: #003d7a;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        .container {
            padding: 60px 20px;
            max-width: 1200px;
            margin: auto;
        }
        
        .btn {
            background-color: #003d7a;
            color: #ffffff;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .btn:hover {
            background-color: #002a5d;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        
        .footer {
            background-color: #003d7a;
            color: #ffffff;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
           
        }
        
        .footer p {
           
            font-size: 14px;
        }
        
        /* Améliorations pour l’accessibilité */
        a {
            color: #003d7a;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        a:hover {
            color: #002a5d;
        }
        
        button:focus {
            outline: 3px solid #003d7a;
            outline-offset: 2px;
        }
        
        input:focus, textarea:focus {
            border-color: #003d7a;
            box-shadow: 0 0 4px rgba(0, 61, 122, 0.5);
        }
       #container{
        width: 100%;
        height: 300px;
       }
    </style>
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Website</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
 <header>
        <nav class='navbar'>
            <div class='logo'>
            <a style=" height: 20px; width: 30px; background-size: cover; background-image: url(logo.png);" href="https://www.onda.ma/"></a>
            </div>
            <div class='menu'>
                <a href='index.html'>Home</a>
                <a href='verify.html'>Insertion</a>
                <a href='parannee.php'>Graphs</a>
                <a href="comparaison.php">comparer</a>
                <div class='dropdown'>
                    <a href='#' class='dropbtn'>More</a>
                    <div class='dropdown-content'>
                       <a href='contact.html'>contactez nous</a>
                        <a href='about.html'>a propos</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container">
       
    </div>
   
   
    
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>


</head>
<?php 
$con = new mysqli('localhost', 'root', '', 'budget');

$a=$_POST["annee"];
$intitule=$_POST["INTITULE_RUBRIQUE"];

if($intitule=='SOMME'){
    echo"<h1> le graphe pour la consommation global</h1>";
}
else{
echo"<h1>le graphe pour la rubrique $intitule</h1>";
}

$query = $con->query("
    
SELECT 'january' AS monthname, SUM(DEPENSES_JANVIER) AS amount, 1 AS monthnum FROM EE$a WHERE INTITULE_RUBRIQUE = '$intitule'
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
$s="SELECT DOTATION_$a FROM EE$a where INTITULE_RUBRIQUE='$intitule'";
$result=$con->query($s);
$row = $result->fetch_assoc();
$dot = $row['DOTATION_'.$a];
$amount = [];
$amount2=[];
foreach ($query as $data) {
   
    $amount[] = $data['amount'];
}
$amount2 = [($amount[0] == 0) ? null :$dot - $amount[0] ,($amount[1] == 0) ? null :$dot - $amount[0] - $amount[1] ,($amount[2] == 0) ? null : $dot - $amount[0]- $amount[1]- $amount[2] ,($amount[3] == 0) ? null : $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3] ,($amount[4] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4] ,($amount[5] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5] , ($amount[6] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6] ,  ($amount[7] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7] , ($amount[8] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8], ($amount[9] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8]- $amount[9],($amount[10] == 0) ? null :$dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8]- $amount[9]- $amount[10],($amount[11] == 0) ? null : $dot - $amount[0]- $amount[1]- $amount[2]- $amount[3]- $amount[4]- $amount[5]- $amount[6]- $amount[7]- $amount[8]- $amount[9]- $amount[10]-$amount[11]];

array_unshift($amount2, $dot);
$n='';
array_unshift($amount, $n);

?>

<body>
    
    <div id="container" style="width: 800px;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
      
    const labels = ['', 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
const data = {
    labels: labels,
    datasets: [
        {
            type: 'bar',
            label: 'Depenses des mois',
            data: <?php echo json_encode($amount); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1,
            barThickness: 20, // Adjust thickness as needed
            categoryPercentage: 0.8, // Adjust to control bar width within category
        },
        {
            type: 'bar',
            label: 'barres de reste de la dotation dans chaque mois',
            data: <?php echo json_encode($amount2); ?>,
            backgroundColor: 'rgba(0, 99, 255, 0.5)',
            borderColor: 'rgba(0, 99, 255, 1)',
            borderWidth: 1,
            barThickness: 20, // Adjust thickness as needed
            categoryPercentage: 0.8, // Adjust to control bar width within category
        },
        {
            type: 'line',
            label: 'Ligne pour le reste de la dotation dans chaque mois',
            data: <?php echo json_encode($amount2); ?>,
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgb(54, 162, 235)',
            fill: false,
            tension: 0.1,
            pointStyle: 'circle', // Style the points
            pointRadius: 5, // Size of the points on the line
            pointBackgroundColor: 'rgb(54, 162, 235)', // Color of the points
            pointBorderColor: 'rgb(54, 162, 235)',
            order: 1
        }
    ]
};

const config = {
    data: data,
    options: {
        scales: {
            x: {
                stacked: false, // Bars will be placed next to each other
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
</body>
</html>