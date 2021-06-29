<?php

session_start();

$index ='

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
    <script src="/ChessUY/Noticias/js/noticias.js"></script>
    <script src="Javascript/Loader.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    
    <link
      rel="shortcut icon"
      href="media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="styles/styles.css" />

    <title>ChessUY | Inicio</title>
  </head>
  <body>
    <div id="header"></div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <section class="landing-page">
      <div class="landing-overlay">
        <img src="media/svg/Logo/Logo(ForDarkVersion).svg" />

        <div class="index-info">
          <h1>¡Bienvenido <span style="color: #ffaa00">' . $_SESSION["usuario"] . '</span>!</h1>
          <p style="margin-top: 10px;">
            Bienvenido a la página principal de <b>ChessUY Championship</b>.
          </p>
        </div>

        <div class="buttons" style="margin: 0;">
          <a href="Ajedrez/ajedrez.php">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-chess-knight"></i>Jugar
          </a>
        </div>
      </div>
    </section>';

    if($_SESSION['tipo'] == 0){
      $index .= '<section class="administrador-wrapper">
              <h1><i class="fas fa-hammer"></i> Herramientas de Administrador</h1>
              <p class="admin"><i class="fas fa-user"></i> ' . $_SESSION["usuario"] . '</p>
              <p>Herramientas que permiten administrar la página. El uso de estas cae en la responsabilidad de la persona que las utilice.</p>
              <div class="admin-buttons">
                <a href="/ChessUY/Admin"><i class="fas fa-id-card-alt"></i> Solicitudes</a>
                <a href="/ChessUY/Lista"><i class="fas fa-user-edit"></i> Administrar Usuarios</a>
              </div>
            </section>';
    }



    $index .= '    <section class="noticias-wrapper" id="ArmoNoticias">
              </section>
            <div id="footer"></div>
          </body>
        </html>';


echo $index;

?>