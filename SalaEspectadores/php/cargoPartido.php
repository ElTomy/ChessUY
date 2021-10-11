<?php
include '../../servidor.php';
$server= new servidor();
session_start();
$partidos = $server->TraigoPartidos();
$partidoEncontrado = false;



  $partido = array('numJugador' => $numJugador,'jugador1'=> $_SESSION['usuario'],'jugador2' => $jugador2, 'turno' => $turno, 'col1' => $col1, 'col2' => $col2, 'partido_encontrado' => $partido_encontrado, 'colJugador' => $colJugador, 'blan' => $blan, 'neg' => $neg);
  echo json_encode($partido);
?>