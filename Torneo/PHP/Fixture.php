<?php
include '../../servidor.php';
$server = new servidor();
if(isset($_POST['id'])){
    $IDT = $_POST['id'];
    $Participantes = [];
    $Participantes = $server->FixturePuntos($IDT);
    $cantParticipantes = count($Participantes);
    $partidos = $server->TraigoPartidosTorneo();
    $Info = $server->InfoPartida('',$IDT);
    $Ronda = $Info[0]['ronda'];
    $fechaAct = date('Ymd');
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
    }
}
?>