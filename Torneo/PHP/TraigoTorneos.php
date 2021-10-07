<?php
include '../../servidor.php';
$server= new servidor();
$Torneos = $server->InfoTorneo();
$numero_Torneos = count($Torneos);
$fechaAct = date('Ymd');
$return = '';
$a = 0;
for($x=0;$x<$numero_Torneos;$x++){
    $comTorn = explode(' ', str_replace('-', ' ', $Torneos[$x]['InicioTorneo']));
    //if(($comTorn[0].$comTorn[1].$comTorn[2] == $fechaAct && str_replace(':', '', $comTorn[3]) <= date('gis'))||(str_replace('-', '', $Torneos[$x]['Fecha_fin']) < $fechaAct && $comTorn[0].$comTorn[1].$comTorn[2] > $fechaAct)||(str_replace('-', '', $Torneos[$x]['Fecha_fin']) == $fechaAct && str_replace(':', '', $comTorn[3]) <= date('gis'))){
        $id = $Torneos[$x]['ID_Torneo'];
        $nombre = $Torneos[$x]['nombre'];
        $return .='
        <div class="Torneo">
            <div class="img">
             <img src="/ChessUY/media/images/Trofeo.png"></img>
            </div>
            <div class="info">
                <h2>'.$nombre.'</h2>
                <a class="boton-fixture" style="color: white" onclick="Ficture('.$id.')">Fixture</a>
            </div>
            
        </div>';
        $a = 1;
    //}
}
if($a == 0){
     $return .='<a style="color: white" >No hay Torneos o sus inscripciones estan abiertas</a>';
}
echo $return;
return $return;
?>