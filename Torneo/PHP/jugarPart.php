<?php

include '../../servidor.php';
$server = new servidor();
session_start();
$idTorneo = $_POST['tornID'];

for($i) {
    $partAgen = $server->InfoPartidasAgendadas($i);
    if
}


echo "
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <i class='fas fa-chess-knight'></i>Torneo
";

?>