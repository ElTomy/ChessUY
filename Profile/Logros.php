<?php
$usuario = $_GET['Usuario'];

include '../servidor.php';
$server= new servidor();
session_start();


$logros = $server->TraigoLogros();
$numero_logros = count($logros);

$mislogros = $server->TraigoMisLogros($usuario);
$numero_mislogros = count($mislogros);

$logro = '<!DOCTYPE html>
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
                <script src="/ChessUY/Usuarios/js/function-usuarios.js"></script>
                <script src="/ChessUY/Profile/JS/Logros2.js"></script>

                
                <link
                  rel="shortcut icon"
                  href="/ChessUY/media/svg/Logo/Favicon.svg"
                  type="image/x-icon"
                />
                <link rel="stylesheet" href="/ChessUY/styles/styles.css" />

                <title>ChessUY | Logros</title>
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


                <section class="logros-wrapper">
                    <div class="logros">
                        <h1><i class="fas fa-shield-alt"></i> Logros</h1>

                        <div class="logros-header">
                            <p><i class="fas fa-unlock-alt"></i> Obtenidos: '.$numero_mislogros.'</p>
                            <p><i class="fas fa-lock"></i> Restantes: '. ($numero_logros - $numero_mislogros) .'</p>
                        </div>

                        <hr>
                        <div class="logros-content" id="logros">';


                for($x = 1; $x <= $numero_mislogros; $x++){
                  $ID = $mislogros[($x - 1)]['ID'];

                  $logro .= '   <div class="logro">
                                  <div class="logro-img">
                                      <img src="'. $logros[($ID - 1)]['Imagen'] .'" alt="">
                                      <i class="fas fa-lock" id="locked"></i>
                                  </div>

                                  <h1>'. $logros[($ID - 1)]['Nombre'] .'</h1>
                                  <p class="desc">'. $logros[($ID - 1)]['Descripcion'] .'</p>
                                  <p>'. $logros[($ID - 1)]['Porcentaje'] .'% de los usuarios tienen este logro.</p>
                                </div>';                 
                }
                for($x = 1; $x <= $numero_logros; $x++){

                  $encontrado = 0;

                  for($y = 1; $y <= $numero_mislogros; $y++){
                    if($x == $mislogros[($y - 1)]['ID']){
                      $encontrado = 1;
                      break;
                    }else{
                      $encontrado = 0;
                    }
                  }

                  if($encontrado == 0){
                    $logro .= '   <div class="logro locked">
                                  <div class="logro-img">
                                      <img src="'. $logros[($x - 1)]['Imagen'] .'" alt="">
                                      <i class="fas fa-lock" id="locked"></i>
                                  </div>

                                  <h1>'. $logros[($x - 1)]['Nombre'] .'</h1>
                                  <p class="desc">'. $logros[($x - 1)]['Descripcion'] .'</p>
                                  <p>'. $logros[($x - 1)]['Porcentaje'] .'% de los usuarios tienen este logro.</p>
                                </div>'; 
                  }

                }
                $logro .= '          </div>
                                  </div>
                              </section>
                          
                              <div id="footer"></div>
                            </body>
                          </html>';

                echo $logro;
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