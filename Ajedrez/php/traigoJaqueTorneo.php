<?php
include '../../servidor.php';
session_start();
$server= new servidor();
echo $server->traigoJaqueTorneo($_SESSION['usuario'], $_POST['numJugador'],$_POST['id_torneo']); 
?>