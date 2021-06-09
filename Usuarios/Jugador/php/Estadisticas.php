<?php
  include '../../../servidor.php';
  $server= new servidor();
  $server->VerificoSesion(); 
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
    <script src="../../Javascript/Loader.js"></script>

    <link
      rel="shortcut icon"
      href="../../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../../styles/styles.css" />

    <title>ChessUY | Championship</title>
  </head>
  <body>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="../../media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>


    <section class="landing-page">
      <div class="landing-overlay">
        <img src="../../media/svg/Logo/Logo(ForDarkVersion).svg" />

        <div class="index-info">
          <h1>ESTADISTICAS</h1>
          <p><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, in.</b>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias, sed accusamus illum molestiae vitae assumenda architecto rerum voluptatum laborum placeat aperiam maiores dolor modi quisquam necessitatibus voluptatem dolorum excepturi. Quo, sit tempore velit aperiam at culpa maxime dolor quisquam provident assumenda similique ab doloribus soluta impedit in corporis dolorum, ea vel excepturi voluptatem earum. Quia ex deserunt officiis laboriosam sit aliquam quaerat vitae maiores minus nesciunt magni, consequatur culpa vel dolore iure corporis nam in eaque rerum libero! Exercitationem minus optio alias veritatis aliquid voluptate accusamus ratione, sit praesentium. Aut asperiores earum eligendi, cumque reiciendis sapiente animi dicta accusantium similique.</p>
        </div>

      </div>
    </section>

    <div id="footer"></div>
  </body>
</html>
