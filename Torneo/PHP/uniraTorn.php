<?php
if(isset($_POST['tornID'])) {
    include '../../servidor.php';
    $server = new servidor();
    session_start();
    $usuario = $_SESSION['usuario'];
    $idTorneo = $_POST['tornID'];
    $torneos = $server->InfoTorneo();
    $partici = $server->InfoParticipante($usuario);

    $x = false;
    $y = true;

    $prim = true;
    $fechaAct = date('Ymd');
    $comTornP = explode(' ', str_replace('-', ' ', $torneos[$i]['InicioTorneo']));

    if($y) {
        for($j=0;$j<count($torneos);$j++) {
            if($idTorneo == $torneos[$j]['ID_Torneo']) {
                if($torneos[$j]['Fecha_inicio'] < $fechaAct && $torneos[$j]['Fecha_fin'] > $fechaAct) {
                    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                } elseif($torneos[$j]['Fecha_inicio'] == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
                    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                } elseif($torneos[$j]['Fecha_fin'] == $fechaAct && str_replace(':', '', $comTornP[3]) >= date('gis')) {
                    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                }
                $j = count($torneos);
            }
        }
        echo $x;
    } else {
        echo 'Mono tryhard cagon';
    }
} else {
    echo 'Mono hacker cagon';
}

?>