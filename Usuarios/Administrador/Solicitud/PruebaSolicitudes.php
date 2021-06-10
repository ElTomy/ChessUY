<?php
  /*include '../../../servidor.php';
  $server= new servidor();
  $server->VerificoSesion(0); */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../Solicitud/Js/Solicitud.js"></script>
  <script src="/ChessUY/Javascript/Loader.js"></script>

  <link rel="stylesheet" href="/ChessUY/styles/styles.css">
  <link
      rel="shortcut icon"
      href="/ChessUY/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />

  <title>ChessUY | Solicitudes</title>
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

  <section class="Solicitudes-wrapper">
    <img src="/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
    <h1>Solicitudes</h1>
    <table id="tablaprueba">
        <tr id="thead">
          <th>CI</th>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Institucion</th>
          <th>Mail</th>
          <th>Tipo</th>
          <th>A/R</th>
        </tr>
    </table>
  </section>

  <div id="footer"></div>
  
</body>

</html>