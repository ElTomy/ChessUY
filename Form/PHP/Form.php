<?php
include '../../servidor.php';

$servidor = new servidor();

$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$apellido = isset($_POST['apellido']);
$institucion = isset($_POST['institucion']);
$año = isset($_POST['año']);
$nacimiento = isset($_POST['nacimiento']);
$cedula = isset($_POST['cedula']);
$celular = isset($_POST['celular']);
$usuario = isset($_POST['usuario']);
$email = isset($_POST['email']);
$contraseña = isset($_POST['contraseña']);

echo "Tipo:" . $tipo;
?>