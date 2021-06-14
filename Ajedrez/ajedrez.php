<?php
  include '../servidor.php';
  $server= new servidor();
  session_start();
  $server->VerificoSesion($_SESSION['tipo']);
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
      <div class="board">
        <div class="ajedrez-wrapper">
          <div class="ajedrez">

            <div class="cell"><i id="Negro" class="fas fa-chess-rook"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-knight"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-bishop"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-queen"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-king"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-bishop"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-knight"></i></div>
            <div class="cell"><i id="Negro" class="fas fa-chess-rook"></i></div>

            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>
            <div class="cell2"><i id="Negro" class="fas fa-chess-pawn"></i></div>

            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>

            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>

            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>

            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>
            <div class="cell2"></div>

            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>
            <div class="cell"><i id="Blanco" class="fas fa-chess-pawn"></i></div>

            <div class="cell2"><i id="Blanco" class="fas fa-chess-rook"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-knight"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-bishop"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-queen"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-king"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-bishop"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-knight"></i></div>
            <div class="cell2"><i id="Blanco" class="fas fa-chess-rook"></i></div>

            
            
          </div>
        </div>

        <div class="movimientos">
          <div class="movimientos-img">
            <img src="../media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
          </div>
          <div class="match-players">
            <div class="first-player">
              <div class="profile-body-picture">
                <i class="fas fa-user"></i>
              </div>
              <div class="profile-avatar-body">
                <h1>ByJuanii</h1>
                <p><i class="fas fa-chess-knight"></i> Jugador</p>
              </div>
            </div>
            <div class="vs">
              <h1>VS</h1>
            </div>
            <div class="second-player">
              <div class="profile-avatar-body">
                <h1>Jugador 2</h1>
                <p><i class="fas fa-chess-knight"></i> Jugador</p>
              </div>
              <div class="profile-body-picture">
                <i class="fas fa-user"></i>
              </div>           
            </div>
          </div>
          <p class="espectadores"><i class="fas fa-eye"></i> 10</p>
          <h1>Movimientos</h1>
          <table>
            <tr>
              <th>Pieza</th>
              <th>Movimiento</th>
            </tr>
            <tr>
              <td><i id="Blanco" class="fas fa-chess-pawn"></i></td>
              <td>A4</td>
            </tr>
            <tr>
              <td><i id="Negro" class="fas fa-chess-pawn"></i></td>
              <td>E6</td>
            </tr>
          </table>

        </div>
      </div>
    </section>

    <div id="footer"></div>
  </body>
</html>
