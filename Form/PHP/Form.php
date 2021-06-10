<?php
include '../../servidor.php';
$servidor = new servidor();

$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$institucion = $_POST['institucion'];
$año = $_POST['año'];
$nacimiento = $_POST['nacimiento'];
$cedula = $_POST['cedula'];
$celular = $_POST['celular'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

if($tipo == 1){
    $contraseña = sha1($contraseña);
}

$x = $servidor->Register($tipo, $usuario, $cedula, $año, $apellido, $institucion, $nombre, $celular, $contraseña, $nacimiento, $email);

echo $x;
return $x;

?>