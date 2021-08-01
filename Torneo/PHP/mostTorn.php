<?php

include '../../servidor.php';
$server = new servidor();
date_default_timezone_set('America/Montevideo');
$torneos = $server->InfoTorneo();

$sinTorn = false;

if(count($torneos) < 1) {
    $sinTorn = true;
} else {
    for($i=0;$i<count($torneos);$i++) {
        if(str_replace('-', '', $torneos[$i]['Fecha_inicio']) > date('Ymd') && str_replace('-', '', $torneos[$i]['Fecha_inicio']) > date('Ymd')) {
            echo "

        <div class='torneo-left'>
            <img src='/cyberhydra/media/images/Trofeo.png' alt=''>
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
                <a href='/cyberhydra/Usuarios/EstadisticasTorneo.php'><i class='fas fa-chart-line'></i> Estadisticas</a>
            </div>
        </div>
        
        ";
        } else {
            $sinTorn = true;
        }
    }

}
if($sinTorn) {
    echo "manco";
}

?>