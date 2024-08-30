<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
$sql="SELECT * FROM annees";
$result=$conn->query($sql);
$sql="SELECT INTITULE_RUBRIQUE FROM ee2024";
$result2=$conn->query($sql);
//form pour comparaison global des annees

echo"<br><form style='margin-top: 50px;' action='cpgr.php' method='post'>
choisissez las annees pour comparer leur valeurs globales<br>";
echo"<input name='intitule' value='SOMME' style='display:none;'>";
foreach($result as $data){
   echo"<label>
    <input type='checkbox' name='options[]' value='$data[annee]'>$data[annee]
</label>";}
echo"<button type='submit'>Submit</button></form>";
//FORM POUR COMP PAR RUB
echo"<form action='cpgr.php' method='post'>
choisissez la rubrique et les annees pour comparer<br>";
echo"<select name='intitule'>";
foreach($result2 as $data){ if($data["INTITULE_RUBRIQUE"]!=='SOMME')
echo"<option VALUE='$data[INTITULE_RUBRIQUE]'> $data[INTITULE_RUBRIQUE]";
}
echo"</select>";
foreach($result as $data){
   echo"<label>
    <input type='checkbox' name='options[]' value='$data[annee]'>$data[annee]
</label>";}
echo"<button type='submit'>Submit</button></form>";
//pour le taux devolution
echo"<form style='height:150px;' action='tev.php' method='post'>
choisissez deux annee pour le taux d'evolution<br>";
echo"<select name='a1'>";
foreach($result as $data){
  echo"
    <option value='$data[annee]'>$data[annee]";}
    echo"</select>";
    echo"<select name='a2'>";
foreach($result as $data){
  echo"
    <option value='$data[annee]'>$data[annee]";}
    echo"</select><br>";
echo"<button type='submit'>Submit</button></form>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Form Styles */
form {
    background-color: #ffffff; /* White background for the form */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    padding: 20px; /* Spacing inside the form */
    margin: 20px 0; /* Margin around the form */
}

/* Form Heading */
form h2 {
    color: #003d7a; /* Match the header color */
    margin-bottom: 15px; /* Space below the heading */
}

/* Form Label */
form label {
    display: block; /* Make labels block elements for spacing */
    margin-bottom: 10px; /* Space below each label */
    font-size: 16px; /* Font size for labels */
    color: #333; /* Dark text color */
}

/* Form Inputs */
form input[type="checkbox"] {
    margin-right: 10px; /* Space between checkbox and label */
}

form select, form input[type="submit"], form button {
    background-color: #003d7a; /* Match the header color */
    color: #ffffff; /* White text */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 15px; /* Padding inside inputs and buttons */
    font-size: 16px; /* Font size for inputs and buttons */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s; /* Smooth transition */
}

form select:hover, form input[type="submit"]:hover, form button:hover {
    background-color: #002a5d; /* Darker shade on hover */
}

form input[type="submit"], form button {
    display: inline-block; /* Align buttons in line */
    margin-top: 10px; /* Space above buttons */
    cursor: pointer; /* Pointer cursor on hover */
}

form input[type="text"], form input[type="number"], form textarea {
    width: 100%; /* Full width inputs */
    padding: 10px; /* Padding inside inputs */
    border: 1px solid #ddd; /* Light border */
    border-radius: 5px; /* Rounded corners */
    margin-bottom: 15px; /* Space below inputs */
    font-size: 16px; /* Font size for inputs */
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        padding: 15px; /* Reduce padding on smaller screens */
    }

    form h2 {
        font-size: 20px; /* Smaller font size for headings on small screens */
    }

    form input[type="submit"], form button {
        width: 100%; /* Full-width buttons on small screens */
    }
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
            padding: 80px 20px; /* Adjust for header */
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 70vh; /* To fill the screen */
        }

        .btn {
            position: relative;
            width: 200px;
            height: 200px;
            background-size: cover;
            background-position: center;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn::before {
            content: attr(data-title); /* Display title */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn:hover::before {
            opacity: 1; /* Show title on hover */
        }

        .btn:hover {
            transform: translateY(-5px); /* Lift effect */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        #insert {
            background-image: url('inserttab.PNG'); /* Path to your image */
        }

        #graphe {
            background-image: url('graphe.PNG'); /* Path to your image */
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
        <nav class="navbar">
            <div class="logo">
                <a style=" height: 20px; width: 30px; background-size: cover; background-image: url(logo.png);" href="https://www.onda.ma/"></a>
            </div>
            <div class="menu">
                <a href="index.html">Home</a>
                <a href="verify.html">Insertion</a>
                <a href="parannee.php">Graphs</a>
                <a href="comparaison.php">comparer</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn">More</a>
                    <div class="dropdown-content">
                       
                        
                        <a href="contact.html">contactez nous</a>
                        <a href="about.html">a propos</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <footer class="footer">
        <p>&copy; 2024 ONDA. All rights reserved.</p>
    </footer>
   

</body>
</html>