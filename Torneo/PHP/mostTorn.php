<?php

include '../../servidor.php';
$server = new servidor();

$torneos = $server->InfoTorneo();

$sinTorn = false;
$prim = true;
$fechaAct = date('Ymd');

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

        $diff = str_replace('-', '', $torneos[$i]['Fecha_inicio']) - $fechaAct;
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
    $com = str_replace('-', ' ', $torneos[$j]['InicioTorneo']);
    $comTorn = explode(' ', $com);
    $fechTorn = mktime(0, 0, 0, $comTorn[1], $comTorn[2], $comTorn[0]);

    if($torneos[$j]['ELO_Min'] == 0 && $torneos[$j]['ELO_Max'] == 0) {
        $descELO = "No tiene restricciones de ELO";
    } elseif($torneos[$j]['ELO_Min'] != 0 && $torneos[$j]['ELO_Max'] == 0) {
        $descELO = "El minimo de ELO requerido es de ".$torneos[$j]['ELO_Min']." puntos";
    } elseif($torneos[$j]['ELO_Min'] == 0 && $torneos[$j]['ELO_Max'] != 0) {
        $descELO = "El maximo de ELO permitido es de ".$torneos[$j]['ELO_Max']." puntos";
    } else {
        $descELO = "ELO de ".$torneos[$j]['ELO_Min']." a ".$torneos[$j]['ELO_Max']." puntos";
    }

    if($torneos[$j]['EdadMinima'] == 0 && $torneos[$j]['EdadMaxima'] == 0) {
        $descEdad = "No tiene restricciones de edad";
    } elseif($torneos[$j]['EdadMinima'] != 0 && $torneos[$j]['EdadMaxima'] == 0) {
        $descEdad = "Este torneo tiene edad minima de ".$torneos[$j]['EdadMinima']." años";
    } elseif($torneos[$j]['EdadMinima'] == 0 && $torneos[$j]['EdadMaxima'] != 0) {
        $descEdad = "Este torneo tiene edad maxima de ".$torneos[$j]['EdadMaxima']." años";
    } else {
        $descEdad = "La edad permitida es de ".$torneos[$j]['EdadMinima']." a ".$torneos[$j]['EdadMaxima']." años";
    }

    if($torneos[$j]['tiempo'] == 1) {
        $descTemp = "El torneo cuenta con ".$torneos[$j]['tiempo']." minuto por jugador";
    } else {
        $descTemp = "El torneo cuenta con ".$torneos[$j]['tiempo']." minutos por jugador";
    }

    if($torneos[$j]['PartidasxDia'] == 1) {
        $descPart = $torneos[$j]['PartidasxDia']." partida por dia";
    } else {
        $descPart = $torneos[$j]['PartidasxDia']." partidas por dia";
    }

    if(str_replace('-', '', $torneos[$j]['Fecha_inicio']) > $fechaAct) {
        //Las inscripciones no empezaron
        $estado = "Estado: Inscripciones se abren el ".date('j', $fechTorn)." de ".date('F', $fechTorn)." del año ".date('Y', $fechTorn)." a las ".substr($comTorn[3], 0, -3)." horas";
    } elseif(str_replace('-', '', $torneos[$j]['Fecha_inicio']) < $fechaAct && str_replace('-', '', $torneos[$j]['Fecha_fin']) > $fechaAct) {
        //Las inscripciones empezaron pero no terminaron
        $estado = "Estado: Inscripciones abiertas";
    } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct) {
        //Terminaron las inscripciones pero no comenzo el torneo
        $estado = "Inscripciones cerradas";
    } elseif($comTorn[0].$comTorn[1].$comTorn[2] < $fechaAct) {
        //Ya comenzo el torneo
        $estado = "En curso";
    } else {
        //Error inesperado
        $estado = "La verdad ni idea";
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
            <p>Comienza el ".date('j', $fechTorn)." de ".date('F', $fechTorn)." del año ".date('Y', $fechTorn)." a las ".substr($comTorn[3], 0, -3)." horas</p>
            <p>".$descELO."</p>
            <p>".$descEdad."</p>
            <p>".$descPart."</p>
            <p>".$descTemp."</p>
            <p>".$estado."</p>
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