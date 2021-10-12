<?php

include '../../servidor.php';
$server = new servidor();

$torneos = $server->InfoTorneo();
date_default_timezone_set("America/Montevideo");
$sinTorn = false;
$prim = true;
$fechaAct = date('Ymd');

$mesesEsp = array("1"=>"Enero", "2"=>"Febrero", "3"=>"Marzo", "4"=>"Abril", "5"=>"Mayo", "6"=>"Junio", "7"=>"Julio", "8"=>"Agosto", "9"=>"Setiembre", "10"=>"Octubre", "11"=>"Noviembre", "12"=>"Diciembre",);

if(count($torneos) < 1) {
    $sinTorn = true;
} else {
    for($i=0;$i<count($torneos);$i++) {
        $comTornP = explode(' ', str_replace('-', ' ', $torneos[$i]['InicioTorneo']));
        $fechTornP = $comTornP[0].$comTornP[1].$comTornP[2];
        $diff = $fechTornP - $fechaAct;
        if($prim) {
            $diffAnt = $diff;
            $j = $i;
            $prim = false;
        } else {
            if(abs($diff) <= abs($diffAnt)) {
                $j = $i;
                $diffAnt = $diff;
            }
        }
    }
    $comTorn = explode(' ', str_replace('-', ' ', $torneos[$j]['InicioTorneo']));
    $fechTorn = mktime(0, 0, 0, $comTorn[1], $comTorn[2], $comTorn[0]);

    $comInsc = explode('-', $torneos[$j]['Fecha_inicio']);
    $fechInsc = mktime(0, 0, 0, $comInsc[1], $comInsc[2], $comInsc[0]);

    $descUnid = 0;

    if($torneos[$j]['Numero_Participantes'] == 0) {
        $descJug = "<p>".$descUnid."/∞ <i class='fas fa-users'></i></p>";
    } else {
        if($descUnid == $torneos[$j]['Numero_Participantes']) {
            $descJug = "<p style='color: red'>".$descUnid."/".$descJug ." <i class='fas fa-users'></i></p>";
        } else {
            $descJug = "<p>".$descUnid."/".$descJug ." <i class='fas fa-users'></i></p>";
        }
    }

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
        $estado = "<p style='color: #ffaa00'>Las inscripciones se abren el ".date('j', $fechInsc)." de ".$mesesEsp[date('n', $fechInsc)]." del año ".date('Y', $fechInsc)." a las ".substr($comTorn[3], 0, -3)." horas</p>";
    } elseif(str_replace('-', '', $torneos[$j]['Fecha_inicio']) <= $fechaAct && str_replace('-', '', $torneos[$j]['Fecha_fin']) >= $fechaAct) {
        //Las inscripciones empezaron pero no terminaron
        if(str_replace('-', '', $torneos[$j]['Fecha_inicio']) == $fechaAct && str_replace(':', '', $comTornP[3]) >= date('gis')) {
            $estado = "<p style='color: white'>Inscripciones se abren hoy a las ".substr($comTorn[3], 0, -3)." horas</p>";
        } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
            $estado = "<p style='color: #ff4d4d'>Inscripciones cerradas</p>";
        } else {
            $estado = "<p style='color: green'>Inscripciones abiertas</p>";
        }
    } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct) {
        //Terminaron las inscripciones pero no comenzo el torneo
        $estado = "<p style='color: #ff4d4d'>Inscripciones cerradas</p>";
    } elseif($comTorn[0].$comTorn[1].$comTorn[2] <= $fechaAct) {
        //Ya comenzo el torneo
        if($comTorn[0].$comTorn[1].$comTorn[2] == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
            $estado = "En curso";
        } else {
            $estado = "<p style='color: #ff4d4d'>Inscripciones cerradas</p>";
        }
    } else {
        //Error inesperado
        $estado = "La verdad ni idea";
    }

    echo "
    <div class='torneo-left'>
        <img src='/ChessUY/media/images/Trofeo.png' alt=''>
        <div class='participantes'>"
        .$descJug.
        "</div>
    </div>
    <div class='torneo-right'>
        <div class='torneo-info'>
            <h2>".$torneos[$j]['nombre']."</h2>
            <p>Comienza el ".date('j', $fechTorn)." de ".$mesesEsp[date('n', $fechTorn)]." del año ".date('Y', $fechTorn)." a las ".substr($comTorn[3], 0, -3)." horas</p>
            <p>".$descELO."</p>
            <p>".$descEdad."</p>
            <p>".$descPart."</p>
            <p>".$descTemp."</p>
            ".$estado."
        </div>
        <div class='torneo-buttons'>
            <a onclick='uniraBD(".$torneos[$j]['ID_Torneo'].")'><i class='fas fa-plus-circle'></i> Unirse</a>
            <a onclick='mostEst(".$torneos[$j]['ID_Torneo'].")'><i class='fas fa-chart-line'></i> Estadisticas</a>
        </div>
    </div>  
    ";
}
if($sinTorn) {
    echo "<p style='color: white'>Disculpa, actalmente no hay torneos</p>";
}

?>