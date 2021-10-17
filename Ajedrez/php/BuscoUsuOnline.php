<?php
include '../../servidor.php';
session_start();
$server= new servidor();
$info = $server->BuscoUsuarioOnline();
$partidos = $server->TraigoPartidos();
$partidoEncontrado = false;
$encontrado = false;
$usuarios = array();

if(isset($_POST['arUsuarios'])){
    $usuarios = json_decode($_POST['arUsuarios']);
}

//:BUSCO SI ESTA CONECTADO EL JUGADOR 2
foreach ($partidos as $buscoPartido) {
    if($buscoPartido['usu1'] == $_SESSION['usuario'] || $buscoPartido['usu2'] == $_SESSION['usuario']){
     $partidoEncontrado = true;
     if($buscoPartido['usu1'] == $_SESSION['usuario']){
            $jugador2 = $buscoPartido['usu2'];
     }else{
            $jugador2 = $buscoPartido['usu1'];
     }
     break;
    }
}
if($partidoEncontrado == true){
    foreach ($usuarios as $usu) {
        if($usu == $jugador2){
            $encontrado = true;
        }
    }
}
$info = array('encontrado' => $encontrado,'jugador2' => $jugador2);
echo json_encode($info); 
?>