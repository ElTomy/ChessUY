<?php

include '../../../servidor.php';
$server= new servidor();

$id = $_GET['ID'];

$noticia = $server->TraigoNoticias($id);



echo '<!DOCTYPE html>
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

    <script src="/cyberhydra/Javascript/Loader.js"></script>
    <script src="/cyberhydra/Usuarios/js/function-usuarios.js"></script>
    <script src="/cyberhydra/Usuarios/Periodista/js/function-noticias.js"></script>

    <link
      rel="shortcut icon"
      href="/cyberhydra/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/cyberhydra/styles/styles.css" />
    <link rel="stylesheet" href="/cyberhydra/Usuarios/Periodista/css/richtext.css">

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
    </div>

    <section class="noticia-wrapper2">
      <div class="noticia">
        <div class="logo-img">
          <img
            src="/cyberhydra/media/svg/Logo/ChessUY_NewsForDarkVersion.svg"
            alt=""
          />
        </div>
        <hr />

        <div class="noticia-body">

        <h1 class="body-titulo">Editar Noticia</h1>
        <hr>

          <div class="header">
            <div class="titulo">
                <h1 id="titulo-text">'. $noticia[0]['Titulo'] .'</h1>
                <input id="titulo-input" type="text" name="Titulo" placeholder="Titulo de la Noticia">
                <button class="editar-pencil" id="titulo-editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="editar-guardar" id="titulo-guardar"><i class="fas fa-save"></i></button>
            </div>

            <div class="subtitulo">
                <h2 id="subtitulo-text">'. $noticia[0]['Descripcion'] .'</h2>
                <input id="subtitulo-input" type="text" name="Subtitulo" placeholder="Subtitulo de la Noticia">
                <button class="editar-pencil" id="subtitulo-editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="editar-guardar" id="subtitulo-guardar"><i class="fas fa-save"></i></button>
            </div>
          </div>

          <div class="body">

            <div class="noticia-img">
              <img src="'. $noticia[0]['IMG'] .'" alt="">
            </div>
            
            <textarea placeholder="Contenido del Post" name="Contenido" id="contenido" required></textarea>

          </div>
          <div class="noticia-buttons">';

              session_start();
              $nombre = $_SESSION['usuario'];
              $nombre2 = "'$nombre'";
              $img = $noticia[0]['IMG'];
              $img2 = "'$img'";

              echo '<button onclick="guardar('.$nombre2.', '.$id.', '. $img2.')"><i class="fas fa-save"></i> Guardar</button>';
              echo '<button onclick="guardar('.$nombre2.')"><i class="fas fa-save"></i> Guardar</button>';

          echo '</div>
        </div>
      </div>
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>

    <div id="footer"></div>

    <script src="../../ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("contenido");
      CKEDITOR.instances.contenido.setData("'. $noticia[0]['Informacion'] .'");
    </script>

  </body>
</html>';

?>

