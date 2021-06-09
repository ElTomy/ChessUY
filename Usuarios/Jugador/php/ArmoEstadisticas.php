<?php
include '../../../servidor.php';
session_start();
$Usuario = $_SESSION['usuario'];
$server= new servidor();
list($ELO,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos) = $server->InfoEstadisticas($Usuario);
$return =
"<div class='estadisticas-wrapper'>
    <div>
        <p><b>ELO: </b>$ELO</p>
        <p><b>Victorias: </b>$Victorias</p>
        <p><b>Derrotas: </b>$Derrotas</p>
        <p><b>Tablas: </b>$Tablas</p>
        <p><b>Coronaciones: </b>$Coronaciones</p>
        <p><b>Cantidad de piezas comidas: </b>$Comidas</p>
        <p><b>Victoria en menos tiempo: </b>$Menos_Tiempo</p>
        <p><b>Victoria en menos movimientos: </b>$Menos_Movimientos</p>
    </div>
</div>";
echo $return;
return $return;
?>