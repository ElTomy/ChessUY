<?php

include '../../servidor.php';
$server = new servidor();

$torneos = $server->InfoTorneo();

if(count($torneos) < 1) {
    echo "No hay torneos";
} else {
    for($i=0;$i<count($torneos);$i++) {
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
    }

}


?>