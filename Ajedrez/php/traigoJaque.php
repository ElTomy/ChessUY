<?php
include '../../servidor.php';
session_start();
$server= new servidor();
echo json_encode($server->traigoJaque($_SESSION['usuario'], $_POST['numJugador'])); 
?>