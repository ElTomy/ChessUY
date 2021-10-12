<?php
include '../../servidor.php';
session_start();
$server= new servidor();

echo $server->guardoTiempo($_POST['id_partido'], $_POST['numJugador'],$_POST['temp']); 
?>