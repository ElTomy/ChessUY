<?php
include ('C:xampp/htdocs/ChessUY/servidor.php');
$servidor = new servidor();
$servidor->BorarSolicitud($_POST['usuario']);
?>