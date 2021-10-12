<?php
include '../../servidor.php';
$server = new servidor();
session_start();
$Usuario = $_SESSION["usuario"];
$id = $server->ProblemasNoResueltos($Usuario);
echo json_encode($server->TraigoEntrenamiento($id[0]["ID"]));
?>