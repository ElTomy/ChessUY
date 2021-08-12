<?php
include '../../servidor.php';
session_start();
$server= new servidor();
$tablero = $_POST["tablero"];
echo $server->guardoTablero($_SESSION['usuario'], $tablero); 
?>