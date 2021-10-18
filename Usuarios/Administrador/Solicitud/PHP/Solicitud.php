<?php
include 'cyberhydra/servidor.php';
$servidor = new servidor();
echo json_encode($servidor->InfoSolicitudes())
?>