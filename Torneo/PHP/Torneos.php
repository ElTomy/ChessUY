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


    <section class="landing-page">
      <div style='background-color: #292929; width: 85%; height: 700px; border-radius: 30px; padding: 1%; margin: 1% 0% 1% 0%;'>
        <div style='text-align: center; padding: 1%; color: white;'>
          <h1>Crear Torneo</h1>
        </div>
        <hr>
        <div style='padding-top: 2%; color: white; display: flex;'>
          <div style='width: 20%; height: 600px; border: solid #292929; border-width: 1px;'>
            Tipo de Torneo:
            <form>
              <select name="tipTorn" id="tipTorn" onchange='confTipo(this)'>
                <option disabled selected>Selecciona un tipo de torneo</option>
                <option value="norm">Normal</option>
                <option value="avan">Avanzado</option>
                <option value="pres">Crear preset??</option>
              </select>
            </form>
            <div style='width: 100%; height: 91%; margin-top: 5%; background-color: #353535; border-radius: 20px;'>

            </div>
          </div>
          <div id='hola' style='width: 80%; height: 600px; margin-left: 1%; display: flex; border: solid grey; border-width: 1px; border-radius: 20px;'>
          </div>
        </div>
      </div>
    </section>

    <div id="footer"></div>
  </body>
</html>
