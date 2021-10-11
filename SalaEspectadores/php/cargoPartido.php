<?php
include '../../servidor.php';
$server= new servidor();
session_start();
$partido = $server->cargoPartido($_POST['id_partido']);
echo json_encode($partido);
?>