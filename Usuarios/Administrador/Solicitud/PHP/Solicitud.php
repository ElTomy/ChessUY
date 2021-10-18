<?php
include '../../../../servidor.php';
$servidor = new servidor();
echo json_encode($servidor->InfoSolicitudes())
?>