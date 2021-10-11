<?php
include '../../servidor.php';
$server= new servidor();
session_start();
echo json_encode($$server->cargoPartido($_POST['id_partido']));
?>