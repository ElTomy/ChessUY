<?php
include '../../servidor.php';
session_start();
$server= new servidor();
echo $server->TraigoTablero($_SESSION['usuario']); 
?>