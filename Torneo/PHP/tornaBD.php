<?php
include '../../servidor.php';
$servidor = new servidor();

if(isset($_POST['tiempo']) && isset($_POST['ELO_Min']) && isset($_POST['ELO_Max']) && isset($_POST['Fecha_inicio']) && isset($_POST['Fecha_fin']) &&isset($_POST['Numero_Participantes']) &&isset($_POST['TiempoDescalificar']) && isset($_POST['PartidasxDia']) && isset($_POST['CantidaddeReservas']) && isset($_POST['Localidad']) && isset($_POST['EdadMinima']) && isset($_POST['EdadMaxima']) && isset($_POST['InicioTorneo'])) {
    $tiempo = $_POST['tiempo'];
    $ELO_Min = $_POST['ELO_Min'];
    $ELO_Max = $_POST['ELO_Max'];
    $Fecha_inicio = $_POST['Fecha_inicio'];
    $Fecha_fin = $_POST['Fecha_fin'];
    $Numero_Participantes = $_POST['Numero_Participantes'];
    $TiempoDescalificar = $_POST['TiempoDescalificar'];
    $PartidasxDia = $_POST['PartidasxDia'];
    $CantidaddeReservas = $_POST['CantidaddeReservas'];
    $Localidad = $_POST['Localidad'];
    $EdadMinima = $_POST['EdadMinima'];
    $EdadMaxima = $_POST['EdadMaxima'];
    $InicioTorneo = $_POST['InicioTorneo'];
}

$x = $servidor->CrearTorneo($tiempo, $ELO_Min, $ELO_Max, $Fecha_inicio, $Fecha_fin, $Numero_Participantes, $TiempoDescalificar, $PartidasxDia, $CantidaddeReservas, $Localidad, $EdadMinima, $EdadMaxima, $InicioTorneo);

echo $x;

?>