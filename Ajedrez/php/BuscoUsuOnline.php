<?php
include '../../servidor.php';
session_start();
$server= new servidor();
$jugador2 = $_POST['jugador2'];
$info = $server->BuscoUsuarioOnline();
$encontrado = false;

foreach ($info as $jug2) {
    if($jug2['Usuario'] == $jugador2){
     $encontrado = true;
     break;
    }
}

echo json_encode($encontrado); 
?>