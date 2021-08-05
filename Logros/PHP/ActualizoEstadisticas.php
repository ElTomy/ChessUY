<?php

include '../../servidor.php';
$server= new servidor();
session_start();

$Usuario = $_SESSION['usuario'];
$ID_Logro = $server->TraigoMisLogros($Usuario);
$Cantidad = count($ID_Logro);
list($ELO,$Victorias,$Tablas,$Derrotas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos) = $server->InfoEstadisticas($Usuario);
$victoria = $_POST['victorias'];
$Derrota = $_POST['derrotas'];
$Tiempo = $_POST['menos_tiempo'];
if($Tiempo > $Menos_Tiempo || $Derrota > 0){
    $Tiempo = $Menos_Tiempo;
}
$Tabla = $_POST['tablas'];
$Coronacione = $_POST['coronaciones'];
$Comida = $_POST['comidas'];
$victoria = $victoria + $Victorias;
$Derrota = $Derrota + $Derrotas;
$Tabla = $Tabla + $Tablas;
$Coronacione = $Coronacione + $Coronaciones;
$Comida = $Comida + $Comidas;
$Movimientos = $_POST['menos_movimientos'];
if($Movimientos > $Menos_Movimientos){
    $Movimientos = $Menos_Movimientos;
}
$server->AgregarEstadistica($Usuario, $ELO, $victoria, $Tabla, $Derrota, $Coronacione, $Comida, $Tiempo, $Movimientos);
$Logros = [];
$x = 1;
if($victoria>=100){
    $Logros[1]=1;
    $Logros[2]=2;
    $Logros[3]=3;
    $x =+ 4;
}else{
    if($victoria>=10){
        $Logros[1]=1;
        $Logros[2]=2;
        $x =+ 3;
    }else{
        if($victoria>=1){
            $Logros[1]=1;
            $x=+ 2;
        }
    }
}
/*if(isset($_POST("Reloj"))){
    $reloj = $_POST("Reloj");
    if($reloj = 0){
        $Logros[$x]=4;
        $x++;
    }
}*/
if($Coronacione>=10){
    $Logros[$x]=5;
    $x++;
}
if($Comida>=1000){
    $Logros[$x]=6;
    $Logros[($x+1)]=7;
    $x =+ 2;
}else{
    if($Comida>=100){
        $Logros[$x]=6;
        $x++;
    }
}
if($Tiempo<=20){
    $Logros[$x]=8;
    $x++;
}
if($Movimientos <= 4){
    $Logros[$x]=9;
    $x++;
}
/*if(isset($_POST("Campeon"))){
    $Campeon = $_POST("Campeon");
    $Logros[$x]=10;
}*/
for($i = 1;$i<$x;$i++){
    if($Cantidad > 0){
        $a = 0;
        for($z = 0;$z<$Cantidad;$z++){
            if($Logros[$i] == $ID_Logro[$z]["ID"]){
                $a = 1;
            }
        }
        if($a == 0){
            $log = $Logros[$i];
            $server->NuevoLogro($Usuario,$log);
        }
    }else{
        $log = $Logros[$i];
        $server->NuevoLogro($Usuario,$log);
    }
}
echo json_encode($server->InfoEstadisticas($Usuario));
?>