<?php
include '../../servidor.php';
$server= new servidor();
$est = array();
$user = $_POST["usuario"];
$lvl = $_POST["nivel"];
echo json_encode($server->AgregarEstadistica($user,$lvl,0,0,0,0,0,0,0)); 
?>