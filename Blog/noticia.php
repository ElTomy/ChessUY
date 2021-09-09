<?php

include '../servidor.php';
$server= new servidor();
session_start();

$id = $_GET['ID'];

$noticia = $server->TraigoNoticias($id);

echo '


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv =»Cache-Control» content =»no-cache»/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script
      src="https://kit.fontawesome.com/1e193e3a23.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/cyberhydra/Javascript/Loader.js"></script>
    <script src="/cyberhydra/Usuarios/js/function-usuarios.js"></script>
    <script src="/cyberhydra/Usuarios/Periodista/js/function-noticias.js"></script>

    <link
      rel="shortcut icon"
      href="/cyberhydra/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/cyberhydra/styles/styles.css" />

    <title>ChessUY | Noticia</title>
  </head>
  <body>
    <div id="header"></div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="/cyberhydra/media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>';

    echo '<section class="noticia-wrapper2">
      <div class="noticia">
        <div class="logo-img">
          <img
            src="/cyberhydra/media/svg/Logo/ChessUY_NewsForDarkVersion.svg"
            alt=""
          />
        </div>
        <hr />
        <div class="noticia-body">
          <div class="header">
            <h1>'. $noticia[0]['Titulo'] .'</h1>
            <h2>'. $noticia[0]['Descripcion'] .'</h2>
          </div>

          <div class="body">

            <div class="noticia-img">
              <img src="/cyberhydra/media/images/Noticia.png" alt="">
            </div>

            <div class="noticia-info">'. $noticia[0]['Informacion'] .'</div>

          </div>';

          if(isset($_SESSION['tipo'])){
            if($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 3){

              echo '<div class="noticia-buttons">
                      <button class="editar" onclick="editar('.$id.')"><i class="fas fa-edit"></i> Editar</button>
                      <button class="eliminar" onclick="eliminarNoticia(1)"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </div>';
            }
          }
          echo '
        </div>
      </div>
    </section>';

    echo '<section class="anuncio">
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>

    <div id="footer"></div>
  </body>
</html>';