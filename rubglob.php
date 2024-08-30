<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
$a = $_POST["annee"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Réinitialisation et style de base */
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
        
        select {
            width: 200px;
            height: 50px;
            font-size: large;
            border-radius: 10px;
            text-align: center;
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
            margin: 0;
            font-size: 14px;
        }
    </style>
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
        <?php 
       
        $query = $conn->query("SELECT INTITULE_RUBRIQUE FROM EE$a");
        echo "<h1>Choisissez une rubrique pour afficher son graphe</h1>";
        echo "<form action='graphe.php' method='post'>";
        echo "<select name='INTITULE_RUBRIQUE'>";
        foreach($query as $data){
            if($data['INTITULE_RUBRIQUE'] == 'SOMME'){
                echo "<option style='display: none;' value='$data[INTITULE_RUBRIQUE]'>$data[INTITULE_RUBRIQUE]</option>";
            } else {
                echo "<option value='$data[INTITULE_RUBRIQUE]'>$data[INTITULE_RUBRIQUE]</option>";
            }
        }
        echo "</select>";
        echo "<input type='hidden' name='annee' value='$a'>";
        echo "<button class='btn' type='submit'>Etat de consommation du budget</button>";
        echo "</form>";
        echo "<form action='graphe.php' method='post'>";
        echo "<input type='hidden' name='annee' value='$a'>";
        echo "<button class='btn' name='INTITULE_RUBRIQUE' value='SOMME'>Etat de consommation du budget global</button>";
        echo "</form>";
        ?>
    </div>
    
    <footer class="footer">
        <p>&copy; 2024 Budget Management. All rights reserved.</p>
    </footer>
    
    
</body>
</html>
