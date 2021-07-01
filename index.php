<?php
session_start();

if(isset($_SESSION['usuario'])){
  header('location: /ChessUY/Inicio');
}

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
    <script src="/ChessUY/Noticias/js/noticias.js"></script>
    <script src="Javascript/Loader.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    
    <link
      rel="shortcut icon"
      href="media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="styles/styles.css" />

    <title>ChessUY | Championship</title>
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
          <h1>Campeonato de Ajedrez Online</h1>
          <p>
            <b>ChessUY Championship</b> es la primera página Uruguaya para gestionar campeonatos de ajedrez.
          </p>
        </div>
      </div>
    </section>

    <section class="noticias-wrapper" id="ArmoNoticias">
    </section>

    <div id="footer"></div>
  </body>
</html>