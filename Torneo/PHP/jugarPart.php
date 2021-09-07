<?php
date_default_timezone_set("America/Montevideo");
include '../../servidor.php';
$server = new servidor();
$partid = $server->TraigoPartidosTorneo();
session_start();
$listo = false;

// Ver si esta en algun torneo y en cual
if(isset($_SESSION['usuario'])) {
    $usuarioLog = $_SESSION['usuario'];
    for($i=0;$i<count($partid);$i++) {
        if($partid[$i]['usu1'] == $usuarioLog || $partid[$i]['usu2'] == $usuarioLog) {
            $idTornUnid = $partid[$i]['Torneo'];
            
            // Info adicional del torneo
            $infoAdi = $server->InfoTorneo();
            for($i=0;$i<count($infoAdi);$i++) {
                if($infoAdi[$i]['ID_Torneo'] == $idTornUnid) {
                    $horaTornArr = explode(' ', str_replace('-', ' ', $torneos[$j]['InicioTorneo']));
                    $horaTorn = $horaTornArr[3];
                    $i = count($infoAdi);
                }
            }

            // Ver si hay una partida para hoy
            $tomyxd = InfoPartida($idTornUnid);
            if($tomyxd['Fecha'] == date('Y-m-d')) {
                $timeDiff = str_replace(':', '', $horaTorn) - date('gis');
                // Ver si la partida para hoy esta a 30 min de empezar
                if($timeDiff < 3000 && $timeDiff > 0) {
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