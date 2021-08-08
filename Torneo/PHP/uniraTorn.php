<?php

include '../../servidor.php';
$server = new servidor();
session_start();
$usuario = $_SESSION['usuario'];
$torneos = $server->InfoTorneo();

$x = false; 

$prim = true;
$fechaAct = date('Ymd');

for($i=0;$i<count($torneos);$i++) {
    $comTornP = explode(' ', str_replace('-', ' ', $torneos[$i]['InicioTorneo']));
    $fechTornP = $comTornP[0].$comTornP[1].$comTornP[2];
    $diff = $fechTornP - $fechaAct;
    if($prim) {
        $diffAnt = $diff;
        $j = $i;
        $prim = false;
    } else {
        if(abs($diff) <= abs($diffAnt)) {
            $j = $i;
            $diffAnt = $diff;
        }
    }
}

if(isset($_POST['tornID']) == $torneos[$j]['ID_Torneo']) {
    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
    echo $x;
} else {
    echo $x;
    //actualize la pagina e intente nuevamente
}

?>