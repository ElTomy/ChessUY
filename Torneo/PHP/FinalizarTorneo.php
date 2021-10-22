<?php
include '../../servidor.php';
$server = new servidor();
if(isset($_POST['id'])){
    
    $IDT = $_POST['id'];
    $Participantes = [];
    $Participantes = $server->FixturePuntos($IDT);
    $cantParticipantes = count($Participantes);
    $partidos = $server->TraigoPartidosTorneo();
    $Torns = $server->InfoTorneo();
    $cant = count($Torns);
    for($a = 0;$a<$cant;$a++){
        if($Torns[$a]["ID_Torneo"] == $IDT){
            $NomPart = $Torns[$a]["nombre"];
        }
    }
    $col = 0;
    $id;
    $p = $Participantes[0]['Usuario'];
    $s = $Participantes[1]['Usuario'];
    $t = $Participantes[2]['Usuario'];
    foreach ($partidos as $buscoPartido) {
        if($buscoPartido['Torneo'] == $IDT){
            if($buscoPartido['estado'] == 1){
               $col = 1;
               $id = 26;
           }
        }
    }
    if($col == 0){
        $server->FinalizarTorneo($p,$s,$t,$IDT);
        $id = 27;
    }
}
echo $id;
return $id;
?>