<?php
include '../servidor.php';
$server= new servidor();
session_start();
$usuario = $_SESSION['usuario'];
$Icono = $_SESSION['icono']; 
$ColorIcono = $_SESSION['coloricono'];
$ColorFondo = $_SESSION['colorfondo'];

$tipo = array("<i class='fas fa-star'></i> Administrador", "<i class='fas fa-chess-knight'></i> Jugador", "<i class='fas fa-ruler-horizontal'></i> Árbitro", "<i class='fas fa-microphone'></i> Periodista")
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script
      src="https://kit.fontawesome.com/1e193e3a23.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/ChessUY/Javascript/Loader.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    <script src="/ChessUY/Profile/JS/avatarChange.js"></script>

    
    <link
      rel="shortcut icon"
      href="/ChessUY/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/ChessUY/styles/styles.css" />

    <title>ChessUY | Editar Avatar</title>
  </head>
  <body>
    
    <div id="header"></div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="/ChessUY/media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <?php

    echo '<section class="avatar-wrapper">
            <div class="avatar-profile">
                <div class="avatar-profile-wrapper">
                    <div class="avatar" style="background-color: '. $ColorFondo.'">
                        <i class="' . $Icono . '" id="icon" style="color: '. $ColorIcono.'"></i>
                    </div>
                </div>
                <div class="avatar-icons">
                    <h1><i class="fas fa-users"></i> Elige un Avatar</h1>
                    <hr>
                    <div class="iconos-wrapper">
                        <button class="icono" onclick="cambiarIcono(this)" icono="fas fa-chess-pawn" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-chess-pawn" id="icono-selec1" style="color: '. $ColorIcono.'"></i>
                        </button>
                        <button class="icono" id="2" onclick="cambiarIcono(this)" icono="fas fa-chess-knight" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-chess-knight" id="icono-selec2" style="color: '. $ColorIcono.'"></i>
                        </button>
                        <button class="icono" id="3" onclick="cambiarIcono(this)" icono="fas fa-chess-rook" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-chess-rook" id="icono-selec3" style="color: '. $ColorIcono.'"></i>
                        </button>
                        <button class="icono" id="4" onclick="cambiarIcono(this)" icono="fas fa-chess-bishop" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-chess-bishop" id="icono-selec4" style="color: '. $ColorIcono.'"></i>
                        </button>
                        <button class="icono" id="5" onclick="cambiarIcono(this)" icono="fas fa-chess-queen" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-chess-queen" id="icono-selec5" style="color: '. $ColorIcono.'"></i>
                        </button>
                        <button class="icono" id="6" onclick="cambiarIcono(this)" icono="fas fa-chess-king" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-chess-king" id="icono-selec6" style="color: '. $ColorIcono.'"></i>
                        </button>
                        <button class="icono" onclick="cambiarIcono(this)" icono="fas fa-user" style="background-color: '. $ColorFondo.'">
                            <i class="fas fa-user" id="icono-selec7" style="color: '. $ColorIcono.'"></i>
                        </button>
                    </div>
                    <div class="avatar-colors">
                        <div class="color">
                            <h1><i class="fas fa-paint-brush"></i> Color del Avatar</h1>
                            <hr>
                            <input id="colorIcono" onchange="iconColor(this)" type="color" value="'. $ColorIcono .'" name="" id="">
                        </div>
                        <div class="color">
                            <h1><i class="fas fa-paint-roller"></i> Color de Fondo</h1>
                            <hr>
                            <input id="colorbackground" onchange="backgroundColor(this)" type="color" value="'. $ColorFondo .'" name="" id="">
                        </div>
                    </div>
                    <div class="guardar">';

                    $us = "'$usuario'";
                    echo '<button onclick="guardar('. $us .')"><i class="fas fa-save"></i> Guardar Cambios</button>
                    </div>
                    
                </div>
            </div>
        </section>';

    $Perfil = '';
    echo $Perfil;
    ?>

    <div id="footer"></div>
  </body>
</html>
