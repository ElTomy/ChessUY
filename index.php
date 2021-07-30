<?php
session_start();

if(isset($_SESSION['usuario'])){
  header('location: /ChessUY/Inicio');
}

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
    <script src="/ChessUY/Noticias/js/noticias.js"></script>
    <script src="Javascript/Loader.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    
    <link
      rel="shortcut icon"
      href="media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="styles/styles.css" />

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
        <source src="media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <section class="landing-page">
      <div class="landing-overlay">
        <img src="media/svg/Logo/Logo(ForDarkVersion).svg" />

        <div class="index-info">
          <h1>Campeonato de Ajedrez Online</h1>
          <p>
            <b>ChessUY Championship</b> es la primera página Uruguaya para gestionar campeonatos de ajedrez.
          </p>
        </div>
      </div>
    </section>

    <section class="torneos-wrapper-index" id="ArmoTorneos">
      <div class="torneos-grid">
        <div class="torneo-reciente">
          <div class="torneo-reciente-header">
            <h1>Torneo Reciente</h1>
          </div>
          <hr>
          <div class="torneo">
            <div class="torneo-left">
              <img src="/ChessUY/media/images/Trofeo.png" alt="">
              <div class="participantes">
                <p>12 <i class="fas fa-users"></i></p>
              </div>
            </div>
            <div class="torneo-right">
              <div class="torneo-info">
                <h2>Nombre del Torneo</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus dolores ducimus exercitationem eius laborum saepe facilis molestiae officia tempore totam?</p>
              </div>
              <div class="torneo-buttons">
                <a href=""><i class="fas fa-plus-circle"></i> Unirse</a>
                <a href=""><i class="fas fa-chart-line"></i> Estadisticas</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mejores-jugadores">
          <div class="mejores-jugadores-header">
            <h1>Mejores Jugadores</h1>
            <a href=""><i class="fas fa-user-friends"></i> Ver Todos</a>
          </div>
          <hr>
          <table class="jugadores-table">

            <tr>

              <td id="posicion">
                #1
              </td>

              <td id="img">
                <div class="user-img">
                  <i class="fas fa-user"></i>
                </div>
              </td>

              <td id="nombre">
                <a href="/ChessUY/Profile/ByJuanii_">ByJuanii_</a>
              </td>

              <td id="puntaje">
                2500
              </td>
              
            </tr>

            <tr>

              <td id="posicion">
                #2
              </td>

              <td id="img">
                <div class="user-img">
                  <i class="fas fa-user"></i>
                </div>
              </td>

              <td id="nombre">
                <a href="/ChessUY/Profile/EL7Seven">EL7Seven</a>
              </td>

              <td id="puntaje">
                1650
              </td>
              
            </tr>

            <tr>

              <td id="posicion">
                #3
              </td>

              <td id="img">
                <div class="user-img">
                  <i class="fas fa-user"></i>
                </div>
              </td>

              <td id="nombre">
                <a href="/ChessUY/Profile/maty">maty</a>
              </td>

              <td id="puntaje">
                1020
              </td>
              
            </tr>

            <tr>

              <td id="posicion">
                #4
              </td>

              <td id="img">
                <div class="user-img">
                  <i class="fas fa-user"></i>
                </div>
              </td>

              <td id="nombre">
                <a href="/ChessUY/Profile/El_Tomy">El_Tomy</a>
              </td>

              <td id="puntaje">
                -1
              </td>
              
            </tr>

          </table>
        </div>
      </div>
    </section>

    <section class="noticias-wrapper" id="ArmoNoticias">
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
