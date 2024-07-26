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
if($depenses_janvier>0){}
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
          
          SET `amount`='$depenses_janvier[$index]' WHERE id='1',
          SET `amount`='$depenses_fevrier[$index]' WHERE id='2',
          SET `amount`='$depenses_mars[$index]' WHERE id='3',
          SET `amount`='$depenses_avril[$index]' WHERE id='4',
          SET `amount`='$depenses_mai[$index]' WHERE id='5',
          SET `amount`='$depenses_juin[$index]' WHERE id='6',
          SET `amount`='$depenses_juillet[$index]' WHERE id='7',
          SET `amount`='$depenses_aout[$index]' WHERE id='8',
          SET `amount`='$depenses_septembre[$index]' WHERE id='9',
          SET `amount`='$depenses_octobre[$index]' WHERE id='10',
          SET `amount`='$depenses_novembre[$index]' WHERE id='11',
          SET `amount`='$depenses_decembre[$index]' WHERE id='12',";
          
          if($conn->query($sql) === TRUE){
            echo "done: $id";
          }
          else{
            echo"erreur";
          }
    }
}

  $conn->close();
?>