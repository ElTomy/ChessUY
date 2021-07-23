<?php
    include '/cyberhydra/servidor.php';
    $server= new servidor();
    session_start();

    $Usuario = $_POST['Usuario'];
    $Icono = $_POST['Icono'];
    $ColorIcono = $_POST['ColorIcono'];
    $ColorFondo = $_POST['ColorFondo'];


    $respuesta = $server->GuardoFotoPerfil($Usuario, $Icono, $ColorIcono, $ColorFondo);

    echo $respuesta;
    return $respuesta;
?>