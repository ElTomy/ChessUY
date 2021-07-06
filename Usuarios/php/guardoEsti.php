<?php
include '../../servidor.php';
$server= new servidor();
$est = array();
$user = $_POST["usuario"];
$lvl = $_POST["nivel"];
echo json_encode($server->InfoEstadisticas($user,$lvl,0,0,0,0,0,0,0)); 
?>