<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
echo"  <header>
        <nav class='navbar'>
            <div class='logo'>
               <a style=' height: 20px; width: 30px; background-size: cover; background-image: url(logo.png);' href='https://www.onda.ma/'></a>
            </div>
            <div class='menu'>
                <a href='index.html'>Home</a>
                <a href='verify.html'>Insertion</a>
                <a href='parannee.php'>Graphs</a>
                <a href='comparaison.php'>comparer</a>
                <div class='dropdown'>
                    <a href='#' class='dropbtn'>More</a>
                    <div class='dropdown-content'>
                       <a href='contact.html'>contactez nous</a>
                        <a href='about.html'>a propos</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>";
    echo"<footer class='footer'>
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>";
$sql="SELECT * FROM `ee2024`";
$result=$conn->query($sql);
$n=$result->num_rows;
if($result->num_rows>0){
  
    echo"<table border='1'>";
    echo"<tr><th>rubrique</th><th id='intitule'>intitule rubrique</th><th>dotation 2024</th><th>rallonge</th><th>depenses janvier</th><th>depenses fevrier</th><th>depenses mars</th><th>depenses avril</th><th>depenses mai</th><th>depenses juin</th><th>depenses juillet</th><th>depenses aout</th><th>depenses septembre</th><th>depenses octobre</th><th>depnses novembre</th><th>depnses decmbre</th><th>total depenses</th><th>reliquat</th></tr>";
    $index = 1; 
  
    while ($row = $result->fetch_assoc()) {
        echo "<form action='update.php' method='post'>";
        if($row["RUBRIQUE"] =='99999'){
            echo "<tr style='display: none;'>";
           }
       
       else {
       
        echo "<tr>";}
        if($row["TYPE"]=='SR'){
        echo "<td  name='rub[$index]'>" . $row["RUBRIQUE"] . "</td>";
        echo "<td id='intitule'>" . $row["INTITULE_RUBRIQUE"] . "</td>";
        echo "<td><input  type='number' id='D[$index]' name='D[$index]' value='" . $row["DOTATION_2024"] . "'></td>";
        echo "<td><input type='number' id='r[$index]' name='r[$index]' value='" . $row["RALLONGE"] . "'></td>";
        echo "<td><input type='number' id='d1[$index]' name='d1[$index]' value='" . $row["DEPENSES_JANVIER"] . "'></td>";
        echo "<td><input type='number' name='d2[$index]' id='d2[$index]' value='" . $row["DEPENSES_FEVRIER"] . "'></td>";
        echo "<td><input type='number' name='d3[$index]' id='d3[$index]' value='" . $row["DEPENSES_MARS"] . "'></td>";
        echo "<td><input type='number' name='d4[$index]' id='d4[$index]' value='" . $row["DEPENSES_AVRIL"] . "'></td>";
        echo "<td><input type='number' name='d5[$index]' id='d5[$index]' value='" . $row["DEPENSES_MAI"] . "'></td>";
        echo "<td><input type='number' id='d6[$index]' name='d6[$index]' value='" . $row["DEPENSES_JUIN"] . "'></td>";
        echo "<td><input type='number' id='d7[$index]' name='d7[$index]' value='" . $row["DEPENSES_JUILLET"] . "'></td>";
        echo "<td><input type='number' id='d8[$index]' name='d8[$index]' value='" . $row["DEPENSES_AOUT"] . "'></td>";
        echo "<td><input type='number' id='d9[$index]' name='d9[$index]' value='" . $row["DEPENSES_SEPTEMBRE"] . "'></td>";
        echo "<td><input type='number' id='d10[$index]' name='d10[$index]' value='" . $row["DEPENSES_OCTOBRE"] . "'></td>";
        echo "<td><input type='number' id='d11[$index]' name='d11[$index]' value='" . $row["DEPENSES_NOVEMBRE"] . "'></td>";
        echo "<td><input type='number' id='d12[$index]' name='d12[$index]' value='" . $row["DEPENSES_DECEMBRE"] . "'></td>";
        echo "<td>". $row["TOTAL_DEPENSES"] ."</td>";
        echo "<td>". $row["RELIQUAT"] ."</td>";
        echo "<td style='display: none;'><input  type='number' id='rub[$index]' name='rub[$index]' value='" . $row["RUBRIQUE"] . "'></td>";
        echo "<td  style='display: none;'><input  type='text' id='type[$index]' name='type[$index]' value='" . $row["TYPE"] . "'></td>";
        
    }
    else{
        echo "<td style='background-color: yellow;' name='rub[$index]'>" . $row["RUBRIQUE"] . "</td>";
        echo "<td style='background-color: yellow;' id='intitule'>" . $row["INTITULE_RUBRIQUE"] . "</td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='D[$index]' name='D[$index]' value='" . $row["DOTATION_2024"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='r[$index]' name='r[$index]' value='" . $row["RALLONGE"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d1[$index]' name='d1[$index]' value='" . $row["DEPENSES_JANVIER"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' name='d2[$index]' id='d2[$index]' value='" . $row["DEPENSES_FEVRIER"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' name='d3[$index]' id='d3[$index]' value='" . $row["DEPENSES_MARS"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' name='d4[$index]' id='d4[$index]' value='" . $row["DEPENSES_AVRIL"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' name='d5[$index]' id='d5[$index]' value='" . $row["DEPENSES_MAI"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d6[$index]' name='d6[$index]' value='" . $row["DEPENSES_JUIN"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d7[$index]' name='d7[$index]' value='" . $row["DEPENSES_JUILLET"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d8[$index]' name='d8[$index]' value='" . $row["DEPENSES_AOUT"] . "'readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d9[$index]' name='d9[$index]' value='" . $row["DEPENSES_SEPTEMBRE"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d10[$index]' name='d10[$index]' value='" . $row["DEPENSES_OCTOBRE"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d11[$index]' name='d11[$index]' value='" . $row["DEPENSES_NOVEMBRE"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'><input style='background-color: yellow;' type='number' id='d12[$index]' name='d12[$index]' value='" . $row["DEPENSES_DECEMBRE"] . "' readonly></td>";
        echo "<td style='background-color: yellow;'>". $row["TOTAL_DEPENSES"] ."</td>";
        echo "<td style='background-color: yellow;'>". $row["RELIQUAT"] ."</td>";
        echo "<td  style='display: none;'><input  type='number' id='rub[$index]' name='rub[$index]' value='" . $row["RUBRIQUE"] . "'></td>";
        echo "<td  style='display: none;'><input  type='text' id='type[$index]' name='type[$index]' value='" . $row["TYPE"] . "'></td>";
    }
        echo "</tr>";
        echo "<input type='hidden' name='index' value='$index'>"; 
       
        $index++; 
    }}
    
    echo "<button id='submit' class='btn' type='submit'>Envoyer</button>";
    echo "</form>";

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      #submit{
        margin-top: 100px;
        margin-left: 450px;
      }
        body {
    font-family: 'Roboto', sans-serif;
    color: #333;
    background-color: #f4f4f4;
  
}
        input{
            height: 15px;
            width: 50px;
            border: none;
            font-size: 10px;
            box-sizing: border-box; 
            border-radius:unset;
        }
        td{
            height: 15px;
            font-size: 10px;
            width: 50px;
          
           
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 30px;
          
        }

        #intitule{
width: 200px;
font-size: 10px;

        }
        th{
            background-color: blue;
            font-size: 10px;
            width: 200px;
            width: 50px;
            color: azure;
         
        }
        tr{
            height: 20px;
            
        }
        
        button{
            height: 30px;
            width: 200px;
            font-size: large;
          text-align: center;
            border-radius: 10px;
        
        }
        
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
            margin: 0;
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
        
    </style>
</head>
<body>

</body>
</html>
