<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <div class="style">
    </div>
    <div id="modal"></div>

    <script
      src="https://kit.fontawesome.com/1e193e3a23.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/ChessUY/Javascript/Loader.js"></script>
    <script src="/ChessUY/Torneo/js/tornFunc.js"></script>

    <link
      rel="shortcut icon"
      href="/ChessUY/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/ChessUY/styles/styles.css" />

    <title>ChessUY | Torneos</title>
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


    <section class="torneos-wrapper">
      <div class="torneos">
        <div class="torneos-titulo">
          <h1><i class="fas fa-trophy"></i> Crear Torneo</h1>
        </div>
        <div class="torneos-content">

          <div class="torneo-menu">
            <h2>Tipo de Torneo:</h2>
            <form>
              <select name="tipTorn" id="tipTorn" onchange='confTipo(this); cargAgen();'>
                <option disabled selected>Selecciona un tipo de torneo</option>
                <option value="norm">Normal</option>
                <option value="avan">Avanzado</option>
                <option value="pres">Crear preset??</option>
              </select>
            </form>
          </div>

          <div class="torneo-config">
            <div class="config-wrapper" id="hola">
            </div>
          </div>

        </div>
      </div>
    </section>

    <div id="footer"></div>
  </body>
</html>
