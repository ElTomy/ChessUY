<?php
include '../../../servidor.php';
$servidor = new servidor();

$Usuario = $_POST['Usuario'];
$Id = $_POST['Id'];
$Titulo = $_POST['Titulo'];
$Descripcion = $_POST['Descripcion'];
$Informacion = $_POST['Informacion'];
$img = $_POST['img'];

$servidor->ModificarNoticia($Usuario, $Id, $Titulo, $Descripcion, $Informacion, $img);

?>