<?php

include '../../servidor.php';
$server = new servidor();
date_default_timezone_set("America/Montevideo");
$torneos = $server->InfoTorneo();
$fechaAct = date('Ymd');

for($i=0;$i<count($torneos);$i++) {
    if(str_replace('-', '', $torneos[$i]['Fecha_inicio']) < $fechaAct && str_replace('-', '', $torneos[$i]['Fecha_fin']) > $fechaAct) {
        $comTornP = explode(' ', str_replace('-', ' ', $torneos[$i]['InicioTorneo']));
        $fechTornP = $comTornP[0].$comTornP[1].$comTornP[2];
        $descUnid = 0;

        if($torneos[$i]['Numero_Participantes'] == 0) {
            $descJug = "<p>".$descUnid."/∞ <i class='fas fa-users'></i></p>";
        } else {
            if($descUnid == $torneos[$i]['Numero_Participantes']) {
                $descJug = "<p style='color: red'>".$descUnid."/".$descJug ." <i class='fas fa-users'></i></p>";
            } else {
                $descJug = "<p>".$descUnid."/".$descJug ." <i class='fas fa-users'></i></p>";
            }
        }

        if(str_replace('-', '', $torneos[$i]['Fecha_inicio']) > $fechaAct) {
            //Las inscripciones no empezaron
            $estado = "<p style='color: #ffaa00'><span data-lang='insc-open-the'>Las inscripciones se abren el</span> ".date('j', $fechInsc)." <span data-lang='de-of'>de</span> ".$mesesEsp[date('n', $fechInsc)]." <span data-lang='of-the-year'>del año</span> ".date('Y', $fechInsc)." <span data-lang='alas-at'>a las</span> ".substr($comTorn[3], 0, -3)." <span data-lang='hours'>horas</span></p>";
        } elseif(str_replace('-', '', $torneos[$i]['Fecha_inicio']) <= $fechaAct && str_replace('-', '', $torneos[$i]['Fecha_fin']) >= $fechaAct) {
            //Las inscripciones empezaron pero no terminaron
            if(str_replace('-', '', $torneos[$i]['Fecha_inicio']) == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
                $estado = "<p style='color: white'><span data-lang='insc-open'>Inscripciones se abren hoy a las</span> ".substr($comTorn[3], 0, -3)." <span data-lang='hours'>horas</span></p>";
            } elseif(str_replace('-', '', $torneos[$i]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTornP[3]) <= date('gis')) {
                $estado = "<p style='color: red'><span data-lang='insc-closed'>Inscripciones cerradas</span></p>";
            } else {
                $estado = "<p style='color: green'><span data-lang='insc-opened'>Inscripciones abiertas</span></p>";
            }
        } elseif(str_replace('-', '', $torneos[$i]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct) {
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
        <div class='torneo'>
            <div class='torneo-left-side'>
                <img src='/cyberhydra/media/images/Trofeo.png'>
            </div>
            <div class='torneo-right-side'>
                <h1>Nombre del Torneo</h1>
                ".$estado.$descJug."
                <div class='torneo-right-buttons'>
                    <button><i class='fas fa-plus-circle'></i> <span data-lang='join'>Unirse</span></button>
                    <button><i class='fas fa-info-circle'></i> <span data-lang='info'>Información</span></button>
                </div>
            </div>
        </div>
        ";
    } else {
        echo "<p style='color: white'><span data-lang='sorry-tourn'>Disculpa, actalmente no hay torneos abiertos</span></p>";
    }
}


?>