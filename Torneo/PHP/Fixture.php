<?php
include '../../servidor.php';
$server = new servidor();
if(isset($_POST['id'])){
    $IDT = $_POST['id'];
    $Participantes = [];
    $Participantes = $server->FixturePuntos($IDT);
    $cantParticipantes = count($Participantes);
    $partidos = $server->TraigoPartidos();
    $col = 0;
    foreach ($partidos as $buscoPartido) {
        if($buscoPartido['Torneo'] == $IDT){
            if($buscoPartido['estado'] == 1){
               $col = 1;
           }
        }
    }
    if($col == 0){
        for($i = 1;$i <= $cantParticipantes;$i++){

        }
    }
}
?>