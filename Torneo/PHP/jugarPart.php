<?php
date_default_timezone_set("America/Montevideo");
include '../../servidor.php';
$server = new servidor();
session_start();

// Ver si esta en algun torneo y en cual
if(isset($_SESSION['usuario'])) {
    $usuarioLog = $_SESSION['usuario'];
    $partid = $server->InfoPartida($usuarioLog, 0);
    for($i=0;$i<count($partid);$i++) {
        if($partid[$i]['Jugador1'] == $usuarioLog || $partid[$i]['Jugador2'] == $usuarioLog && $partid[$i]['ID_Torneo'] != 0) {
            $idTornUnid = $partid[$i]['ID_Torneo'];
            // Info adicional del torneo
            $infoAdi = $server->InfoTorneo();
            for($j=0;$j<count($infoAdi);$j++) {
                if($infoAdi[$j]['ID_Torneo'] == $idTornUnid) {
                    $tempDesc = str_replace(':', '', $infoAdi[$j]['TiempoDescalificar']);
                    $j = count($infoAdi);
                }
            }
            $fechahora = explode(' ', $partid[$i]['Fecha']);
            if($fechahora[0] == date('Y-m-d')) {
                $timeDiff = str_replace(':', '', $fechahora[1]) - date('Gis');
                // Ver si la partida para hoy esta a 30 min de empezar
                if($timeDiff <= 7000 && $timeDiff >= 0 - $tempDesc) {
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
            }elseif($fechahora[0] == date('Y-m-d', strtotime("tomorrow"))) {
                // Ver si la partida para mañana esta a 30 min de empezar
                if($timeDiff <= -233000) {
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