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
    <script src="../Javascript/Loader.js"></script>
    <script src="js/ajedrez.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    
    <link
      rel="shortcut icon"
      href="../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../styles/styles.css" />

    <title>ChessUY | Championship</title>
  </head>
  <body>
    <div id="header"></div>
    <div id="modal"></div>
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="../media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <section class="board-wrapper">
      <div class="board" id="ArmoAjedrez">
      </div>
    </section>

    <div id="footer"></div>
  </body>
</html>
