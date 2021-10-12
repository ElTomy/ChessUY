<?php
$Jug1_encontrado = false;
$Jug2_encontrado = false;
$usuarios = array();

$jugador1 = $_POST['jug1'];
$jugador2 = $_POST['jug2'];

if(isset($_POST['arUsuarios'])){
    $usuarios = json_decode($_POST['arUsuarios']);
}

foreach ($usuarios as $usu) {
    if($usu == $jugador1){
        $Jug1_encontrado = true;
    }else if($usu == $jugador2){
        $Jug2_encontrado = true;
    }
}

if($Jug1_encontrado == true && $Jug2_encontrado == true){
    $info = array('usuarios_conectados' => true);
}else{
    if($Jug1_encontrado != true){
        $info = array('usuarios_conectados' => false, 'usuario_desconectado' => $jugador1);
    }else{
        $info = array('usuarios_conectados' => false, 'usuario_desconectado' => $jugador2);
    }
}
echo json_encode($info); 
?>