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
    
    if($usuario != null) {
        if($partici == 1) {
            for($j=0;$j<count($torneos);$j++) {
                if($idTorneo == $torneos[$j]['ID_Torneo']) {
                    $comTornP = explode(' ', str_replace('-', ' ', $torneos[$j]['InicioTorneo']));
                    if(str_replace('-', '', $torneos[$j]['Fecha_inicio']) < $fechaAct && str_replace('-', '', $torneos[$j]['Fecha_fin']) > $fechaAct) {
                        $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                    } elseif(str_replace('-', '', $torneos[$j]['Fecha_inicio']) == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
                        $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                    } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTornP[3]) >= date('gis')) {
                        $x = $server->EditarParticipante($usuario, 0, 0, 0, 0, 0, $_POST['tornID']);
                    }
                    $y = false;
                    $j = count($torneos);
                } else {
                    $y = true;
                }
            }
            if($y) {
                echo '3';
            } elseif(!$x) {
                echo '2';
            } else {
                echo '0';
            }
        } else {
            echo '1';
        }
    } else {
        echo '4';
    }
} else {
    echo '3';
}

?>
