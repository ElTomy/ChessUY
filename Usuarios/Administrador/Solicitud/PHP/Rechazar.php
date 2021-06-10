<?php
include '../../../../servidor.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../../PHPMailer-6.3.0/src/Exception.php';
require '../../../../PHPMailer-6.3.0/src/PHPMailer.php';
require '../../../../PHPMailer-6.3.0/src/SMTP.php';
/*------------------------------------------------------------------------------------------*/
// probando mailer...
//
$mailUsuario = $_POST['mail'];
$nombre = $_POST['nombre'];
$servidor = new servidor();
$servidor->BorarSolicitud($_POST['usuario']);
//
/*------------------------------------------------------------------------------------------*/
$mail = new PHPMailer(true);

$mail->SMTPDebug = 2; 
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;// TCP port to connect to
$mail->CharSet = 'UTF-8';
$mail->Username ='cyberhydrauy@gmail.com'; 
$mail->Password = 'hugoturbio666'; 

$mail->From = "cyberhydrauy@gmail.com";
$mail->FromName = "CyberHydra";
$mail->addAddress($mailUsuario, $nombre);
$mail->isHTML(true);
$mail->Subject = "Solicitud de usuario";
$mail->Body = "Su usuario ha sido <h1 style='color:#a32f27'>R E C H A Z A D O<h1><br/><a href=''>Volver a enviar solicitud</a>";
try {
    $mail->send();
    echo "Mail enviado...";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}