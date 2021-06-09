<?php
include ('C:xampp/htdocs/ChessUY/servidor.php');
$servidor = new servidor();
$servidor->AgregarUsuario($_POST['tipo'],$_POST['usuario'],$_POST['ci'],$_POST['año'],$_POST['apellido'],$_POST['institucion'],$_POST['nombre'],$_POST['contacto'],$_POST['contraseña'],$_POST['nacimiento'],$_POST['mail']);
?>