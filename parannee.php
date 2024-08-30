<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

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
h1{
    text-align: center;
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
            margin-top: 60px; /* Adjust for fixed header */
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

        footer {
            background-color: #003d7a;
            color: #ffffff;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        /* Accessibility improvements */
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
        $query = $conn->query("SELECT annee FROM annees");
        ?>
        <h1>Choisissez l'année</h1><br>
        <form action='rubglob.php' method='post'>
            <select name='annee' id='annee'>
                <?php foreach ($query as $data): ?>
                    <option value='<?php echo htmlspecialchars($data['annee']); ?>'><?php echo htmlspecialchars($data['annee']); ?></option>
                <?php endforeach; ?>
            </select><br>
            <button id='submit' class='btn' type='submit'>Envoyer</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Budget Management. All rights reserved.</p>
    </footer>
   
</body>
</html>
