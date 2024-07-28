<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
$id=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['D'] as $index => $value) {
        $id++;
        $dotation_2024[$index] = $_POST['D'][$index];
        $rallonge[$index] = $_POST['r'][$index];
        $depenses_janvier[$index] = $_POST['d1'][$index];
        $depenses_fevrier[$index] = $_POST['d2'][$index];
        $depenses_mars[$index] = $_POST['d3'][$index];
        $depenses_avril[$index] = $_POST['d4'][$index];
        $depenses_mai[$index] = $_POST['d5'][$index];
        $depenses_juin[$index] = $_POST['d6'][$index];
        $depenses_juillet[$index] = $_POST['d7'][$index];
        $depenses_aout[$index] = $_POST['d8'][$index];
        $depenses_septembre[$index] = $_POST['d9'][$index];
        $depenses_octobre[$index] = $_POST['d10'][$index]; 
        $depenses_novembre[$index] = $_POST['d11'][$index];
        $depenses_decembre[$index] = $_POST['d12'][$index];
        $total_depenses[$index]=$depenses_janvier[$index] + $depenses_fevrier[$index] +$depenses_mars[$index] +$depenses_avril[$index]+$depenses_mai[$index]+$depenses_juin[$index]+$depenses_juillet[$index]+$depenses_aout[$index]+$depenses_septembre[$index]+$depenses_octobre[$index]+$depenses_novembre[$index]+$depenses_decembre[$index];
        $reliquat[$index] =  $dotation_2024[$index]- $total_depenses[$index];
        function email ($dot,$rm,$r){
$m=$dot/12;
$mr=$r/$rm;
if($mr<$m){
  $to = "elmehdielmhadri@gmail.com";
$subject = "alert";
$message = "bonjour, le reste de la dotation nest pas sufisant pour le reste des mois.";
$headers = "From: elmhadrielmahdi@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email sending failed.";
}
}
        }
if($depenses_janvier[$index] && !$depenses_fevrier[$index] && !$depenses_mars[$index] && !$depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
email( $dotation_2024[$index],11,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && !$depenses_mars[$index] && !$depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],10,$reliquat[$index]); 
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && !$depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],9,$reliquat[$index]);
}

if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],8,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],7,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],6,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],5,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],4,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  $depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],3,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  $depenses_septembre[$index] &&  $depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],2,$reliquat[$index]);
}
if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  $depenses_septembre[$index] &&  $depenses_octobre[$index] &&  $depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  email( $dotation_2024[$index],1,$reliquat[$index]);
}

         $sql=" UPDATE `budget_table`
          SET `DOTATION_2024`=' $dotation_2024[$index]',
          `RALLONGE`=' $rallonge[$index]',
          `DEPENSES_JANVIER`='$depenses_janvier[$index]',
          `DEPENSES_FEVRIER`=' $depenses_fevrier[$index]',
          `DEPENSES_MARS`='$depenses_mars[$index]',
          `DEPENSES_AVRIL`='$depenses_avril[$index]',
          `DEPENSES_MAI`=' $depenses_mai[$index]',
          `DEPENSES_JUIN`='$depenses_juin[$index]',
          `DEPENSES_JUILLET`='$depenses_juillet[$index] ',
          `DEPENSES_AOUT`='  $depenses_aout[$index]',
          `DEPENSES_SEPTEMBRE`='$depenses_septembre[$index]',
          `DEPENSES_OCTOBRE`='$depenses_octobre[$index] ',
          `DEPENSES_NOVEMBRE`='$depenses_novembre[$index]',
          `DEPENSES_DECEMBRE`='$depenses_decembre[$index]',
          `TOTAL_DEPENSES`='$total_depenses[$index]',
          `RELIQUAT`='$reliquat[$index]' WHERE id='$id'
          
         ";
          
          if($conn->query($sql) === TRUE){
            header('Location: index.html');
          }
          else{
            echo"erreur";
          }
    }
}

  $conn->close();
?>
