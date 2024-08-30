<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "budget";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/stage folder/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/stage folder/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/stage folder/PHPMailer/src/SMTP.php';
$conn = new mysqli($server, $user, $password, $db);
$rub;
$TYPE;
echo"  <header>
        <nav class='navbar'>
            <div class='logo'>
             <a style=' height: 20px; width: 30px; background-size: cover; background-image: url(logo.png);' href='https://www.onda.ma/'></a>
            </div>
            <div class='menu'>
                <a href='index.html'>Home</a>
                <a href='verify.html'>Insertion</a>
                <a href='parannee.php'>Graphs</a>
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
function eemail($dot, $rm, $r,$rub,$TYPE) {
if($TYPE!=='R'){
    $m = $dot / 12;
    $mr = $r / $rm;
    if ($mr < $m) {

 
      
      
      $mail = new PHPMailer(true);
      $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
      try {
          // Server settings
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'elmhadrielmahdi@gmail.com';
          $mail->Password = 'cbdt abcv ypzu ptdz';
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 587;
      
          // Recipients
          $mail->setFrom('elmhadrielmahdi@gmail.com', 'elmahdi');
          $mail->addAddress('elmehdielmhadri@gmail.com', 'elmahdi2');
      
          // Content
          $mail->isHTML(true);
          $mail->Subject = 'Alert Email';
          $mail->Body    = 'le reste de la dotation pour la rubrique '.$rub.' n est pas suffisant';
      
          $mail->send();
          echo '<script type="text/javascript">';
          echo 'alert("l email a ete bien envoye")';
          echo '</script>';
      } catch (Exception $e) { 
      echo '<script type="text/javascript">';
      echo 'alert("erreur pour lemail. Mailer Error: {$mail->ErrorInfo}")';
      echo '</script>';
      }
    }
  
}
}
echo"<h1>Revenez a la page precedente et actualisez la pour modifier</h1>";
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
 
$D=0;
$r=0;
$d1=0;
$d2=0;
$d3=0;
$d4=0;
$d5=0;
$d6=0;
$d7=0;
$d8=0;
$d9=0;
$d10=0;
$d11=0;
$d12=0;
$T=0;
$R=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    foreach ($_POST['D'] as $index => $value) {

$rub[$index]=$_POST["rub"][$index];
if($rub[$index]!=='99999'){
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
$TYPE[$index]=$_POST['type'][$index];
$total_depenses[$index]=$depenses_janvier[$index] + $depenses_fevrier[$index] +$depenses_mars[$index] +$depenses_avril[$index]+$depenses_mai[$index]+$depenses_juin[$index]+$depenses_juillet[$index]+$depenses_aout[$index]+$depenses_septembre[$index]+$depenses_octobre[$index]+$depenses_novembre[$index]+$depenses_decembre[$index];
$reliquat[$index] =  $dotation_2024[$index]- $total_depenses[$index];

if($TYPE[$index]=='SR'){
$D+=$dotation_2024[$index];
$r+=$rallonge[$index];
$d1+=$depenses_janvier[$index];
$d2+=$depenses_fevrier[$index];
$d3+=$depenses_mars[$index];
$d4+=$depenses_avril[$index];
$d5+=$depenses_mai[$index];
$d6+=$depenses_juin[$index];
$d7+=$depenses_juillet[$index];
$d8+=$depenses_aout[$index];
$d9+=$depenses_septembre[$index];
$d10+=$depenses_octobre[$index];
$d11+=$depenses_novembre[$index];
$d12+=$depenses_decembre[$index];
$T+=$total_depenses[$index];
$R+=$reliquat[$index];
}

$sql=" UPDATE `EE2024`
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
        `RELIQUAT`='$reliquat[$index]' WHERE id='$index'";
$result=$conn->query($sql); 
 
 if($depenses_janvier[$index] && !$depenses_fevrier[$index] && !$depenses_mars[$index] && !$depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
  eemail( $dotation_2024[$index],11,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && !$depenses_mars[$index] && !$depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],10,$reliquat[$index],$rub[$index],$TYPE[$index]); 
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && !$depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],9,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && !$depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],8,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  !$depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],7,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  !$depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],6,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  !$depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],5,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  !$depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],4,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  $depenses_septembre[$index] &&  !$depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],3,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  $depenses_septembre[$index] &&  $depenses_octobre[$index] &&  !$depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],2,$reliquat[$index],$rub[$index],$TYPE[$index]);
  }
  if($depenses_janvier[$index] && $depenses_fevrier[$index] && $depenses_mars[$index] && $depenses_avril[$index] && $depenses_mai[$index] &&  $depenses_juin[$index] &&  $depenses_juillet[$index] &&  $depenses_aout[$index] &&  $depenses_septembre[$index] &&  $depenses_octobre[$index] &&  $depenses_novembre[$index] &&  !$depenses_decembre[$index] ){
    eemail( $dotation_2024[$index],1,$reliquat[$index],$rub[$index],$TYPE[$index]);
    $m=$dotation_2024[$index]/12;
    if($reliquat[$index]>$m&&$TYPE[$index]=='SR'){
      
      $mail = new PHPMailer(true);
      $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
      try {
          // Server settings
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'elmhadrielmahdi@gmail.com';
          $mail->Password = 'cbdt abcv ypzu ptdz';
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 587;
      
          // Recipients
          $mail->setFrom('elmhadrielmahdi@gmail.com', 'elmahdi');
          $mail->addAddress('elmehdielmhadri@gmail.com', 'elmahdi2');
      $r=$rub[$index];
          // Content
          $mail->isHTML(true);
          $mail->Subject = 'Alert Email';
          $mail->Body    = 'le reste de la dotation doit etre consomme POUR LA rubrique '.$r.'';
      
          $mail->send();
          echo '<script type="text/javascript">';
          echo 'alert("l email a ete bien envoye")';
          echo '</script>';
      } catch (Exception $e) { 
      echo '<script type="text/javascript">';
      echo 'alert("erreur pour lemail. Mailer Error: {$mail->ErrorInfo}")';
      echo '</script>';
      }
    }
  }
}
else {
  $stmt = $conn->prepare("UPDATE `EE2024` SET 
  `DOTATION_2024` = ?, `RALLONGE` = ?, `DEPENSES_JANVIER` = ?, 
  `DEPENSES_FEVRIER` = ?, `DEPENSES_MARS` = ?, `DEPENSES_AVRIL` = ?, 
  `DEPENSES_MAI` = ?, `DEPENSES_JUIN` = ?, `DEPENSES_JUILLET` = ?, 
  `DEPENSES_AOUT` = ?, `DEPENSES_SEPTEMBRE` = ?, `DEPENSES_OCTOBRE` = ?, 
  `DEPENSES_NOVEMBRE` = ?, `DEPENSES_DECEMBRE` = ?, 
  `TOTAL_DEPENSES` = ?, `RELIQUAT` = ? 
  WHERE `RUBRIQUE` = '99999'");

$stmt->bind_param("ssssssssssssssss", $D, $r, $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11, $d12, $T, $R);
$stmt->execute();

}
         
          
    }

$s1="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[2]',
`RALLONGE`=' $rallonge[2]',
  `DEPENSES_JANVIER`='$depenses_janvier[2]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[2]',
  `DEPENSES_MARS`='$depenses_mars[2]',
  `DEPENSES_AVRIL`='$depenses_avril[2]',
  `DEPENSES_MAI`=' $depenses_mai[2]',
  `DEPENSES_JUIN`='$depenses_juin[2]',
  `DEPENSES_JUILLET`='$depenses_juillet[2]',
  `DEPENSES_AOUT`='$depenses_aout[2]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[2]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[2]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[2]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[2]',
  `TOTAL_DEPENSES`='$total_depenses[2]',
  `RELIQUAT`='$reliquat[2]'
where id='1' ";
$result1=$conn->query($s1);
$s2="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[4]',
`RALLONGE`=' $rallonge[4]',
  `DEPENSES_JANVIER`='$depenses_janvier[4]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[4]',
  `DEPENSES_MARS`='$depenses_mars[4]',
  `DEPENSES_AVRIL`='$depenses_avril[4]',
  `DEPENSES_MAI`=' $depenses_mai[4]',
  `DEPENSES_JUIN`='$depenses_juin[4]',
  `DEPENSES_JUILLET`='$depenses_juillet[4]',
  `DEPENSES_AOUT`='$depenses_aout[4]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[4]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[4]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[4]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[4]',
  `TOTAL_DEPENSES`='$total_depenses[4]',
  `RELIQUAT`='$reliquat[4]'
where id='3' ";
$result2=$conn->query($s2);
$s3="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[6]',
`RALLONGE`=' $rallonge[6]',
  `DEPENSES_JANVIER`='$depenses_janvier[6]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[6]',
  `DEPENSES_MARS`='$depenses_mars[6]',
  `DEPENSES_AVRIL`='$depenses_avril[6]',
  `DEPENSES_MAI`=' $depenses_mai[6]',
  `DEPENSES_JUIN`='$depenses_juin[6]',
  `DEPENSES_JUILLET`='$depenses_juillet[6]',
  `DEPENSES_AOUT`='$depenses_aout[6]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[6]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[6]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[6]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[6]',
  `TOTAL_DEPENSES`='$total_depenses[6]',
  `RELIQUAT`='$reliquat[6]'
where id='5' ";
$result3=$conn->query($s3);
$s4="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[8]',
`RALLONGE`=' $rallonge[8]',
  `DEPENSES_JANVIER`='$depenses_janvier[8]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[8]',
  `DEPENSES_MARS`='$depenses_mars[8]',
  `DEPENSES_AVRIL`='$depenses_avril[8]',
  `DEPENSES_MAI`=' $depenses_mai[8]',
  `DEPENSES_JUIN`='$depenses_juin[8]',
  `DEPENSES_JUILLET`='$depenses_juillet[8]',
  `DEPENSES_AOUT`='$depenses_aout[8]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[8]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[8]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[8]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[8]',
  `TOTAL_DEPENSES`='$total_depenses[8]',
  `RELIQUAT`='$reliquat[8]'
where id='7' ";
$result4=$conn->query($s4);
$s5="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[10]',
`RALLONGE`=' $rallonge[10]',
  `DEPENSES_JANVIER`='$depenses_janvier[10]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[10]',
  `DEPENSES_MARS`='$depenses_mars[10]',
  `DEPENSES_AVRIL`='$depenses_avril[10]',
  `DEPENSES_MAI`=' $depenses_mai[10]',
  `DEPENSES_JUIN`='$depenses_juin[10]',
  `DEPENSES_JUILLET`='$depenses_juillet[10]',
  `DEPENSES_AOUT`='$depenses_aout[10]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[10]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[10]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[10]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[10]',
  `TOTAL_DEPENSES`='$total_depenses[10]',
  `RELIQUAT`='$reliquat[10]'
where id='9' ";
$result5=$conn->query($s5);

$s6="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[12]+$dotation_2024[13],
`RALLONGE`=$rallonge[12]+$rallonge[13],
  `DEPENSES_JANVIER`=$depenses_janvier[12]+$depenses_janvier[13],
  `DEPENSES_FEVRIER`=$depenses_fevrier[12]+$depenses_fevrier[13],
  `DEPENSES_MARS`=$depenses_mars[12]+$depenses_mars[13],
  `DEPENSES_AVRIL`=$depenses_avril[12]+$depenses_avril[13],
  `DEPENSES_MAI`= $depenses_mai[12]+ $depenses_mai[13],
  `DEPENSES_JUIN`=$depenses_juin[12]+$depenses_juin[13],
  `DEPENSES_JUILLET`=$depenses_juillet[12]+$depenses_juillet[13],
  `DEPENSES_AOUT`=$depenses_aout[12]+$depenses_aout[13],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[12]+$depenses_septembre[13],
  `DEPENSES_OCTOBRE`=$depenses_octobre[12]+$depenses_octobre[13],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[12]+$depenses_novembre[13],
  `DEPENSES_DECEMBRE`=$depenses_decembre[12]+$depenses_decembre[13],
  `TOTAL_DEPENSES`=$total_depenses[12]+$total_depenses[13],
  `RELIQUAT`=$reliquat[12]+$reliquat[13]
where id='11' ";
$result6=$conn->query($s6);

$s7="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[15]+$dotation_2024[16],
`RALLONGE`=$rallonge[15]+$rallonge[16],
  `DEPENSES_JANVIER`=$depenses_janvier[15]+$depenses_janvier[16],
  `DEPENSES_FEVRIER`=$depenses_fevrier[15]+$depenses_fevrier[16],
  `DEPENSES_MARS`=$depenses_mars[15]+$depenses_mars[16],
  `DEPENSES_AVRIL`=$depenses_avril[15]+$depenses_avril[16],
  `DEPENSES_MAI`= $depenses_mai[15]+ $depenses_mai[16],
  `DEPENSES_JUIN`=$depenses_juin[15]+$depenses_juin[16],
  `DEPENSES_JUILLET`=$depenses_juillet[15]+$depenses_juillet[16],
  `DEPENSES_AOUT`=$depenses_aout[15]+$depenses_aout[16],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[15]+$depenses_septembre[16],
  `DEPENSES_OCTOBRE`=$depenses_octobre[15]+$depenses_octobre[16],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[15]+$depenses_novembre[16],
  `DEPENSES_DECEMBRE`=$depenses_decembre[15]+$depenses_decembre[16],
  `TOTAL_DEPENSES`=$total_depenses[15]+$total_depenses[16],
  `RELIQUAT`=$reliquat[15]+$reliquat[16]
where id='14' ";
$result7=$conn->query($s7);

$s8="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[18]+$dotation_2024[19],
`RALLONGE`=$rallonge[18]+$rallonge[19],
  `DEPENSES_JANVIER`=$depenses_janvier[18]+$depenses_janvier[19],
  `DEPENSES_FEVRIER`=$depenses_fevrier[18]+$depenses_fevrier[19],
  `DEPENSES_MARS`=$depenses_mars[18]+$depenses_mars[19],
  `DEPENSES_AVRIL`=$depenses_avril[18]+$depenses_avril[19],
  `DEPENSES_MAI`= $depenses_mai[18]+ $depenses_mai[19],
  `DEPENSES_JUIN`=$depenses_juin[18]+$depenses_juin[19],
  `DEPENSES_JUILLET`=$depenses_juillet[18]+$depenses_juillet[19],
  `DEPENSES_AOUT`=$depenses_aout[18]+$depenses_aout[19],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[18]+$depenses_septembre[19],
  `DEPENSES_OCTOBRE`=$depenses_octobre[18]+$depenses_octobre[19],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[18]+$depenses_novembre[19],
  `DEPENSES_DECEMBRE`=$depenses_decembre[18]+$depenses_decembre[19],
  `TOTAL_DEPENSES`=$total_depenses[18]+$total_depenses[19],
  `RELIQUAT`=$reliquat[18]+$reliquat[19]
where id='17' ";
$result8=$conn->query($s8);

$s9="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[21]+$dotation_2024[22]+$dotation_2024[23],
`RALLONGE`=$rallonge[21]+$rallonge[22]+$rallonge[23],
  `DEPENSES_JANVIER`=$depenses_janvier[21]+$depenses_janvier[22]+$depenses_janvier[23],
  `DEPENSES_FEVRIER`=$depenses_fevrier[21]+$depenses_fevrier[22]+$depenses_fevrier[23],
  `DEPENSES_MARS`=$depenses_mars[21]+$depenses_mars[22]+$depenses_mars[23],
  `DEPENSES_AVRIL`=$depenses_avril[21]+$depenses_avril[22]+$depenses_avril[23],
  `DEPENSES_MAI`= $depenses_mai[21]+ $depenses_mai[22]+ $depenses_mai[23],
  `DEPENSES_JUIN`=$depenses_juin[21]+$depenses_juin[22]+$depenses_juin[23],
  `DEPENSES_JUILLET`=$depenses_juillet[21]+$depenses_juillet[22]+$depenses_juillet[23],
  `DEPENSES_AOUT`=$depenses_aout[21]+$depenses_aout[22]+$depenses_aout[23],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[21]+$depenses_septembre[22]+$depenses_septembre[23],
  `DEPENSES_OCTOBRE`=$depenses_octobre[21]+$depenses_octobre[22]+$depenses_octobre[23],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[21]+$depenses_novembre[22]+$depenses_novembre[23],
  `DEPENSES_DECEMBRE`=$depenses_decembre[21]+$depenses_decembre[22]+$depenses_decembre[23],
  `TOTAL_DEPENSES`=$total_depenses[21]+$total_depenses[22]+$total_depenses[23],
  `RELIQUAT`=$reliquat[21]+$reliquat[22]+$reliquat[23]
where id='20' ";
$result9=$conn->query($s9);

$s10="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[25]+$dotation_2024[26],
`RALLONGE`=$rallonge[25]+$rallonge[26],
  `DEPENSES_JANVIER`=$depenses_janvier[25]+$depenses_janvier[26],
  `DEPENSES_FEVRIER`=$depenses_fevrier[25]+$depenses_fevrier[26],
  `DEPENSES_MARS`=$depenses_mars[25]+$depenses_mars[26],
  `DEPENSES_AVRIL`=$depenses_avril[25]+$depenses_avril[26],
  `DEPENSES_MAI`= $depenses_mai[25]+ $depenses_mai[26],
  `DEPENSES_JUIN`=$depenses_juin[25]+$depenses_juin[26],
  `DEPENSES_JUILLET`=$depenses_juillet[25]+$depenses_juillet[26],
  `DEPENSES_AOUT`=$depenses_aout[25]+$depenses_aout[26],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[25]+$depenses_septembre[26],
  `DEPENSES_OCTOBRE`=$depenses_octobre[25]+$depenses_octobre[26],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[25]+$depenses_novembre[26],
  `DEPENSES_DECEMBRE`=$depenses_decembre[25]+$depenses_decembre[26],
  `TOTAL_DEPENSES`=$total_depenses[25]+$total_depenses[26],
  `RELIQUAT`=$reliquat[25]+$reliquat[26]
where id='24' ";
$result10=$conn->query($s10);

$s11="UPDATE EE2024 SET
`DOTATION_2024`=    $dotation_2024[28]+$dotation_2024[29]+$dotation_2024[30]+$dotation_2024[31]+$dotation_2024[32]+$dotation_2024[33]+$dotation_2024[34],
`RALLONGE`=               $rallonge[28]+ $rallonge[29]+$rallonge[30]+$rallonge[31]+$rallonge[32]+$rallonge[33]+$rallonge[34],
  `DEPENSES_JANVIER`=$depenses_janvier[28]+$depenses_janvier[29]+$depenses_janvier[30]+$depenses_janvier[31]+$depenses_janvier[32]+$depenses_janvier[33]+$depenses_janvier[34],
  `DEPENSES_FEVRIER`=$depenses_fevrier[28]+$depenses_fevrier[29]+$depenses_fevrier[30]+$depenses_fevrier[31]+$depenses_fevrier[32]+$depenses_fevrier[33]+$depenses_fevrier[34],
  `DEPENSES_MARS`=   $depenses_mars[28]+$depenses_mars[29]+$depenses_mars[30]+$depenses_mars[31]+$depenses_mars[32]+$depenses_mars[33]+$depenses_mars[34],
  `DEPENSES_AVRIL`  =$depenses_avril[28]+$depenses_avril[29]+$depenses_avril[30]+$depenses_avril[31]+$depenses_avril[32]+$depenses_avril[33]+$depenses_avril[34],
  `DEPENSES_MAI`=   $depenses_mai[28]+ $depenses_mai[29]+ $depenses_mai[30]+$depenses_mai[31]+ $depenses_mai[32]+ $depenses_mai[33]+$depenses_mai[34],
  `DEPENSES_JUIN`=  $depenses_juin[28]+$depenses_juin[29]+$depenses_juin[30]+$depenses_juin[31]+$depenses_juin[32]+$depenses_juin[33]+$depenses_juin[34],
  `DEPENSES_JUILLET`=$depenses_juillet[28]+$depenses_juillet[29]+$depenses_juillet[30]+$depenses_juillet[31]+$depenses_juillet[32]+$depenses_juillet[33]+$depenses_juillet[34],
  `DEPENSES_AOUT`=   $depenses_aout[28]+$depenses_aout[29]+$depenses_aout[30]+$depenses_aout[31]+$depenses_aout[32]+$depenses_aout[33]+$depenses_aout[34],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[28]+$depenses_septembre[29]+$depenses_septembre[30]+$depenses_septembre[31]+$depenses_septembre[32]+$depenses_septembre[33]+$depenses_septembre[34],
  `DEPENSES_OCTOBRE`=$depenses_octobre[28]+$depenses_octobre[29]+$depenses_octobre[30]+$depenses_octobre[31]+$depenses_octobre[32]+$depenses_octobre[33]+$depenses_octobre[34],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[28]+$depenses_novembre[29]+$depenses_novembre[30]+$depenses_novembre[31]+$depenses_novembre[32]+$depenses_novembre[33]+$depenses_novembre[34],
  `DEPENSES_DECEMBRE`=$depenses_decembre[28]+$depenses_decembre[29]+$depenses_decembre[30]+$depenses_decembre[31]+$depenses_decembre[32]+$depenses_decembre[33]+$depenses_decembre[34],
  `TOTAL_DEPENSES`=$total_depenses[28]+$total_depenses[29]+$total_depenses[30]+$total_depenses[31]+$total_depenses[32]+$total_depenses[33]+$total_depenses[34],
  `RELIQUAT`=       $reliquat[28]+$reliquat[29]+$reliquat[30]+$reliquat[31]+$reliquat[32]+$reliquat[33]+$reliquat[34]
where id='27' ";
$result11=$conn->query($s11);

$s12="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[36]',
`RALLONGE`=' $rallonge[36]',
  `DEPENSES_JANVIER`='$depenses_janvier[36]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[36]',
  `DEPENSES_MARS`='$depenses_mars[36]',
  `DEPENSES_AVRIL`='$depenses_avril[36]',
  `DEPENSES_MAI`=' $depenses_mai[36]',
  `DEPENSES_JUIN`='$depenses_juin[36]',
  `DEPENSES_JUILLET`='$depenses_juillet[36]',
  `DEPENSES_AOUT`='$depenses_aout[36]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[36]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[36]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[36]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[36]',
  `TOTAL_DEPENSES`='$total_depenses[36]',
  `RELIQUAT`='$reliquat[36]'
where id='35' ";
$result12=$conn->query($s12);

$s13="UPDATE EE2024 SET
`DOTATION_2024`='$dotation_2024[38]',
`RALLONGE`=' $rallonge[38]',
  `DEPENSES_JANVIER`='$depenses_janvier[38]',
  `DEPENSES_FEVRIER`='$depenses_fevrier[38]',
  `DEPENSES_MARS`='$depenses_mars[38]',
  `DEPENSES_AVRIL`='$depenses_avril[38]',
  `DEPENSES_MAI`=' $depenses_mai[38]',
  `DEPENSES_JUIN`='$depenses_juin[38]',
  `DEPENSES_JUILLET`='$depenses_juillet[38]',
  `DEPENSES_AOUT`='$depenses_aout[38]',
  `DEPENSES_SEPTEMBRE`='$depenses_septembre[38]',
  `DEPENSES_OCTOBRE`='$depenses_octobre[38]',
  `DEPENSES_NOVEMBRE`='$depenses_novembre[38]',
  `DEPENSES_DECEMBRE`='$depenses_decembre[38]',
  `TOTAL_DEPENSES`='$total_depenses[38]',
  `RELIQUAT`='$reliquat[38]'
where id='37' ";
$result13=$conn->query($s13);

$s14="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[40]+$dotation_2024[41],
`RALLONGE`=$rallonge[40]+$rallonge[41],
  `DEPENSES_JANVIER`=$depenses_janvier[40]+$depenses_janvier[41],
  `DEPENSES_FEVRIER`=$depenses_fevrier[40]+$depenses_fevrier[41],
  `DEPENSES_MARS`=$depenses_mars[40]+$depenses_mars[41],
  `DEPENSES_AVRIL`=$depenses_avril[40]+$depenses_avril[41],
  `DEPENSES_MAI`= $depenses_mai[40]+ $depenses_mai[41],
  `DEPENSES_JUIN`=$depenses_juin[40]+$depenses_juin[41],
  `DEPENSES_JUILLET`=$depenses_juillet[40]+$depenses_juillet[41],
  `DEPENSES_AOUT`=$depenses_aout[40]+$depenses_aout[41],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[40]+$depenses_septembre[41],
  `DEPENSES_OCTOBRE`=$depenses_octobre[40]+$depenses_octobre[41],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[40]+$depenses_novembre[41],
  `DEPENSES_DECEMBRE`=$depenses_decembre[40]+$depenses_decembre[41],
  `TOTAL_DEPENSES`=$total_depenses[40]+$total_depenses[41],
  `RELIQUAT`=$reliquat[40]+$reliquat[41]
where id='39' ";
$result14=$conn->query($s14);

$s15="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[43]+$dotation_2024[44]+$dotation_2024[45],
`RALLONGE`=$rallonge[43]+$rallonge[44]+$rallonge[45],
  `DEPENSES_JANVIER`=$depenses_janvier[43]+$depenses_janvier[44]+$depenses_janvier[45],
  `DEPENSES_FEVRIER`=$depenses_fevrier[43]+$depenses_fevrier[44]+$depenses_fevrier[45],
  `DEPENSES_MARS`=$depenses_mars[43]+$depenses_mars[44]+$depenses_mars[45],
  `DEPENSES_AVRIL`=$depenses_avril[43]+$depenses_avril[44]+$depenses_avril[45],
  `DEPENSES_MAI`= $depenses_mai[43]+ $depenses_mai[44]+ $depenses_mai[45],
  `DEPENSES_JUIN`=$depenses_juin[43]+$depenses_juin[44]+$depenses_juin[45],
  `DEPENSES_JUILLET`=$depenses_juillet[43]+$depenses_juillet[44]+$depenses_juillet[45],
  `DEPENSES_AOUT`=$depenses_aout[43]+$depenses_aout[44]+$depenses_aout[45],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[43]+$depenses_septembre[44]+$depenses_septembre[45],
  `DEPENSES_OCTOBRE`=$depenses_octobre[43]+$depenses_octobre[44]+$depenses_octobre[45],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[43]+$depenses_novembre[44]+$depenses_novembre[45],
  `DEPENSES_DECEMBRE`=$depenses_decembre[43]+$depenses_decembre[44]+$depenses_decembre[45],
  `TOTAL_DEPENSES`=$total_depenses[43]+$total_depenses[44]+$total_depenses[45],
  `RELIQUAT`=$reliquat[43]+$reliquat[44]+$reliquat[45]
where id='42' ";
$result15=$conn->query($s15);

$s16="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[47]+$dotation_2024[48],
`RALLONGE`=$rallonge[47]+$rallonge[48],
  `DEPENSES_JANVIER`=$depenses_janvier[47]+$depenses_janvier[48],
  `DEPENSES_FEVRIER`=$depenses_fevrier[47]+$depenses_fevrier[48],
  `DEPENSES_MARS`=$depenses_mars[47]+$depenses_mars[48],
  `DEPENSES_AVRIL`=$depenses_avril[47]+$depenses_avril[48],
  `DEPENSES_MAI`= $depenses_mai[47]+ $depenses_mai[48],
  `DEPENSES_JUIN`=$depenses_juin[47]+$depenses_juin[48],
  `DEPENSES_JUILLET`=$depenses_juillet[47]+$depenses_juillet[48],
  `DEPENSES_AOUT`=$depenses_aout[47]+$depenses_aout[48],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[47]+$depenses_septembre[48],
  `DEPENSES_OCTOBRE`=$depenses_octobre[47]+$depenses_octobre[48],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[47]+$depenses_novembre[48],
  `DEPENSES_DECEMBRE`=$depenses_decembre[47]+$depenses_decembre[48],
  `TOTAL_DEPENSES`=$total_depenses[47]+$total_depenses[48],
  `RELIQUAT`=$reliquat[47]+$reliquat[48]
where id='46' ";
$result16=$conn->query($s16);

$s17="UPDATE EE2024 SET
`DOTATION_2024`=$dotation_2024[50]+$dotation_2024[51]+$dotation_2024[52],
`RALLONGE`=$rallonge[50]+$rallonge[51]+$rallonge[52],
  `DEPENSES_JANVIER`=$depenses_janvier[50]+$depenses_janvier[51]+$depenses_janvier[52],
  `DEPENSES_FEVRIER`=$depenses_fevrier[50]+$depenses_fevrier[51]+$depenses_fevrier[52],
  `DEPENSES_MARS`=$depenses_mars[50]+$depenses_mars[51]+$depenses_mars[52],
  `DEPENSES_AVRIL`=$depenses_avril[50]+$depenses_avril[51]+$depenses_avril[52],
  `DEPENSES_MAI`= $depenses_mai[50]+ $depenses_mai[51]+ $depenses_mai[52],
  `DEPENSES_JUIN`=$depenses_juin[50]+$depenses_juin[51]+$depenses_juin[52],
  `DEPENSES_JUILLET`=$depenses_juillet[50]+$depenses_juillet[51]+$depenses_juillet[52],
  `DEPENSES_AOUT`=$depenses_aout[50]+$depenses_aout[51]+$depenses_aout[52],
  `DEPENSES_SEPTEMBRE`=$depenses_septembre[50]+$depenses_septembre[51]+$depenses_septembre[52],
  `DEPENSES_OCTOBRE`=$depenses_octobre[50]+$depenses_octobre[51]+$depenses_octobre[52],
  `DEPENSES_NOVEMBRE`=$depenses_novembre[50]+$depenses_novembre[51]+$depenses_novembre[52],
  `DEPENSES_DECEMBRE`=$depenses_decembre[50]+$depenses_decembre[51]+$depenses_decembre[52],
  `TOTAL_DEPENSES`=$total_depenses[50]+$total_depenses[51]+$total_depenses[52],
  `RELIQUAT`=$reliquat[50]+$reliquat[51]+$reliquat[52]
where id='49' ";
$result17=$conn->query($s17);
}
$sql="SELECT * FROM `ee2024`";
$result=$conn->query($sql);
$n=$result->num_rows;
if($result->num_rows>0){
    echo"<table border='1'>";
    echo"<tr><th>rubrique</th><th style='width:200px;' id='intitule'>intitule rubrique</th><th>dotation 2024</th><th>rallonge</th><th>depenses janvier</th><th>depenses fevrier</th><th>depenses mars</th><th>depenses avril</th><th>depenses mai</th><th>depenses juin</th><th>depenses juillet</th><th>depenses aout</th><th>depenses septembre</th><th>depenses octobre</th><th>depnses novembre</th><th>depnses decmbre</th><th>total depenses</th><th>reliquat</th></tr>";
    $index = 1; 
  
    while ($row = $result->fetch_assoc()) {
       
        if($row["RUBRIQUE"] =='99999'){
            echo "<tr style='display: none;'>";
           }
       
       else {
       
        echo "<tr>";}
        if($row["TYPE"]=='SR'){
        echo "<td  name='rub[$index]'>" . $row["RUBRIQUE"] . "</td>";
        echo "<td style='width:200px;' id='intitule'>" . $row["INTITULE_RUBRIQUE"] . "</td>";
        echo "<td>$row[DOTATION_2024]</td>";
        echo "<td>$row[RALLONGE]</td>";
        echo "<td> $row[DEPENSES_JANVIER] </td>";
        echo "<td>$row[DEPENSES_FEVRIER] </td>";
        echo "<td>$row[DEPENSES_MARS] </td>";
        echo "<td>$row[DEPENSES_AVRIL] </td>";
        echo "<td> $row[DEPENSES_MAI] </td>";
        echo "<td>$row[DEPENSES_JUIN] </td>";
        echo "<td>$row[DEPENSES_JUILLET]</td>";
        echo "<td> $row[DEPENSES_AOUT] </td>";
        echo "<td>$row[DEPENSES_SEPTEMBRE]</td>";
        echo "<td> $row[DEPENSES_OCTOBRE]</td>";
        echo "<td>$row[DEPENSES_NOVEMBRE]</td>";
        echo "<td>$row[DEPENSES_DECEMBRE]</td>";
        echo "<td>". $row["TOTAL_DEPENSES"] ."</td>";
        echo "<td>". $row["RELIQUAT"] ."</td>";
        
    }
    else{
        echo "<td style='background-color: yellow;' name='rub[$index]'>" . $row["RUBRIQUE"] . "</td>";
        echo "<td style='width:200px; background-color: yellow;' id='intitule'>" . $row["INTITULE_RUBRIQUE"] . "</td>";
        echo "<td style='background-color: yellow;'>$row[DOTATION_2024]</td>";
        echo "<td style='background-color: yellow;'> $row[RALLONGE] </td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_JANVIER]</td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_FEVRIER]</td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_MARS] </td>";
        echo "<td style='background-color: yellow;'>$row[DEPENSES_AVRIL] </td>";
        echo "<td style='background-color: yellow;'>$row[DEPENSES_MAI] </td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_JUIN]</td>";
        echo "<td style='background-color: yellow;'>$row[DEPENSES_JUILLET] </td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_AOUT] </td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_SEPTEMBRE] </td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_OCTOBRE]</td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_NOVEMBRE] </td>";
        echo "<td style='background-color: yellow;'> $row[DEPENSES_DECEMBRE] </td>";
        echo "<td style='background-color: yellow;'> $row[TOTAL_DEPENSES] </td>";
        echo "<td style='background-color: yellow;'> $row[RELIQUAT] </td>";
      }
        echo "</tr>";
      
       
        $index++; 
    }}
    

 


  $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
    font-family: 'Roboto', sans-serif;
    color: #333;
    background-color: #f4f4f4;
  
}
    h1, h2, h3 {
    
    color: #2a7fbf;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
}
    td{
            height: 15px;
            font-size: 10px;
            width: 50px;
          
           
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            
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
