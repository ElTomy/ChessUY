<?php
include '../../servidor.php';
$server= new servidor();
$est = array();
$user = $_POST["usuario"];
echo json_encode($server->InfoEstadisticas($user)); 
?>