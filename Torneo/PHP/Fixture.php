<?php
include '../../servidor.php';
$server = new servidor();
if(isset($_POST['id'])){
    $IDT = $_POST['id'];
    $Participantes = [];
    $Participantes = $server->FixturePuntos($IDT);
    $cantParticipantes = count($Participantes);
    $Partidas = $server->InfoPartidasAgendadas($IDT);
    $cantPartidas = count($Partidas);
    $a = 1;
    /*for($x = 1;$x <= $cantPartidas;$x++){
        if($Partidas[$x]['Estado'] == 0){
            $a = 0;
        }
    }*/
    if($a == 1){
        for($x = 1;$x <= $cantParticipantes;$x++){
            if($x%2 != 0){
                $Usu1 = $Participantes[$x]['Usuario'];
                $Usu2 = $Participantes[($x-1)]['Usuario'];
            }else{
                $server->AgendoPartida($IDT,$Usu1,$Usu2,'0','1','2021-09-11-03:11:00');
            }
        }
    }
}
?>