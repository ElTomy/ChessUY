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
echo $server->guardoTablero($_SESSION['usuario'], $tablero, $turno, $movimientos); 
?>