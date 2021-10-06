<?php
if(isset($_POST['tornID'])) {
    date_default_timezone_set("America/Montevideo");
    include '../../servidor.php';
    $server = new servidor();
    session_start();
    $idTorneo = $_POST['tornID'];
    $torneos = $server->InfoTorneo();

    $x = false;
    $y;

    $prim = true;
    $fechaAct = date('Ymd');
    $fechActForm = date('Y-m-d');

    if(isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $partici = $server->InfoParticipante($usuario);
        if($partici == 1) {
            for($j=0;$j<count($torneos);$j++) {
                if($idTorneo == $torneos[$j]['ID_Torneo']) {
                    $infoest = $server->InfoEstadisticas($usuario);
                    if($infoest[1] <= $torneos[$j]['ELO_Max'] && $infoest[1] >= $torneos[$j]['ELO_Min'] || $torneos[$j]['ELO_Max'] == 0 && $torneos[$j]['ELO_Min'] == 0) {
                        $infopers = $server->PerfilUsuario($usuario);
                        $años = floor(abs(strtotime($fechActForm) - strtotime($infopers['Nacimiento'])) / (365*60*60*24));
                        if($años <= $torneos[$j]['EdadMaxima'] && $años >= $torneos[$j]['EdadMinima'] || $torneos[$j]['EdadMaxima'] == 0 && $torneos[$j]['EdadMinima'] == 0) {
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
                            echo '6';
                        }
                    } else {
                        echo '5';
                    }
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
