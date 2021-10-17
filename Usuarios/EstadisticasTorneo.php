<?php
  include '../servidor.php';
  $server= new servidor();

  session_start();

  $torneos = $server->InfoTorneo();

  if(isset($_POST['tornID'])) {
    $_SESSION['tornID'] = $_POST['tornID'];
  } else {
    for($i=0;$i<count($torneos);$i++) {
      if($torneos[$i]['ID_Torneo'] == $_SESSION['tornID']) {
        $tornID = $i;
        $usuarios = $server->TraigoUsuariosTorneo($_SESSION['tornID']);
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

    <title>ChessUY | Estadisticas Torneo</title>
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
                      for($x = 0; $x < count($usuarios); $x++){
                        $armPerf = $server->BuscoJugador($usuarios[$x]['usuarios']);
                        $estUsuar = $server->InfoEstadisticas($usuarios[$x]['usuarios']);
                        echo '<a class="player" href="/cyberhydra/Profile/Profile.php?Usuario='.$usuarios[$x]['usuarios'].'">
                                <div class="info-left">
                                      <div class="player-img" style="background-color: '.$armPerf[0]['colFondo'].'">
                                          <i class="'.$armPerf[0]['icono'].'" style="color: '.$armPerf[0]['colIcono'].'"></i>
                                      </div>
                                    <p class="nombre">'.$usuarios[$x]['usuarios'].'</p>
                                </div>
                                <div class="puntaje">
                                  '.$estUsuar[0].'
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