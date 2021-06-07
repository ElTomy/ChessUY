<?php
include '/ChessUy/servidor.php';
$server= new servidor();
$log = array();
if(isset($_POST['usuario'])){
    $user = $_POST["usuario"];
    $pwd = $_POST["passw"];
    echo json_encode($server->login($user, $pwd)); 
}else{
    $log[0] = "asd";
    echo json_encode($log);
}
?>