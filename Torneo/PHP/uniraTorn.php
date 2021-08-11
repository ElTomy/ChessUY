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
    $y;

    $prim = true;
    $fechaAct = date('Ymd');
    $comTornP = explode(' ', str_replace('-', ' ', $torneos[$i]['InicioTorneo']));

    if($partici == 1) {
        for($j=0;$j<count($torneos);$j++) {
            if($idTorneo == $torneos[$j]['ID_Torneo']) {
                if(str_replace('-', '', $torneos[$j]['Fecha_inicio']) < $fechaAct && str_replace('-', '', $torneos[$j]['Fecha_fin']) > $fechaAct) {
                    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                    $y = false;
                } elseif(str_replace('-', '', $torneos[$j]['Fecha_inicio']) == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
                    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                    $y = false;
                } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTornP[3]) >= date('gis')) {
                    $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                    $y = false;
                } else {
                    $y = false;
                }
                $j = count($torneos);
            } else {
                $y = true;
            }
        }
        if($y) {
            echo 'Ese torneo no existe';
        } elseif(!$x) {
            echo 'Ese torneos ya caduco papa';
        } else {
            echo 'Haz ingresado correctamente';
        }
    } else {
        echo 'Mono tryhard cagon';
    }
} else {
    echo 'Mono cagon';
}

?>
