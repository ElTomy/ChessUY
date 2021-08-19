<?php
include '../../servidor.php';
$server= new servidor();
$Torneos = $server->InfoTorneo();
$numero_Torneos = count($Torneos);
$return = '';
for($x=0;$x<$numero_Torneos;$x++){
    $id = $Torneos[$x]['ID_Torneo'];
    $return .='<botton onclick="Ficture('.$id.')">Fixture</botton>';
}
echo $return;
return $return;
?>