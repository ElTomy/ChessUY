<?php
    include '../../servidor.php';
    $server= new servidor();

    $usuario = $_POST['Usuario'];
    $contraseñaActual = $_POST['ContraActual'];
    $contra = $_POST['Contra'];

    $usuario_info = $server->PerfilUsuario($usuario);

    $error = 0;

    if($usuario_info['Contraseña'] == sha1($contraseñaActual)){
        $server->CambiarContraseña($usuario, sha1($contra));
    }else{
        $error = 1;
    }

    echo $error;
    return $error;
?>