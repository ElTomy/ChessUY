<?php
include '../../servidor.php';
$server= new servidor();
$Torneos = $server->InfoTorneo();
$numero_Torneos = count($Torneos);
$fechaAct = date('Ymd');
$return = '';
for($x=0;$x<$numero_Torneos;$x++){
    $comTorn = explode(' ', str_replace('-', ' ', $Torneos[$x]['InicioTorneo']));
    if(($comTorn[0].$comTorn[1].$comTorn[2] == $fechaAct && str_replace(':', '', $comTorn[3]) <= date('gis'))||(str_replace('-', '', $Torneos[$x]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct)||(str_replace('-', '', $Torneos[$x]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTorn[3]) <= date('gis'))) {
        $id = $Torneos[$x]['ID_Torneo'];
        $nombre = $Torneos[$x]['nombre'];
        $return .='
        <a>'.$nombre.'</a>
        <div class="buttons" style="margin: 0;">
            <a onclick="Ficture('.$id.')">Fixture</a>
        </div>';
    }else{
        $return .='<a>No hay Torneos o sus inscripciones estan abiertas</a>';
    }
}
echo $return;
return $return;
?>