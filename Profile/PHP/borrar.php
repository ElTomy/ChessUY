<?php
    include '../../servidor.php';
    $server= new servidor();
    session_start();
    $usuario = $_POST['Usuario'];
    
    if($usuario == $_SESSION['usuario'] || $_SESSION['tipo'] == 0){
        $server->BorrarUsuario($usuario);
    }
?>