<?php

session_start();



$index ='

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
    <script src="/ChessUY/Javascript/Loader.js"></script>';
    if( $_SESSION['tipo'] != 2  && $_SESSION['tipo'] != 3){
      $index .='<script src="/ChessUY/Javascript/functionIndex2.js"></script>';
    }
    
$index .='
    <script src="/ChessUY/Usuarios/js/Usuario.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    <script src="/ChessUY/Usuarios/js/armoEstadisticas.js"></script>
 
    <link
      rel="shortcut icon"
      href="/cyberhydra/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/cyberhydra/styles/styles.css" />

    <title>ChessUY | Inicio</title>
  </head>
  <body>
    <div id="header"></div>
    <div id="modal"></div>
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="/cyberhydra/media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <section class="landing-page">
      <div class="landing-overlay">
        <img src="/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg" />

        <div class="index-info">
          <h1>¡Bienvenido <span style="color: #ffaa00">' . $_SESSION["usuario"] . '</span>!</h1>
          <p style="margin-top: 10px;">
            Bienvenido a la página principal de <b>ChessUY Championship</b>.
          </p>
        </div>

        <div class="buttons" style="margin: 0;">
          <a href="/cyberhydra/Ajedrez/ajedrez.php">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-chess-knight"></i>Jugar
          </a>
        </div>
      </div>
    </section>
    <section class="anuncio">
      <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
      <p>Este espacio está reservado para anuncios.</p>
    </section>';

    if($_SESSION['tipo'] == 0){
      $index .= '<section class="administrador-wrapper">
              <h1><i class="fas fa-hammer"></i> Herramientas de Administrador</h1>
              <p class="admin"><i class="fas fa-user"></i> ' . $_SESSION["usuario"] . '</p>
              <p>Herramientas que permiten administrar la página. El uso de estas cae en la responsabilidad de la persona que las utilice.</p>
              <div class="admin-buttons">
                <a href="/ChessUY/Admin"><i class="fas fa-id-card-alt"></i> Solicitudes</a>
                <a href="/ChessUY/Lista"><i class="fas fa-user-edit"></i> Administrar Usuarios</a>
                <a href="/ChessUY/Torneos"><i class="fas fa-trophy"></i> Crear Torneo</a>
              </div>
            </section>';
    }



    $index .= '<section class="torneos-wrapper-index" id="ArmoTorneos">
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
                          <a href="/ChessUY/Usuarios/EstadisticasTorneo.php"><i class="fas fa-chart-line"></i> Estadisticas</a>
                        </div>
                      </div>
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
        </html>';


echo $index;

?>


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