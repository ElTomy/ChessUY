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
    <script src="../Javascript/Loader.js"></script>
    <script src="../Usuarios/js/Usuario.js"></script>
    <script src="../Usuarios/js/function-usuarios.js"></script>

    <link
      rel="shortcut icon"
      href="../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/styles.css" />

    <title>ChessUY | Mi Perfil</title>
  </head>
  <body>

    <div id="header"></div>

    
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="../media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <div id="modal"></div>

    <section class="profile-wrapper">
        <div class="profile-body">
            <img src="/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
            <h1>Mi Perfil</h1>
            <hr>
            <div class="profile-avatar">
                <div class="profile-body-picture">
                    <i class="fas fa-user"></i>
                </div>
                <div class="profile-avatar-body">
                <?php
                  session_start();
                  echo "<p>" . $_SESSION['usuario'] . "</p>";
                ?>
                    <a href="">Cambiar foto de perfil.</a>
                </div>
            </div>
            
            <div class="profile-info-field">
                <p class="bold-title">Nombre:</p><p>Juan Andrés Morena</p>;
            </div>
            <div class="profile-info-field">
                <p class="bold-title">Correo Electrónico:</p><p>thewolfmodzyt@gmail.com</p>
            </div>
            <div class="profile-info-field">
                <p class="bold-title">Documento:</p><p>54879239</p>
            </div>
            <div class="profile-info-field">
                <p class="bold-title">Celular:</p><p>098234717</p>
            </div>
            <div class="profile-info-field">
                <p class="bold-title">Fecha de Nacimiento:</p><p>10/05/2003</p>
            </div>
            <hr>
            
        </div>
    </section>

    <div id="footer">
    </div>
  </body>
</html>
