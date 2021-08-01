<?php
session_start();

if(isset($_SESSION['usuario'])){
  header('location: /cyberhydra/Inicio');
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
    <script src="/ChessUY/Usuarios/js/armoEstadisticas.js"></script>
    
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

    <section class="anuncio">
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>


    <section class="torneos-wrapper-index" id="ArmoTorneos">
      <div class="torneos-grid">
        <div class="torneo-reciente">
          <div class="torneo-reciente-header">
            <h1>Torneo Reciente</h1>
          </div>
          <hr>
          <div class="torneo" id="torn-InscAct">
            
          </div>
        </div>
        <div class="mejores-jugadores">
          <div class="mejores-jugadores-header">
            <h1>Mejores Jugadores</h1>
            <a href="/ChessUY/Usuarios/Estadisticas.php"><i class="fas fa-user-friends"></i> Ver Todos</a>
          </div>
          <hr>
          <div class="jugadores-table" id="tabla-estadisticas">
          </div>
          <div class="mas-mobile">
            <a href="/ChessUY/Usuarios/Estadisticas.php"><i class="fas fa-user-friends"></i> Ver Todos</a>
          </div>
        </div>
        
      </div>
      <div class="torneos-recientes-wrapper">

                  <h1>Torneos</h1>
                  <hr>

                  <div class="torneos-recientes">
                    <div class="torneo">
                      <div class="torneo-left-side">
                        <img src="/ChessUY/media/images/Trofeo.png">
                      </div>
                      <div class="torneo-right-side">
                        <h1>Nombre del Torneo</h1>
                        <p><i class="fas fa-users"></i> 12 Participantes</p>
                        <div class="torneo-right-buttons">
                          <button><i class="fas fa-plus-circle"></i> Unirse</button>
                          <button><i class="fas fa-info-circle"></i> Información</button>
                        </div>
                      </div>
                    </div>
                    <div class="torneo">
                      <div class="torneo-left-side">
                        <img src="/ChessUY/media/images/Trofeo.png">
                      </div>
                      <div class="torneo-right-side">
                        <h1>Nombre del Torneo</h1>
                        <p><i class="fas fa-users"></i> 12 Participantes</p>
                        <div class="torneo-right-buttons">
                          <button><i class="fas fa-plus-circle"></i> Unirse</button>
                          <button><i class="fas fa-info-circle"></i> Información</button>
                        </div>
                      </div>
                    </div>
                    <div class="torneo">
                      <div class="torneo-left-side">
                        <img src="/ChessUY/media/images/Trofeo.png">
                      </div>
                      <div class="torneo-right-side">
                        <h1>Nombre del Torneo</h1>
                        <p><i class="fas fa-users"></i> 12 Participantes</p>
                        <div class="torneo-right-buttons">
                          <button><i class="fas fa-chart-line"></i> Estadisticas</button>
                          <button><i class="fas fa-info-circle"></i> Información</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
    </section>

    <section class="anuncio">
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>

    <section class="noticias-wrapper" id="ArmoNoticias">
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
