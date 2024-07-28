<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
$query=$conn->query("SELECT Rubrique FROM budget_table");

echo"<form action='graphe2.php' method='post'>";
echo"<select name='rub'>";
foreach($query as $data){
 echo " <option value='$data[Rubrique]' >$data[Rubrique]</option> ";

}
echo"</select>";
echo"<button value='submit'>submit</button>";
echo"</form>"
?>
