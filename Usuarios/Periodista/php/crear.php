<?php
include '../../../servidor.php';
$servidor = new servidor();

$Usuario = $_POST['Usuario'];
$Titulo = $_POST['Titulo'];
$Descripcion = $_POST['Descripcion'];
$Informacion = $_POST['Informacion'];
$img = $_POST['img'];

echo json_encode($servidor->CrearNoticia($Usuario, $Titulo, $Descripcion, $Informacion, $img));
?>