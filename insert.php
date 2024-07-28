<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
$sql="SELECT * FROM budget_table";
$result=$conn->query($sql);
$n=$result->num_rows;
if($result->num_rows>0){
    echo"<table border='1'>";
    echo"<tr><th>rubrique</th><th>intitule rubrique</th><th>dotation 2024</th><th>rallonge</th><th>depenses janvier</th><th>depenses fevrier</th><th>depenses mars</th><th>depenses avril</th><th>depenses mai</th><th>depenses juin</th><th>depenses juillet</th><th>depenses aout</th><th>depenses septembre</th><th>depenses octobre</th><th>depnses novembre</th><th>depnses decmbre</th><th>total depenses</th><th>reliquat</th></tr>";
    $index = 1; 
  
    while ($row = $result->fetch_assoc()) {
        echo "<form action='update.php' method='post'>";
        echo "<tr>";
        echo "<td>" . $row["Rubrique"] . "</td>";
        echo "<td>" . $row["intitule_rubrique"] . "</td>";
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
        echo "</tr>";
        echo "<input type='hidden' name='index' value='$index'>"; 
    
        $index++; 
    }}

    echo "<button type='submit'>Submit</button>";
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
        input{
            height: 60px;
            width: 70px;
        }
        td{
            height: 60px;
        }
    </style>
</head>
<body>
  
</body>
</html>
