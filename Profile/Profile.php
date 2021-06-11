<?php
  include '../servidor.php';
  $server= new servidor();
  $server->VerificoSesion(1);
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
            <a href="/ChessUY/Index">
              <img src="/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
            </a>
            <div class="profile-avatar">
                  <div class="profile-flex">
                    <div class="profile-body-picture">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="profile-avatar-body">
                    <?php
                      echo "<p>" . $_SESSION['usuario'] . "</p>";
                    ?>
                    </div>
                  </div>
                  <a href=""><i class="fas fa-edit"></i> Editar Perfil</a>
            </div>

            <section class="trofeos-wrapper">
              <div class="trofeo-header">
                <h1>Trofeos</h1>
                <div class="trofeos-list">

                  <div class="trofeo">
                    <div class="trofeo-img">
                      <img src="/ChessUY/media/images/Trofeo.png" alt="">
                    </div>
                    <div class="trofeo-body">
                      <h1>Nombre del Trofeo</h1>
                      <p>Descripción del Trofeo</p>
                    </div>
                  </div>

                  <div class="trofeo">
                    <div class="trofeo-img">
                      <img src="/ChessUY/media/images/Trofeo.png" alt="">
                    </div>
                    <div class="trofeo-body">
                      <h1>Nombre del Trofeo</h1>
                      <p>Descripción del Trofeo</p>
                    </div>
                  </div>

                </div>

              </div>
            </section>
            
            <div class="profile-grid">

              <div class="estadisticas-wrapper">
                <div class="estadisticas-header">
                  <h1>Estadisticas</h1>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">ELO:</h1><p>1</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Victorias:</h1><p>2</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Derrotas:</h1><p>10</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Tablas:</h1><p>3</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Coronaciones:</h1><p>3</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Piezas Comidas:</h1><p>3</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Victorias en menos tiempo:</h1><p>3</p>
                </div>
                <div class="estadisticas-body">
                  <h1 class="estadisticas-titulo">Victorias en menos movimientos:</h1><p>3</p>
                </div>
              </div>

              <div class="logros-wrapper">
                <div class="logros-header">
                  <h1>Logros</h1><p>(1)</p>
                </div>
                  <div class="logro-wrapper">
                    <div class="logro">
                      <div class="imagen-logro">
                      <img class="img-trofeo" src="/ChessUY/media/images/Logro.png" alt="">
                      </div>
                      <div class="logro-body">
                        <h1>Primera Jugada</h1>
                        <p>Descripcion del Logro</p>
                        <p class="porcentaje">99% de los usuarios tienen este logro.</p>
                      </div>
                  </div>
                  </div>

                  <div class="logro-wrapper">
                    <div class="logro">
                      <div class="imagen-logro">
                      <i class="fas fa-lock"></i>
                      </div>
                      <div class="logro-body">
                      <h1 class="bloqueado">Nombre del Logro</h1>
                        <p>Descripcion del Logro</p>
                        <p class="porcentaje">10% de los usuarios tienen este logro.</p>
                      </div>
                    </div>
                  </div>

                  <div class="logro-wrapper">
                    <div class="logro">
                      <div class="imagen-logro">
                      <i class="fas fa-lock"></i>
                      </div>
                      <div class="logro-body">
                      <h1 class="bloqueado">Nombre del Logro</h1>
                        <p>Descripcion del Logro</p>
                        <p class="porcentaje">0,05% de los usuarios tienen este logro.</p>
                      </div>
                    </div>
                  </div>

                  <div class="logro-wrapper">
                    <div class="logro">
                      <div class="imagen-logro">
                        <i class="fas fa-lock"></i>
                      </div>
                      <div class="logro-body">
                        <h1 class="bloqueado">Nombre del Logro</h1>
                        <p>Descripcion del Logro</p>
                        <p class="porcentaje">1% de los usuarios tienen este logro.</p>
                      </div>
                    </div>
                  </div>
                  <a class="ver-logros" href=""><i class="fas fa-medal"></i>Ver todos los logros</a>
              </div>
            </div>
        </div>
    </section>

    <div id="footer">
    </div>
  </body>
</html>
