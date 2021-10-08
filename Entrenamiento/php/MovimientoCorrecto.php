<?php
include '../../servidor.php';
$server = new servidor();
$x = $_POST["X"];
$y = $_POST["Y"];
$Pieza = $_POST["Pieza"];
$id = $_POST["ID"];
$Turno = $_POST["Turno"];
echo json_encode($server->MovimientoCorrecto($id,$Turno,$x,$y,$Pieza));
?>