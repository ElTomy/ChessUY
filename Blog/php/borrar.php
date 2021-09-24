<?php
    include '../../servidor.php';
    $server= new servidor();
    session_start();

    $id = $_POST['ID'];
    
    if($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 3){
        $server->EliminarNoticia($id);
    }
?>