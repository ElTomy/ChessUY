<?php
include '../../servidor.php';
session_start();
$server= new servidor();
echo json_encode($server->guardoJaque($_SESSION['usuario'], $_POST['numJugador'], $_POST['jaq'])); 
?>