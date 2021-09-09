<?php
  include '../servidor.php';
  $server= new servidor();
  session_start();

  $usuario = $_GET['Usuario'];

  $usuario_info = $server->PerfilUsuario($usuario);
  list($ELO,$Victorias,$Tablas,$Derrotas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos) = $server->InfoEstadisticas($usuario_info['usuario']);


  $logros = $server->TraigoLogros();
  $numero_logros = count($logros);

  $mislogros = $server->TraigoMisLogros($usuario);
  $numero_mislogros = count($mislogros);
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
    <script src="../Usuarios/js/Usuario.js"></script>
    <script src="../Usuarios/js/function-usuarios.js"></script>
    <script src="JS/Logros.js"></script>

    <link
      rel="shortcut icon"
      href="/cyberhydra/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    
    <link rel="stylesheet" href="../styles/styles.css" />

    <title>ChessUY | 

      <?php
            if(isset($_SESSION['usuario'])){
              if($usuario == $_SESSION['usuario']){
                echo "Mi Perfil";
              }else{
                echo $usuario;
              }
            }else{
              echo $usuario;
            } 
      ?>

    </title>
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

    <div id="modal"></div>

    <section class="profile-wrapper">
        <div class="profile-body">
            <a href="/cyberhydra/Index">
              <img src="/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
            </a>
            <?php
              echo '<div class="profile-avatar">
                <div class="profile-flex">';

                if($usuario_info['tipo'] == "0"){
                  echo '  <div class="profile-body-picture" style="border: 2px solid '.$usuario_info['ColorIcono'].'; animation: spin 4s infinite linear ; box-shadow: 0 0 15px 0 '.$usuario_info['ColorIcono'].'; background-color: '. $usuario_info['ColorFondo'] .'">
                            <i class="' . $usuario_info['Icono'] . '" style="color: '.$usuario_info['ColorIcono'].'"></i>
                          </div>';
                }else{
                  echo '  <div class="profile-body-picture" style="background-color: '. $usuario_info['ColorFondo'] .'">
                            <i class="' . $usuario_info['Icono'] . '" style="color: '.$usuario_info['ColorIcono'].'"></i>
                          </div>';
                }
                  echo ' <div class="profile-avatar-body">';
                    echo "<p>" . $usuario_info['usuario'] . "</p>";
                    if($usuario_info['tipo'] == 0){
                      $tipo = "<i class='fas fa-star'></i> Administrador";
                    }else if($usuario_info['tipo'] == 1){
                      $tipo = "<i class='fas fa-chess-knight'></i> Jugador";
                    }else if($usuario_info['tipo'] == 2){
                      $tipo = "<i class='fas fa-ruler-horizontal'></i> Árbitro";
                    }else if($usuario_info['tipo'] == 3){
                      $tipo = "<i class='fas fa-microphone'></i> Periodista";
                    }
                    echo "<p class='tipo-profile'>$tipo</p>";
                  ?>
                    </div>
                  </div>
                  <?php

                  if(isset($_SESSION['usuario'])){
                    if($usuario_info['usuario'] == $_SESSION['usuario'] || $_SESSION['tipo'] == 0){
                      echo '<a href="/cyberhydra/Profile/Editar/' . $usuario_info['usuario'] . '"><i class="fas fa-edit"></i> Editar Perfil</a>';
                    }
                  }else{

                  }
                  

                  ?>
                  
            </div>

            <section class="trofeos-wrapper">
              <div class="trofeo-header">
                <h1>Trofeos</h1>
                <div class="trofeos-list">

                  <div class="trofeo">
                    <div class="trofeo-img">
                      <img src="/cyberhydra/media/images/Trofeo.png" alt="">
                    </div>
                    <div class="trofeo-body">
                      <h1>Nombre del Trofeo</h1>
                      <p>Descripción del Trofeo</p>
                    </div>
                  </div>

                  <div class="trofeo">
                    <div class="trofeo-img">
                      <img src="/cyberhydra/media/images/Trofeo.png" alt="">
                    </div>
                    <div class="trofeo-body">
                      <h1>Nombre del Trofeo</h1>
                      <p>Descripción del Trofeo</p>
                    </div>
                  </div>

                </div>

              </div>
            </section>
            
            <div class="profile-grid">

              <div class="estadisticas-wrapper">
              <?php

              if($ELO !== null){
                echo "
                <div class='estadisticas-header'>
                  <h1>Estadisticas</h1>
                </div>
                <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>ELO:</h1><p>" .$ELO . "</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Victorias:</h1><p>$Victorias</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Tablas:</h1><p>$Tablas</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Derrotas:</h1><p>$Derrotas</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Coronaciones:</h1><p>$Coronaciones</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Piezas Comidas:</h1><p>$Comidas</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Victoria en menos tiempo:</h1><p>$Menos_Tiempo</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo'>Victoria en menos movimientos:</h1><p>$Menos_Movimientos</p>
                        </div>";
              }else{
                echo "<div class='estadisticas-empty'>
                        <h1><i class='fas fa-exclamation'></i> Lo sentimos...</h1>
                        <p>No hay estadisticas para mostrar.</p>
                      </div>";
              }
              
              echo '
              </div>

              <div class="logros-wrapper">
                <div class="logros-header">
                  <h1>Logros</h1><p>('.$numero_mislogros.')</p>
                </div>

                <div id="logros">';
                $contador = 1;

                do{

                  for($x = 1; $x < $numero_logros; $x ++){
                    if($contador <= 4){

                      if(isset($mislogros[($contador - 1)]['ID'])){

                        $ID = $mislogros[($contador - 1)]['ID'];
    
                        echo ' <div class="logro-wrapper">
                                  <div class="logro">
    
                                      <div class="logro-img">
                                          <img src="'. $logros[($ID - 1)]['Imagen'] .'" alt="">
                                          <i class="fas fa-lock" id="locked"></i>
                                      </div>
    
                                      <div class="logro-body">
                                          <h1>'. $logros[($ID - 1)]['Nombre'] .'</h1>
                                          <p>'. $logros[($ID - 1)]['Descripcion'] .'</p>
                                          <p class="porcentaje">'. $logros[($ID - 1)]['Porcentaje'] .'% de los usuarios tienen este logro.</p>
                                      </div>
                                  </div>
                              </div>';
    
                              $contador++;
                      }else{
                        echo ' <div class="logro-wrapper">
                                  <div class="logro locked">
    
                                      <div class="logro-img">
                                          <img src="'. $logros[($x - 1)]['Imagen'] .'" alt="">
                                          <i class="fas fa-lock" id="locked"></i>
                                      </div>
    
                                      <div class="logro-body">
                                          <h1>'. $logros[($x - 1)]['Nombre'] .'</h1>
                                          <p>'. $logros[($x - 1)]['Descripcion'] .'</p>
                                          <p class="porcentaje">'. $logros[($x - 1)]['Porcentaje'] .'% de los usuarios tienen este logro.</p>
                                      </div>
                                  </div>
                              </div>';
    
                              $contador++;
                      }
                    }
                    
                  }
                } while($contador <= 4);


                echo '</div>
                <a class="ver-logros" href="/cyberhydra/Profile/Logros/'.$usuario.'"><i class="fas fa-medal"></i>Ver todos los logros</a>
              </div>
            </div>
        </div>
    </section>

    <div id="footer">
    </div>
  </body>
</html>';
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