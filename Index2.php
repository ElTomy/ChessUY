<?php
  include 'servidor.php';
  $server= new servidor();
  $server->VerificoSesion(3); 

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
    <script src="/ChessUY/Javascript/Loader.js"></script>
    <script src="/ChessUY/Torneo/js/tornFunc.js"></script>
    <script src="Javascript/translate.js"></script>';
    if( $_SESSION['tipo'] != 2  && $_SESSION['tipo'] != 3){
      $index .='<script src="/ChessUY/Javascript/functionIndex2.js"></script>';
    }
    
$index .='
    <script src="/ChessUY/Usuarios/js/Usuario.js"></script>
    <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
    <script src="/ChessUY/Usuarios/js/armoEstadisticas.js"></script>
 
    <link
      rel="shortcut icon"
      href="media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="styles/styles.css" />

    <title>ChessUY | Inicio</title>
  </head>
  <body>
    <div id="header"></div>
    <div id="modal"></div>
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
    <div id="modal"></div>
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>

    <section class="landing-page">
      <div class="landing-overlay">
        <img src="media/svg/Logo/Logo(ForDarkVersion).svg" />

        <div class="index-info">
          <div style="display:flex; justify-content:center;">
            <h1><span data-lang="welcome">¡Bienvenido </span><span style="color: #ffaa00">' . $_SESSION["usuario"] . '</span>!</h1>
          </div>
          <p style="margin-top: 10px;" data-lang="welcome-main">
            Bienvenido a la página principal de <b>ChessUY Championship</b>.
          </p>
        </div>

        <div class="buttons" style="margin: 0; display: flex;">
          <a href="Ajedrez/ajedrez.php?Torn=0" data-lang="play">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-chess-knight"></i>Jugar
          </a>
          <div id="partiTorn">
          </div>
        </div>
      </div>
    </section>';

    if($_SESSION['tipo'] != 0){
      $index .= '<section class="anuncio">
                <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
                <p>Este espacio está reservado para anuncios.</p>
              </section>';
    }

    $index .= '<section class="administrador-wrapper">
                <h1><i class="fas fa-user"></i> Herramientas del Usuario</h1>
                <p>Visitá nuestro blog, ve partidos, o prueba nuestra nueva sección de entrenamientos.</p>
                <div class="admin-buttons">
                  <a href="/ChessUY/Blog/Blog.html"><i class="far fa-newspaper"></i> Blog</a>
                  <a href="/ChessUY/Torneo/VerPartidos.html"><i class="fas fa-eye"></i> Ver Partidos</a>
                  <a href="/ChessUY/Entrenamiento/Entrenamiento.html"><i class="fas fa-chess-board"></i> Entrenamiento</a>
                </div>
              </section>';
    

    if($_SESSION['tipo'] == 0){
      $index .= '<section class="administrador-wrapper">
              <h1 data-lang="admin-tools"><i class="fas fa-hammer"></i> Herramientas de Administrador</h1>
              <p class="admin"><i class="fas fa-star"></i> ' . $_SESSION["usuario"] . '</p>
              <p data-lang="admin-tools-desc">Herramientas que permiten administrar la página. El uso de estas cae en la responsabilidad de la persona que las utilice.</p>
              <div class="admin-buttons">
                <a href="/ChessUY/Admin" data-lang="requests"><i class="fas fa-id-card-alt"></i> Solicitudes</a>
                <a href="/ChessUY/Profile/BuscarJugadores.html" data-lang="manage-user"><i class="fas fa-user-edit"></i> Administrar Usuarios</a>
                <a href="/ChessUY/Torneos" data-lang="create-tourn"><i class="fas fa-trophy"></i> Crear Torneo</a>
                <a href="/ChessUY/Torneo/OrganizarTorneos.html" data-lang="org-tourn"><i class="fas fa-trophy"></i> Organizar Torneos</a>
              </div>
              <p>Herramientas que permiten a los periodistas crear, editar y eliminar noticias. El uso de estas cae en la responsabilidad de la persona que las utilice.</p>
              <div class="admin-buttons">
                <a href="/ChessUY/Blog/Blog.html"><i class="far fa-newspaper"></i> Blog</a>
                <a href="Usuarios/Periodista/PHP/crearNoticia.php"><i class="fas fa-folder-plus"></i> Crear Noticia</a>
                <a href=""><i class="fas fa-edit"></i> Editar Noticias</a>
                <a href=""><i class="fas fa-trash-alt"></i> Eliminar Noticias</a>
                </div>
            </section>';
    }
    if($_SESSION['tipo'] == 3){
      $index .= '
              <section class="administrador-wrapper">
              <h1 data-lang="journalist-tools"><i class="fas fa-hammer"></i> Herramientas de Periodista</h1>
              <p class="admin"><i class="fas fa-newspaper"></i> ' . $_SESSION["usuario"] . '</p>
              <p data-lang="journalist-tools-desc">Herramientas que permiten a los periodistas crear, editar y eliminar noticias. El uso de estas cae en la responsabilidad de la persona que las utilice.</p>
              <div class="admin-buttons">
                <a href="/ChessUY/Blog/Blog.html"><i class="far fa-newspaper"></i> Blog</a>
                <a href="Usuarios/Periodista/PHP/crearNoticia.php" data-lang="create-news"><i class="fas fa-folder-plus"></i> Crear Noticia</a>
                <a href="" data-lang="edit-news"><i class="fas fa-edit"></i> Editar Noticias</a>
                <a href="" data-lang="delete-news"><i class="fas fa-trash-alt"></i> Eliminar Noticias</a>
              </div>
            </section>';
    }



    $index .= '<section class="torneos-wrapper-index" id="ArmoTorneos">
                <div class="torneos-grid">
                  <div class="torneo-reciente">
                    <div class="torneo-reciente-header">
                      <h1 data-lang="recent-tourn">Torneo Reciente</h1>
                    </div>
                    <hr>
                    <div class="torneo" id="torn-InscAct">
                     
                    </div>
                  </div>
                  <div class="mejores-jugadores">
                    <div class="mejores-jugadores-header">
                      <h1 data-lang="best-players">Mejores Jugadores</h1>
                      <a href="/ChessUY/Usuarios/Estadisticas.php" data-lang="see-all"><i class="fas fa-user-friends"></i> Ver Todos</a>
                    </div>
                    <hr>
                    <div class="jugadores-table" id="tabla-estadisticas">
                    </div>
                  </div>
                </div>
                <div class="torneos-recientes-wrapper">

                  <h1 data-lang="open-tourn">Torneos Abiertos</h1>
                  <hr>

                  <div class="torneos-recientes" id="torn-Act">
                    
                  </div>

                </div>
              </section>';

              if($_SESSION['tipo'] != 0){
                $index .= '<section class="anuncio">
                          <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
                          <p>Este espacio está reservado para anuncios.</p>
                        </section>';
              }
              $index .= '
              <section class="noticias-wrapper" id="ArmoNoticias">
              </section>';

              if($_SESSION['tipo'] != 0){
                $index .= '<section class="anuncio">
                          <h1><i class="fas fa-newspaper"></i> Anuncio</h1>
                          <p>Este espacio está reservado para anuncios.</p>
                        </section>';
              }
              
            $index .= '<div id="footer"></div>
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
