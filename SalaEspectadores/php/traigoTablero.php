<?php
include '../../servidor.php';
session_start();
$server= new servidor();
echo json_encode($server->TraigoTablero($_SESSION['usuario'])); 
?>