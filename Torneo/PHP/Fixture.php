<?php
include '../../servidor.php';
$servidor = new servidor();
if(isset($_POST['IdTorneo'])){
    $IDT = $_POST['IdTorneo'];
    $Ronda = $_POST['Ronda'];
    $Participantes = [];
    $Participantes = $server->InfoPartidasAgendadas($IDT);
    $cantParticipantes = count($Participantes);
    $Partidas = $server->FixturePuntos($IDT);
    $cantPartidas = count($Partidas);
    $a = 1;
    for($x = 0;$x <= $cantPartidas;$x++){
        if($Partidas[$x]['Estado'] == 0){
            $a = 0;
        }
    }
    if($a == 1){
        for($x = 0;$x <= $cantParticipantes;$x++){
            if($x%2 != 0){
                $Usu1 = $Participantes[$x]['Usuario'];
            }else{
                $Usu2 = $Participantes[$x]['Usuario'];
                $server->AgendoPartida($IDT,$Usu1,$Usu2,0,$Ronda,2021-09-11 03:11:00);
            }
        }
    }
}
?>