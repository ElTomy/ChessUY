<?php
include '../../servidor.php';
session_start();
$server= new servidor();
//$Po = $_POST['resultado'];
$Po = 1;

//TRAIGO LOS ELOS DE LOS JUGADORES
$jug1 = $server->InfoEstadisticas($_SESSION['usuario']);
$jug2 = $server->InfoEstadisticas($_POST['jugador2']);
$ELOa = $jug1[0];
$ELOb = $jug2[0];

//DEFINO K
if($ELOa > 2400){
    $k = 10;
}else if($ELOa > 2300 && $ELOa < 2400){
    $k = 20;
}else if($ELOa < 2300){
    $k = 40;
}

//CALCULO LA PUNTUACION ESPERADA
$a = ($ELOb-$ELOa)/400;
//$b = ($ELOa-$ELOb)/400;
$Ea = 1/(1+pow(10,$a));
//$Eb = 1/(1+pow(10,$b));

//CALCULO EL NUEVO ELO
$ELO = $ELOa + $k*($Po-$Ea); 

echo json_encode($ELO);
?>