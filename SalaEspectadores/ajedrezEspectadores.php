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
    <script src="js/ajedrezEspectadores.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    <!-- <script>
    console.log("id " + <?php echo $_GET["ID"] ?>);
    </script> -->
    
    <link
      rel="shortcut icon"
      href="../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../styles/styles.css" />

    <title>ChessUY | Championship</title>
  </head>
  <body>
    <!--<audio src="/chessuy/media/audio/Background.mp3" autoplay="true" loop="true"></audio>-->
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
      <div class="board">

          <div class="mobile-img">
              <img src="../media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
          </div>

          <div class="first-player-mobile">
              <div class="first-player-wrapper">
                  <div class="profile-body-picture">
                      <i class="fas fa-user"></i>
                  </div>
                  <div class="profile-avatar-body">
                      <h1>'.'</h1>
                      <p><i class="fas fa-chess-knight"></i> Jugador</p>
                  </div>
              </div>
              <p class="espectadores"><i class="fas fa-eye"></i> 10</p>
          </div>

          <div class="ajedrez-flex" id="ArmoAjedrez"></div>

          <div class="movimientos">

            <div class="movimientos-img">
              <img src="../media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
            </div>

            <div class="jugadores" id="ArmoJugadores"></div>

            <div class="temp-wrapper">
              <div id="tempJug1"></div> <!-- Tiempo Jugador Uno -->
              <div id="tempJug2"></div> <!-- Tiempo Jugador Dos -->
            </div>

            <div class="win-bar">
              <div class="bar"></div>
              <div class="bar2"></div>
            </div>
    
          <div class="menu-bottom">
              <div class="select-wrapper" id="select-wrapper">
                  <div class="box-type">
                      <button id="movimiento" class="box-button active" onclick="box('movimientos')"><i class="fas fa-chess"></i> Movimientos</button>
                      <button id="chat" class="box-button" onclick="box('chat')"><i class="fas fa-comment"></i> Chat</button>
                  </div>
                  <div class="box-content" id="box">

                    <div class="table-wrapper" id="ArmoMovimientos"></div>
                     <div class="chat" id="ArmoChat">
                      <div class="chat-box" id="chat-box">
                        <div class="chat-input">
                            <input  id="message" type="text" onkeyup="mandarChat(event)" placeholder="Escribe un mensaje aquí">
                            <button onclick="mandarChat()"><i class="fas fa-paper-plane"></i></button>
                        </div>
                      </div>
                    </div>
                      
                  </div>
              </div>
              <div class="ajedrez-buttons">
                  <button onclick="Acuerdo_Mutuo()"><i class="fas fa-border-all"></i> Tablas</button>
                  <button onclick="Derrota(),this.disabled='disabled'"><i class="fas fa-flag"></i> Rendirse</button>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section class="anuncio">
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>

    <div id="footer"></div>
  </body>
</html>


<!-- 

                                                                                                    
                                                          .&           &                                                    
                                                          ,&&          &&                                                  
                                                            #&&&         &&%                                                
                                                            ,&&&&,       &&&.                                              
                                                              &&&&&&      &&&&                                             
                                                                &&&&&&&&    &&&&&                                           
                                                                  &&&&&&&&&  #&&&&&                                         
                                                                    &&&&&&&&&&&      &                                      
                                                                      &&&&&&&&&&&&&&&&&&&&                                 
                                                    *&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&                            
                                              (&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&                         
                                          &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&                       
                                      &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&    /&&&&&&&&&&&                      
                                    &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&         &&&&&&&&                     
                                  &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&,  &&&&&&&&&                  
                                &&&&&&&&&&&&&&&                    &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&#         
                              &&&&&&&&&&&&*                          &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&/ 
                            (&&&&&&&&&(                                &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
                            &&&&&&&&                                     &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
                          &&&&&&                                         &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
                          &&&&                                              &&&&&&&&&&&&&&&&&&&&&&(&&&&&&&&&&&&&&&&&&&&&&&&%
                        #&&                                                     #                           %&&&&&&&&&&&&( 
                        &                                                                                        ,&&&&&&   
                                                                                                                    /&& 

   &&&&&&&&&&&&  *&&&&    &&&&, ,&&&&&&&&&&&&   &&&&&&&&&&&& &&&&&&&&&&&&#   &&&&      &&&& .&&&&    &&&&%  &&&&&&&&&&&    &&&&&&&&&&&&*      #&&&&&     
  &&&&.     &&&&   &&&&  &&&&            &&&&   &&&&                  &&&&   &&&&      &&&&   &&&&  &&&&            &&&&&           &&&&     (&&&&&&&    
                    &&&&&&&&    ,&&&&&&&&&&&(   &&&&&&&&&&,          &&&&&   &&&&&&&&&&&&&&    &&&&&&&&              &&&&         .&&&&&    #&&&( &&&&   
 &&&&&               &&&&&&     ,&&&&,,,(&&&&   &&&&,,,,,,   &&&&&&&&&&(     &&&&,,,,,,&&&&     &&&&&&      &&&&     &&&&  &&&&&&&&&&.      &&&&   &&&&  
  &&&&&    *&&&&      &&&&      ,&&&&    *&&&&  &&&&         &&&&   &&&&&    &&&&      &&&&      &&&&       &&&&    &&&&,  &&&&   &&&&#    &&&&&&&&&&&&& 
   .&&&&&&&&&&/       &&&&      ,&&&&&&&&&&&&   &&&&&&&&&&&& &&&&    &&&&&   &&&&      &&&&      &&&&       &&&&&&&&&&(    &&&&    &&&&&  &&&&      &&&&&

                                          Copyright © 2021 CyberHydra. Todos los derechos reservados.
 -->
