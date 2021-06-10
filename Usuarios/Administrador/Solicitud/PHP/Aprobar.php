<?php
include'/ChessUY/servidor.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/ChessUY/PHPMailer-6.3.0/src/Exception.php';
require '/ChessUY/PHPMailer-6.3.0/src/PHPMailer.php';
require '/ChessUY/PHPMailer-6.3.0/src/SMTP.php';
/*------------------------------------------------------------------------------------------*/
//
$mailUsuario = $_POST['mail'];
$nombre = $_POST['nombre'];
$servidor = new servidor();
$servidor->AgregarUsuario($_POST['tipo'],$_POST['usuario'],$_POST['ci'],$_POST['año'],$_POST['apellido'],$_POST['institucion'],$_POST['nombre'],$_POST['contacto'],$_POST['contraseña'],$_POST['nacimiento'],$_POST['mail']);
//
/*------------------------------------------------------------------------------------------*/
//
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
//
/*------------------------------------------------------------------------------------------*/ 
//
$mail->From = "cyberhydrauy@gmail.com";
$mail->FromName = "CyberHydra";
$mail->addAddress($mailUsuario, $nombre);
$mail->isHTML(true);
$mail->Subject = "Solicitud de usuario";
$mail->Body = "Su usuario ha sido <h1 style='color:#79bf1d'>A P R O B A D O<h1><br/><a href='http://localhost/ChessUy/'>Ir a ChessUY</a>";
try {
    $mail->send();
    echo "Mail enviado...";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
