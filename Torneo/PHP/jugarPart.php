<?php
date_default_timezone_set("America/Montevideo");
include '../../servidor.php';
$server = new servidor();
session_start();
$listo = false;

// Ver si esta en algun torneo y en cual
if(isset($_SESSION['usuario'])) {
    $usuarioLog = $_SESSION['usuario'];
    $partid = $server->InfoPartida($usuarioLog);
    for($i=0;$i<count($partid);$i++) {
        if($partid[$i]['Jugador1'] == $usuarioLog || $partid[$i]['Jugador2'] == $usuarioLog && $partid[$i]['ID_Torneo'] != 0) {
            $idTornUnid = $partid[$i]['ID_Torneo'];
            // Info adicional del torneo
            $infoAdi = $server->InfoTorneo();
            for($j=0;$j<count($infoAdi);$j++) {
                if($infoAdi[$j]['ID_Torneo'] == $idTornUnid) {
                    $horaTornArr = explode(' ', str_replace('-', ' ', $infoAdi[$j]['InicioTorneo']));
                    $horaTorn = $horaTornArr[3];
                    $j = count($infoAdi);
                }
            }

            if($partid[$i]['Fecha'] == date('Y-m-d')) {
                $timeDiff = str_replace(':', '', $horaTorn) - date('gis');
                // Ver si la partida para hoy esta a 30 min de empezar
                if($timeDiff <= 3000 && $timeDiff >= 0) {
                    // Mostrar boton
                    echo "
                    <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class='fas fa-trophy'></i>Torneo
                    </a>
                    ";       
                }
            }elseif($partid[$i]['Fecha'] == date('Y-m-d', strtotime("tomorrow"))) {
                // Ver si la partida para hoy esta a 30 min de empezar
                if(str_replace(':', '', $horaTorn) <= 3000) {
                    // Mostrar boton
                    echo "
                    <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class='fas fa-trophy'></i>Torneo
                    </a>
                    ";       
                }
            }
        }
        $i = count($partid);
    }
}
?>