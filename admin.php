<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

// Create a connection
$conn = new mysqli($server, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Get user input
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$code = $_POST["code"];

// Hash the password/code
$hashedCode = password_hash($code, PASSWORD_BCRYPT);
// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `admin`(`nomadmin`, `prenomadmin`, `code`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nom, $prenom, $hashedCode);

// Execute the statement
if ($stmt->execute()) {
    echo "Operation réussie";
} else {
    echo "Erreur: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
