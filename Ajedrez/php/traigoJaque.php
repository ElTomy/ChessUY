<?php
include '../../servidor.php';
session_start();
$server= new servidor();
echo $server->traigoJaque($_SESSION['usuario'], $_POST['numJugador']); 
?>