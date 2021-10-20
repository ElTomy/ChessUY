<?php

include '../../servidor.php';
$server = new servidor();
date_default_timezone_set('America/Montevideo');
$torneos = $server->InfoTorneo();
date_default_timezone_set("America/Montevideo");
$sinTorn = false;
$prim = true;
$fechaAct = date('Ymd');

$mesesEsp = array("1"=>"<span data-lang='jan'>Enero</span>", "2"=>"<span data-lang='feb'>Febrero</span>", "3"=>"<span data-lang='mar'>Marzo</span>", "4"=>"<span data-lang='apr'>Abril</span>", "5"=>"<span data-lang='may'>Mayo</span>", "6"=>"<span data-lang='jun'>Junio</span>", "7"=>"<span data-lang='jul'>Julio</span>", "8"=>"<span data-lang='aug'>Agosto</span>", "9"=>"<span data-lang='sep'>Setiembre</span>", "10"=>"<span data-lang='oct'>Octubre</span>", "11"=>"<span data-lang='nov'>Noviembre</span>", "12"=>"<span data-lang='dec'>Diciembre</span>",);

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
        $descELO = "<span data-lang='NEReq'>No tiene restricciones de ELO</span>";
    } elseif($torneos[$j]['ELO_Min'] != 0 && $torneos[$j]['ELO_Max'] == 0) {
        $descELO = "<span data-lang='MinEReq'>El minimo de ELO requerido es de</span> ".$torneos[$j]['ELO_Min']." <span data-lang='points'>puntos</span>";
    } elseif($torneos[$j]['ELO_Min'] == 0 && $torneos[$j]['ELO_Max'] != 0) {
        $descELO = "<span data-lang='MaxEReq'>El maximo de ELO permitido es de</span> ".$torneos[$j]['ELO_Max']." <span data-lang='points'>puntos</span>";
    } else {
        $descELO = "<span data-lang='ERang'>ELO de</span> ".$torneos[$j]['ELO_Min']." <span data-lang='a-to'>a</span> ".$torneos[$j]['ELO_Max']." <span data-lang='points'>puntos</span>";
    }

    if($torneos[$j]['EdadMinima'] == 0 && $torneos[$j]['EdadMaxima'] == 0) {
        $descEdad = "<span data-lang='NAReq'>No tiene restricciones de edad</span>";
    } elseif($torneos[$j]['EdadMinima'] != 0 && $torneos[$j]['EdadMaxima'] == 0) {
        $descEdad = "<span data-lang='MinAReq'>Este torneo tiene edad minima de</span> ".$torneos[$j]['EdadMinima']." <span data-lang='years'>años</span>";
    } elseif($torneos[$j]['EdadMinima'] == 0 && $torneos[$j]['EdadMaxima'] != 0) {
        $descEdad = "<span data-lang='MaxAReq'>Este torneo tiene edad maxima de</span> ".$torneos[$j]['EdadMaxima']." <span data-lang='years'>años</span>";
    } else {
        $descEdad = "<span data-lang='ARang'>La edad permitida es de</span> ".$torneos[$j]['EdadMinima']." <span data-lang='a-to'>a</span> ".$torneos[$j]['EdadMaxima']." <span data-lang='years'>años</span>";
    }

    if($torneos[$j]['tiempo'] == 1) {
        $descTemp = "<span data-lang='the-tourn-has'>El torneo cuenta con</span> ".$torneos[$j]['tiempo']." <span data-lang='mpp1'>minuto por jugador</span>";
    } else {
        $descTemp = "<span data-lang='the-tourn-has'>El torneo cuenta con</span> ".$torneos[$j]['tiempo']." <span data-lang='mpp2'>minutos por jugador</span>";
    }

    if($torneos[$j]['PartidasxDia'] == 1) {
        $descPart = $torneos[$j]['PartidasxDia']." <span data-lang='gpd1'>partida por dia</span>";
    } else {
        $descPart = $torneos[$j]['PartidasxDia']." <span data-lang='gpd2'>partidas por dia</span>";
    }

    if(str_replace('-', '', $torneos[$j]['Fecha_inicio']) > $fechaAct) {
        //Las inscripciones no empezaron
        $estado = "<p style='color: #ffaa00'><span data-lang='insc-open-the'>Las inscripciones se abren el</span> ".date('j', $fechInsc)." <span data-lang='de-of'>de</span> ".$mesesEsp[date('n', $fechInsc)]." <span data-lang='of-the-year'>del año</span> ".date('Y', $fechInsc)." <span data-lang='alas-at'>a las</span> ".substr($comTorn[3], 0, -3)." <span data-lang='hours'>horas</span></p>";
    } elseif(str_replace('-', '', $torneos[$j]['Fecha_inicio']) <= $fechaAct && str_replace('-', '', $torneos[$j]['Fecha_fin']) >= $fechaAct) {
        //Las inscripciones empezaron pero no terminaron
        if(str_replace('-', '', $torneos[$j]['Fecha_inicio']) == $fechaAct && str_replace(':', '', $comTornP[3]) >= date('gis')) {
            $estado = "<p style='color: white'><span data-lang='insc-open'>Inscripciones se abren hoy a las</span> ".substr($comTorn[3], 0, -3)." <span data-lang='hours'>horas</span></p>";
        } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
            $estado = "<p style='color: red'><span data-lang='insc-closed'>Inscripciones cerradas</span></p>";
        } else {
            $estado = "<p style='color: green'><span data-lang='insc-opened'>Inscripciones abiertas</span></p>";
        }
    } elseif(str_replace('-', '', $torneos[$j]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct) {
        //Terminaron las inscripciones pero no comenzo el torneo
        $estado = "<p style='color: red'><span data-lang='insc-closed'>Inscripciones cerradas</span></p>";
    } elseif($comTorn[0].$comTorn[1].$comTorn[2] <= $fechaAct) {
        //Ya comenzo el torneo
        if($comTorn[0].$comTorn[1].$comTorn[2] == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
            $estado = "<span data-lang='on-course'>En curso</span>";
        } else {
            $estado = "<p style='color: red'><span data-lang='insc-closed'>Inscripciones cerradas</span></p>";
        }
    } else {
        //Error inesperado
        $estado = "La verdad ni idea";
    }

    echo "
    <div class='torneo-left'>
        <img src='/cyberhydra/media/images/Trofeo.png' alt=''>
        <div class='participantes'>"
        .$descJug.
        "</div>
    </div>
    <div class='torneo-right'>
        <div class='torneo-info'>
            <h2>".$torneos[$j]['nombre']."</h2>
            <p><span data-lang='torn-start'>Comienza el</span> ".date('j', $fechTorn)." <span data-lang='de-of'>de</span> ".$mesesEsp[date('n', $fechTorn)]." <span data-lang='of-the-year'>del año</span> ".date('Y', $fechTorn)." <span data-lang='alas-at'>a las</span> ".substr($comTorn[3], 0, -3)." <span data-lang='hours'>horas</span></p>
            <p>".$descELO."</p>
            <p>".$descEdad."</p>
            <p>".$descPart."</p>
            <p>".$descTemp."</p>
            ".$estado."
        </div>
        <div class='torneo-buttons'>
            <a onclick='uniraBD(".$torneos[$j]['ID_Torneo'].")'><i class='fas fa-plus-circle'></i> <span data-lang='join'>Unirse</span></a>
            <a onclick='mostEst(".$torneos[$j]['ID_Torneo'].")'><i class='fas fa-chart-line'></i> <span data-lang='stats'>Estadisticas</span></a>
        </div>
    </div>  
    ";
}
if($sinTorn) {
    echo "<p style='color: white'>Disculpa, actalmente no hay torneos</p>";
}

?>