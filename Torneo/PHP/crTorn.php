<?php

if(isset($_POST['tempDesc'])) {
    echo 'Tiempo para descalificar: '.$_POST['tempDesc'].' <br> ';
}
if(isset($_POST['tempJug'])) {
    echo 'Tiempo total por jugador: '.$_POST['tempJug'].' <br> ';
}
if(isset($_POST['partDia'])) {
    echo 'Cantidad de partidas por dia: '.$_POST['partDia'].' <br> ';
}
if(isset($_POST['cantJug'])) {
    echo 'Cantidad de Jugadores: '.$_POST['cantJug'].' <br> ';
}
if(isset($_POST['eloMax'])) {
    echo 'ELO maximo: '.$_POST['eloMax'].' <br> ';
}
if(isset($_POST['eloMin'])) {
    echo 'ELO minimo: '.$_POST['eloMin'].' <br> ';
}
if(isset($_POST['opcRes'])) {
    echo 'Que hacer cuando se llega al maximo de jugadores: '.$_POST['opcRes'].' <br> ';
    if(isset($_POST['opcRes']) || isset($_POST['limRes']) && $_POST['opcRes'] == "listRes") {
        if($_POST['limRes'] == "canti") {
            echo 'Cantidad de reservas: '.$_POST['cantRes'].' <br> ';
        } elseif($_POST['limRes'] == "fecha") {
            echo 'Fecha de fin de reservas: '.$_POST['fechRes'].' <br> ';
        }
    }
}
if(isset($_POST['locTorn'])) {
    echo 'Localidad: '.$_POST['locTorn'].' <br> ';
}
if(isset($_POST['edaMax'])) {
    echo 'Edad maxima: '.$_POST['edaMax'].' <br> ';
}
if(isset($_POST['edaMin'])) {
    echo 'Edad minima: '.$_POST['edaMin'].' <br> ';
}
if(isset($_POST['prem'])) {
    echo 'Premio: '.$_POST['prem'].' <br> ';
}

//echo ': '.$_POST[''].' <br> ';
//echo ': '.$_POST[''].' <br> ';
?>