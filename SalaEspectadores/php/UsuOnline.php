<?php
include '../../servidor.php';
session_start();
$server= new servidor();

if($_POST['action'] == 'agregar'){
    echo $server->AgregoUsuarioOnline($_SESSION['usuario']); 
}else if($_POST['action'] == 'borrar'){
    echo $server->BorroUsuarioOnline($_SESSION['usuario']); 
}

?>