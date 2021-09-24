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
    <script src="/ChessUY/Usuarios/Periodista/js/function-noticias.js"></script>
    <script src="/ChessUY/Usuarios/Periodista/js/jquery.richtext.js"></script>

    <link
      rel="shortcut icon"
      href="/ChessUY/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/ChessUY/styles/styles.css" />
    <link rel="stylesheet" href="/ChessUY/Usuarios/Periodista/css/richtext.css">

    <title>ChessUY | Crear Noticia</title>
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

    <div id="modal"></div>

    <section class="noticia-wrapper2">
      <div class="noticia">
        <div class="logo-img">
          <img
            src="/ChessUY/media/svg/Logo/ChessUY_NewsForDarkVersion.svg"
            alt=""
          />
        </div>

        <hr />

        <div class="crear-noticia-body">

        <h1 class="body-titulo">Crear Noticia</h1>
        <hr>

          <div class="header">
            <div class="titulo">
                <input id="titulo-input" type="text" name="Titulo" placeholder="Titulo de la Noticia">
            </div>

            <div class="subtitulo">
                <input id="subtitulo-input" type="text" name="Subtitulo" placeholder="Subtitulo de la Noticia">
            </div>
          </div>

          <div class="body">

          <div class="Foto">
            <input name="uploadedfile" type="file" id="pic" /> 
          </div>

            <textarea placeholder="Contenido del Post" name="Contenido" id="contenido" required></textarea>

          </div>
          <div class="noticia-buttons">
            <?php
              session_start();
              $nombre = $_SESSION['usuario'];
              $nombre2 = "'$nombre'";

              echo '<button onclick="crear('.$nombre2.')"><i class="fas fa-plus-circle"></i> Crear</button>';
            ?>
          </div>
        </div>
      </div>
    </section>

    <section class="anuncio">
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>

    <div id="footer"></div>

    <script src="../ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('contenido');
    </script>

  </body>
</html>