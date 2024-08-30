<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$nom = $_POST['nomadmin'];
$prenom = $_POST['prenomadmin'];
$code = $_POST['code'];

// Prepare the SQL statement
$sql = $conn->prepare("SELECT `code` FROM `admin` WHERE `nomadmin` = ? AND `prenomadmin` = ?");
$sql->bind_param("ss", $nom, $prenom);

// Execute the statement
$sql->execute();
$sql->bind_result($hashedCode);

// Fetch the result
if ($sql->fetch()) {
    // Verify the password
    if (password_verify($code, $hashedCode)) {
    header("location:insert.php");
    } else {
        echo "Invalid password.";
    }
} else {
    // No matching user found
    echo "User not found.";
}

// Close the statement and connection
$sql->close();
$conn->close();
?>
