<?php

include '../../../servidor.php';
$server= new servidor();

$id = $_GET['asd'];

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

    <script src="/ChessUY/Javascript/Loader.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    <script src="/ChessUY/Usuarios/Periodista/js/function-noticias.js"></script>

    <link
      rel="shortcut icon"
      href="/ChessUY/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/ChessUY/styles/styles.css" />

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
        <source src="/ChessUY/media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>';

    echo '<section class="noticia-wrapper2">
      <div class="noticia">
        <div class="logo-img">
          <img
            src="/ChessUY/media/svg/Logo/ChessUY_NewsForDarkVersion.svg"
            alt=""
          />
        </div>
        <hr />
        <div class="noticia-body">
          <div class="header">
            <h1>Titulo de la Noticia</h1>
            <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, et?</h2>
          </div>

          <div class="body">

            <div class="noticia-img">
              <img src="/ChessUY/media/images/Noticia.png" alt="">
            </div>


            <h2>Subtitulo de la Noticia</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
              nostrum accusamus vitae, ab consequatur repellat dicta asperiores
              expedita rem minus perspiciatis officiis voluptate reprehenderit
              tenetur praesentium error alias pariatur. Ad dicta labore sed.
              Neque laborum, in nam sed quis doloribus unde exercitationem
              corporis asperiores labore ipsa deleniti atque ad dolorum?
            </p>

            <h2>Subtitulo de la Noticia</h2>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse
              beatae blanditiis unde ipsum. Magnam inventore perspiciatis
              quisquam rem ex aliquam expedita quaerat tempore unde molestiae.
              Facere repellendus est asperiores aperiam. Lorem ipsum dolor sit,
              amet consectetur adipisicing elit. Iure iste atque earum ipsam
              obcaecati reprehenderit eveniet consectetur facere, repudiandae
              cupiditate perferendis nesciunt commodi enim voluptatum
              doloremque, fuga tenetur aspernatur rem, dolorem illum eligendi
              reiciendis omnis quibusdam temporibus! Eos laudantium vel libero
              temporibus quisquam officia, asperiores vitae quidem odio. Natus
              odio quas quos exercitationem consequatur impedit corporis
              expedita dolorum praesentium velit.
            </p>

            <h2>Subtitulo de la Noticia</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
              nostrum accusamus vitae, ab consequatur repellat dicta asperiores
              expedita rem minus perspiciatis officiis voluptate reprehenderit
              tenetur praesentium error alias pariatur. Ad dicta labore sed.
              Neque laborum, in nam sed quis doloribus unde exercitationem
              corporis asperiores labore ipsa deleniti atque ad dolorum?
            </p>

          </div>
          <div class="noticia-buttons">
            <button class="editar" onclick="editar(1)"><i class="fas fa-edit"></i> Editar</button>
            <button class="eliminar" onclick="eliminarNoticia(1)"><i class="fas fa-trash-alt"></i> Eliminar</button>
          </div>
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