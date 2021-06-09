<?php
<<<<<<< HEAD
  include '../../../servidor.php';
  $server= new servidor();
  $server->VerificoSesion(1); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script
      src="https://kit.fontawesome.com/1e193e3a23.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../Javascript/Loader.js"></script>

    <link
      rel="shortcut icon"
      href="../../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../../styles/styles.css" />

    <title>ChessUY | Championship</title>
  </head>
  <body>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
=======
include '../../../servidor.php';
session_start();
$Usuario = $_SESSION['Usuario'];
$server= new servidor();
list($ELO,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos) = $server->InfoEstadisticas($Usuario);
$return =
"<div>
    <div>
        <p><b>ELO: </b>$ELO</p>
        <p><b>Victorias: </b>$Victorias</p>
        <p><b>Derrotas: </b>$Derrotas</p>
        <p><b>Tablas: </b>$Tablas</p>
        <p><b>Coronaciones: </b>$Coronaciones</p>
        <p><b>Cantidad de piezas comidas: </b>$Comidas</p>
        <p><b>Victoria en menos tiempo: </b>$Menos_Tiempo</p>
        <p><b>Victoria en menos movimientos: </b>$Menos_Movimientos</p>
>>>>>>> 4c4c4e32c31f9a9fd61514f5644b55ea6fd16413
    </div>
</div>";
echo $return;
return $return;
?>