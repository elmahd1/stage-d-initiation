<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$prenom = $_POST["prenomadmin"];
$nom = $_POST["nomadmin"];
$code = $_POST["code"];

$sql = "SELECT * FROM admin WHERE prenomadmin='$prenom' AND nomadmin='$nom' AND code='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header('Location: insert.php');
    exit();
} else {
    echo "Données introuvables";
}

$conn->close();
?>
