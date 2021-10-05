<?php
include '../../servidor.php';
$server= new servidor();
session_start();
$partidos = $server->TraigoPartidos();
$partidoEncontrado = false;
$ID_partido = null;

//:BUSCA SI YA ESTA EN UN PARTIDO
foreach ($partidos as $buscoPartido) {
    if($buscoPartido['usu1'] == $_SESSION['usuario'] || $buscoPartido['usu2'] == $_SESSION['usuario']){
     $partidoEncontrado = true;
     $ID_partido = $buscoPartido['ID'];
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
    }
}

  if($partidoEncontrado == true){
    //:CARGO EL PARTIDO
    $partido_encontrado = true;
    $colJugador = null;
    $blan = null;
    $neg = null;
  }else{
    //:BUSCA SI HAY UN PARTIDO PARA UNIRSE, SI NO CREA UNO
    $numJugador = null;
    $jugador2 = null;
    $turno = null;  
    $col1 = null;
    $col2 = null;
    
    $partido_encontrado = false;
    $encontrado = 1;
    //:BUSCA SI HAY PARTIDOS LIBRES PARA UNIRSE
    foreach ($partidos as $buscoPartido) {
      if($buscoPartido['usu2'] == null && $buscoPartido['usu1'] != $_SESSION['usuario']){
      $encontrado = 0;
      $ID_partido = $buscoPartido['ID'];
      $color1 = $buscoPartido['col1'];
      break;
      }
    }

    if($encontrado == 0){
      //:SE UNE A UN PARTIDO QUE ESTE LIBRE
      if($color1 == 1){
        $colr2 = 0;
        $colJugador = 0;
        $blan = 1;
        $neg = 8;
      }else{
        $colr2 =1;
        $colJugador = 1;
        $blan = 8;
        $neg = 1;
      }
      $numJugador = 2;
      $server->UnirsePartidos($ID_partido, $_SESSION['usuario'], $colr2);
    }else{
     //:CREA UN JUEGO
     $micolor = random_int(0,1);
     if($micolor == 1){
        $colJugador = 1;
        $blan = 8;
        $neg = 1;
    }else{
        $colJugador = 0;
        $blan = 1;
        $neg = 8;
    }
      $numJugador = 1;
      $server->CrearPartidos($_SESSION['usuario'], $micolor);
      //PROCEDIMIETNO TRAER ULTIMO ID
    }
  }

  $partido = array('ID_partido' => $ID_partido,'numJugador' => $numJugador,'jugador1'=> $_SESSION['usuario'],'jugador2' => $jugador2, 'turno' => $turno, 'col1' => $col1, 'col2' => $col2, 'partido_encontrado' => $partido_encontrado, 'colJugador' => $colJugador, 'blan' => $blan, 'neg' => $neg);
  echo json_encode($partido);
?>