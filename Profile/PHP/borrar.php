<?php
    include '../../servidor.php';
    $server= new servidor();

    $usuario = $_POST['Usuario'];

    $server->BorrarUsuario($usuario)

?>