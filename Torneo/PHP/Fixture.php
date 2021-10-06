<?php
include '../../servidor.php';
$server = new servidor();
if(isset($_POST['id'])){
    /*
    $IDT = $_POST['id'];
    $Participantes = [];
    $Participantes = $server->FixturePuntos($IDT);
    $cantParticipantes = count($Participantes);
    $partidos = $server->TraigoPartidosTorneo();
    $col = 0;
    foreach ($partidos as $buscoPartido) {
        if($buscoPartido['Torneo'] == $IDT){
            if($buscoPartido['estado'] == 1){
               $col = 1;
           }
        }
    }
    if($col == 0){
        for($x = 1;$x <= $cantParticipantes;$x++){
            if($x%2 != 0){
                $Usu1 = $Participantes[$x]['Usuario'];
                $Usu2 = $Participantes[($x-1)]['Usuario'];
            }else{
                $server->AgendoPartida($Usu1, $Usu2,"1","2",$IDT);
            }
        }
    }*/
    $partidos = $server->TraigoPartidos();
    foreach ($partidos as $buscoPartido) {
    if($buscoPartido['usu1'] == $_SESSION['usuario'] || $buscoPartido['usu2'] == $_SESSION['usuario']){
        if($buscoPartido['usu1'] == $_SESSION['usuario']){
           $col =$buscoPartido['col1'];
       }else{
          $col =$buscoPartido['col2'];
       }
    }
}
}
?>