<?php

include '../../servidor.php';
$server = new servidor();

$torneos = $server->InfoTorneo();

$sinTorn = false;
$prim = true;

if(count($torneos) < 1) {
    $sinTorn = true;
} else {
    for($i=0;$i<count($torneos);$i++) {
        /*if(str_replace('-', '', $torneos[$i]['Fecha_inicio']) > date('Ymd') && str_replace('-', '', $torneos[$i]['Fecha_inicio']) > date('Ymd')) {
            echo "

        <div class='torneo-left'>
            <img src='/ChessUY/media/images/Trofeo.png' alt=''>
            <div class='participantes'>
                <p>". $torneos[$i]['Numero_Participantes'] ." <i class='fas fa-users'></i></p>
            </div>
        </div>
        <div class='torneo-right'>
            <div class='torneo-info'>
                <h2>Nombre del Torneo</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus dolores ducimus exercitationem eius laborum saepe facilis molestiae officia tempore totam?</p>
            </div>
            <div class='torneo-buttons'>
                <a href=''><i class='fas fa-plus-circle'></i> Unirse</a>
                <a href='/ChessUY/Usuarios/EstadisticasTorneo.php'><i class='fas fa-chart-line'></i> Estadisticas</a>
            </div>
        </div>
        
        ";
        } else {
            $sinTorn = true;
        }*/

        $diff = str_replace('-', '', $torneos[$i]['Fecha_inicio']) - date('Ymd');
        if($prim) {
            $diffAnt = $diff;
            $j = $i;
            $prim = false;
        } else {
            if(abs($diff) < abs($diffAnt)) {
                $j = $i;
                $diffAnt = $diff;
            }
        }
    }
    echo "
    <div class='torneo-left'>
        <img src='/ChessUY/media/images/Trofeo.png' alt=''>
        <div class='participantes'>
            <p>". $torneos[$j]['Numero_Participantes'] ." <i class='fas fa-users'></i></p>
        </div>
    </div>
    <div class='torneo-right'>
        <div class='torneo-info'>
            <h2>Nombre del Torneo</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus dolores ducimus exercitationem eius laborum saepe facilis molestiae officia tempore totam?</p>
        </div>
        <div class='torneo-buttons'>
            <a href=''><i class='fas fa-plus-circle'></i> Unirse</a>
            <a href='/ChessUY/Usuarios/EstadisticasTorneo.php'><i class='fas fa-chart-line'></i> Estadisticas</a>
        </div>
    </div>  
    ";
}
if($sinTorn) {
    echo "No hay torneos actualmente y eso xd";
}

?>