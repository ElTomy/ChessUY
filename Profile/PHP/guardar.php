<?php

include '../../servidor.php';
$server= new servidor();

$usuarios = $server->InfoUsuario();
$numero_usuarios = count($usuarios);

$usuarioactual = $_POST['Usuario_Actual'];


$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$institucion = $_POST['institucion'];
$año = $_POST['año'];
$documento = $_POST['documento'];
$celular = $_POST['celular'];

$error = 0;

if($usuarioactual == $usuario){
    $server->ActualizarUsuario($usuario, $nombre, $apellido, $email, $institucion, $año, $documento, $celular);
}else{
    for($x = 1; $x <= $numero_usuarios; $x++){
        $username = strtolower($usuarios[($x - 1)]['usuario']);
    
        if($username == $usuario){
            $error = 1;
        }
    }
    if($error == 0){
        $server->CambioNombre($usuario, $usuarioactual);
        $server->ActualizarUsuario($usuario, $nombre, $apellido, $email, $institucion, $año, $documento, $celular);
    }
}
echo $error;
return $error;

?>