<?php
include ('C:xampp/htdocs/ChessUY/servidor.php');
$servidor = new servidor();
echo json_encode($servidor->InfoSolicitudes())
?>