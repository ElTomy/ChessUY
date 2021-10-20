<?php
include '../../servidor.php';
$server= new servidor();
session_start();
$partidos = $server->TraigoPartidosTorneo();
$partidoEncontrado = false;
$ID_partido = null;
$id_torneo = $_POST['id_torneo'];

//:BUSCA SI YA ESTA EN UN PARTIDO
foreach ($partidos as $buscoPartido) {
    if($buscoPartido['Torneo'] == $id_torneo){
        if($buscoPartido['usu1'] == $_SESSION['usuario'] || $buscoPartido['usu2'] == $_SESSION['usuario']){
            if($buscoPartido['usu1'] == $_SESSION['usuario']){
                $numJugador = 1;
                $jugador2 = $buscoPartido['usu2'];
            }else{
                $numJugador = 2;
                $jugador2 = $buscoPartido['usu1'];
            }
                $turno = $buscoPartido['turno'];
                $col1 = $buscoPartido['col1'];
                $col2 = $buscoPartido['col2'];
                $partido_encontrado = true;
                $ID_partido = $buscoPartido['ID'];
           
           }
    }
}

    if($partido_encontrado == true){
      if($col1 == 1){
        $colJugador = 0;
        $blan = 1;
        $neg = 8;
      }else{
        $colJugador = 1;
        $blan = 8;
        $neg = 1;
      }

    }

  $partido = array('ID_partido' => $ID_partido,'numJugador' => $numJugador,'jugador1'=> $_SESSION['usuario'],'jugador2' => $jugador2, 'turno' => $turno, 'col1' => $col1, 'col2' => $col2, 'partido_encontrado' => $partido_encontrado, 'colJugador' => $colJugador, 'blan' => $blan, 'neg' => $neg);
  echo json_encode($partido);
?>