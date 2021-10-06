<?php
include '../../servidor.php';
$server= new servidor();
session_start();
$partidos = $server->TraigoPartidos();
$info = '';
$usu = $_SESSION["usuario"];
$Icon = $_SESSION["icono"];
$colFondo = $_SESSION["colorfondo"];
$colIcon = $_SESSION["coloricono"];

if($_SESSION['tipo'] == 0){
    $tipo = "<i class='fas fa-star'></i> Administrador";
}else if($_SESSION['tipo'] == 1){
    $tipo = "<i class='fas fa-chess-knight'></i> Jugador";
}else if($_SESSION['tipo'] == 2){
    $tipo = "<i class='fas fa-ruler-horizontal'></i> Árbitro";
}else if($_SESSION['tipo'] == 3){
    $tipo = "<i class='fas fa-microphone'></i> Periodista";
}


$colorJugador ="style= 'color: #ffaa00'"; 
$colorJugador2 ="style= 'color: #ffaa00'"; 

    $usu2 = 'Jugador2';
    $colIcon2 = '#ffffff';
    $Icon2 = 'fas fa-user';
    $colFondo2 =  '#0076be';
    $tipo2 = 1;


if($tipo2 == 0){
    $tipo2 = "<i class='fas fa-star'></i> Administrador";
}else if($tipo2 == 1){
    $tipo2 = "<i class='fas fa-chess-knight'></i> Jugador";
}else if($tipo2 == 2){
    $tipo2 = "<i class='fas fa-ruler-horizontal'></i> Árbitro";
}else if($tipo2 == 3){
    $tipo2 = "<i class='fas fa-microphone'></i> Periodista";
}
$info = '  <a href="/ChessUY/Profile/'.$usu.'">
                    <div class="JugadorUno">
                        <div class="jugador-img" style="background-color:'.$colFondo.'">
                            <i class="'.$Icon.'" style="color:'.$colIcon.'"></i>
                        </div>
                        <div class="jugador-body">
                            <h1 '.$colorJugador.' >'.$usu.'</h1>
                            <p>'.$tipo.'</p>
                        </div>
                    </div>

                </a>
                    <h1>vs</h1>
                    <a href="/ChessUY/Profile/'.$usu2.'">
                    <div class="JugadorDos">
                        <div class="jugador-img" style="background-color:'.$colFondo2.'">
                            <i class="'.$Icon2.'" style="color:'.$colIcon2.'"></i>
                        </div>
                        <div class="jugador-body">
                            <h1 '.$colorJugador2.' >'.$usu2.'</h1>
                            <p>'.$tipo2.'</p>
                        </div>
                    </div>
                </a>';

echo $info;
?>