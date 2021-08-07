<?php

include '../../servidor.php';
$server = new servidor();

$torneos = $server->InfoTorneo();
$fechaAct = date('Ymd');

for($i=0;$i<count($torneos);$i++) {
    if(str_replace('-', '', $torneos[$i]['Fecha_inicio']) < $fechaAct && str_replace('-', '', $torneos[$i]['Fecha_fin']) > $fechaAct) {
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
            $estado = "<p style='color: white'>Inscripciones se abren el ".date('j', $fechTorn)." de ".date('F', $fechTorn)." del año ".date('Y', $fechTorn)." a las ".substr($comTorn[3], 0, -3)." horas</p>";
        } elseif(str_replace('-', '', $torneos[$i]['Fecha_inicio']) < $fechaAct && str_replace('-', '', $torneos[$i]['Fecha_fin']) > $fechaAct) {
            //Las inscripciones empezaron pero no terminaron
            $estado = "<p style='color: green'>Inscripciones abiertas</p>";
        } elseif(str_replace('-', '', $torneos[$i]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct) {
            //Terminaron las inscripciones pero no comenzo el torneo
            $estado = "<p style='color: red'>Inscripciones cerradas</p>";
        } elseif($comTorn[0].$comTorn[1].$comTorn[2] < $fechaAct) {
            //Ya comenzo el torneo
            $estado = "En curso";
        } else {
            //Error inesperado
            $estado = "La verdad ni idea";
        }

        echo "
        <div class='torneo'>
            <div class='torneo-left-side'>
                <img src='/ChessUY/media/images/Trofeo.png'>
            </div>
            <div class='torneo-right-side'>
                <h1>Nombre del Torneo</h1>
                ".$estado.$descJug."
                <div class='torneo-right-buttons'>
                    <button><i class='fas fa-plus-circle'></i> Unirse</button>
                    <button><i class='fas fa-info-circle'></i> Información</button>
                </div>
            </div>
        </div>
        ";
    }
}

?>