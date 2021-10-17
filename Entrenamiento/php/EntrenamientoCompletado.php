<?php
include '../../servidor.php';
$server = new servidor();
session_start();
$Usuario = $_SESSION["usuario"];
$id = $_POST["ID"];
$server->EntrenamientoCompleto($id,$Usuario);
?>