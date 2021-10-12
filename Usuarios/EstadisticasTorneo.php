<?php
  include '../servidor.php';
  $server= new servidor();

  session_start();

  $usuarios_info = $server->Top();
  $torneos = $server->InfoTorneo();

  $numero_usuarios = count($usuarios_info);

  if(isset($_POST['tornID'])) {
    $_SESSION['tornID'] = $_POST['tornID'];
  } else {
    for($i=0;$i<count($torneos);$i++) {
      if($torneos[$i]['ID_Torneo'] == $_SESSION['tornID']) {
        $tornID = $i;
        $i = count($torneos);
      }
    }
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
    
    <script src="/cyberhydra/Javascript/Loader.js"></script>
    <script src="/cyberhydra/Usuarios/js/function-usuarios.js"></script>

    
    <link
      rel="shortcut icon"
      href="/cyberhydra/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/cyberhydra/styles/styles.css" />

    <title>ChessUY | Estadisticas Globales</title>
  </head>
  <body>
    
    <div id="header"></div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
      <div class="background-opacity"></div>
      <video autoplay="" loop="" muted="">
        <source src="/cyberhydra/media/videos/Ajedrez.mp4" type="video/mp4" />
      </video>
    </div>


    <section class="estadisticas-globales-wrapper">
        <div class="estadisticas-list">
            <div class="estadisticas-logo">
                <img src="/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
            </div>
            <div class="torneo">
                <div class="torneo-left">
                    <img src="/cyberhydra/media/images/Trofeo.png" alt="">
                    <p><i class="fas fa-users"></i> 12</p>
                </div>
                <div class="torneo-right">
                  <?php
                  echo '
                    <h1>'.$torneos[$tornID]['nombre'].'</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione deleniti quis sunt! Quia, magni ullam totam cumque odio fugiat distinctio.</p>
                  ';
                  ?>
                </div>
            </div>
            <hr>
            <div class="estadisticas">
                    <!--<div class="search-bar-wrapper">
                        <div class="search-bar">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Buscar Jugador" id="buscador">
                        </div>
                    </div>-->
                    <div class="stats-box" id="stats-box">

                    <?php
                      for($x = 1; $x <= $numero_usuarios; $x++){
                        echo '<a class="player" href="/cyberhydra/Profile/'.$usuarios_info[($x - 1)]['usuario'].'">
                                <div class="info-left">
                                    <p class="posicion">#'.$x.'</p>
                                    <div class="player-img" style="background-color: '.$usuarios_info[($x - 1)]['ColorFondo'].'">
                                        <i class="'.$usuarios_info[($x - 1)]['Icono'].'" style="color: '.$usuarios_info[($x - 1)]['ColorIcono'].'"></i>
                                    </div>
                                    <p class="nombre">'.$usuarios_info[($x - 1)]['usuario'].'</p>
                                </div>
                                <div class="puntaje">
                                  '.$usuarios_info[($x - 1)]['ELO'].'
                                </div>

                            </a>';
                      }
                    ?>
                    </div>
            </div>
        </div>
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