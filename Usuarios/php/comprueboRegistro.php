<?php
include '../../servidor.php';
session_start();
$server= new servidor();
$est = array();
$user = $_SESSION["usuario"];
echo json_encode($server->InfoEstadisticas($user)); 
?>