<?php
include 'verificosesion.php';
session_start();
include '../Form/conexion.php';


$file = $_POST['url'];
$idp= $_POST['idp'];
$ruta = '../img/PROYECT' .$idp; 
$ruta2='http://expoeduca.liceoiep.edu.uy/iep/img/PROYECT' .$idp.'/'.$file; 
$sql = "delete from imagenes where url = '".$ruta2."';";
$resultaa = $mysqli->query($sql);

$url = $ruta.'/'.$file;
unlink($url) or die("ERROR, NO SE PUDO ELIMINAR LA FOTO: ".$url);
echo "se borró el archivo ".$file." con el sql ".$sql;


?>  
