<?php
include '../../servidor.php';
session_start();
$server= new servidor();
$tablero = $_POST["tablero"];

if(isset($_POST['turno'])){
    $turno = $_POST['turno'];
}else{$turno = 1;}
if(isset($_POST['movimientos'])){
    $movimientos = $_POST['movimientos'];
}else{$movimientos = '';}
if(isset($_POST['barra'])){
    $barra = $_POST['barra'];
}else{$barra = 50;}
echo $server->guardoTablero($_POST['id_partido'], $tablero, $turno, $movimientos,$barra,$_POST['temp1'],$_POST['temp2']); 
?>