<?php
  
  session_start();
 $id = $_SESSION['id'];
  $sql1 = "SELECT * FROM `jcprofile` WHERE ecid='$id'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $company = $row1['company'];

  $email = $_SESSION['empemail'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  
$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'jobportal8486@gmail.com';                 
    $mail->Password   = 'vishesh86';                        
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                              
    $mail->Port       = 465;  
  
    $mail->setFrom('vaibhavgaunkar06@gmail.com', $company);           
    $mail->addAddress($email);
    //$mail->addAddress('receiver2@gfg.com', 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Application of job interview';
    $mail->Body    = 'You are selected for interview please visit our company';
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    ?>
      <script>
          alert(" Mail has been sent successfully! ");
          window.location.href = "/jsite/home1.php";
      </script>
      <?php
    
} catch (Exception $e) {
    ?>
    <script>
          alert(" Message could not be sent. Mailer Error: {$mail->ErrorInfo} ");
          window.location.href = "/jsite/home1.php";
      </script>
      <?php
    //header("location: temp/viewprof.php");
}
  
?>