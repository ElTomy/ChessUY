<?php
session_start();
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

if(isset($_POST['Turno'])){
    $Turnos = $_POST['Turno'];

    if($Turnos%2 == 0){
        $colorJugador =  "";
        $colorJugador2 ="style= 'color: #ffaa00'"; 
    }else{
        $colorJugador ="style= 'color: #ffaa00'"; 
        $colorJugador2 =""; 
    }
}

$jugadores = '  <a href="/ChessUY/Profile/'.$usu.'">
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
                    <a href="/ChessUY/Profile/BOT">
                    <div class="JugadorDos">
                        <div class="jugador-body">
                            <h1 '.$colorJugador2.'>ALFI ᴮᴼᵀ</h1>
                            <p><i class="fas fa-robot"></i> BOT</p>
                        </div>
                        <div class="jugador-img" style="background-color:#ffffff">
                            <i class="fas fa-robot"  style="color:#000000"></i>
                        </div>
                    </div>
                </a>';

                echo $jugadores;
                return $jugadores;

?>