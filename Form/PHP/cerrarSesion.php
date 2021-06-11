<?php
include '../../servidor.php';
$servidor = new servidor();
$servidor->cerrarSesion();

echo $_SESSION;
return $_SESSION;
?>