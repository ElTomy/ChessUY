<?php
include '../servidor.php';
$server= new servidor();
session_start();

$usuario = $_GET['Usuario'];

$usuario2 = "'$usuario'";

if($usuario !== $_SESSION['usuario']){
  if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo'] !== 0){
      header('Location: /cyberhydra/');
    }
    if($_SESSION['tipo'] == 0){
      $disabled = "";
    }else{
      $disabled = "disabled";
    }
  }else{
    header('Location: /cyberhydra/');
  }
}else{
  if($_SESSION['tipo'] == 0){
    $disabled = "";
  }else{
    $disabled = "disabled";
  }
}





$usuario_info = $server->PerfilUsuario($usuario);

$tipo = array("<i class='fas fa-star'></i> Administrador", "<i class='fas fa-chess-knight'></i> Jugador", "<i class='fas fa-ruler-horizontal'></i> Árbitro", "<i class='fas fa-microphone'></i> Periodista")
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
    <script src="/cyberhydra/Profile/JS/editarPerfil.js"></script>

    
    <link
      rel="shortcut icon"
      href="/cyberhydra/media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/cyberhydra/styles/styles.css" />

    <title>ChessUY | Editar Perfil</title>
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

    <?php

    $Perfil = '
    <section class="editarperfil-wrapper">
        <div class="editarperfil">
            <div class="editarperfil-body">
                <div class="editarperfil-logo">
                    <img src="/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
                </div>
                <h1>Editar Perfil</h1>
                <hr>
                <div class="editarperfil-inputs">
                    <div class="img-wrapper">
                        <div class="img-editarperfil">
                            <div class="editarperfil-img" style="background-color: '. $usuario_info['ColorFondo'] .'">
                                <i class="' . $usuario_info['Icono'] . '" style="color: '. $usuario_info['ColorIcono'] .'"></i>
                            </div>
                            <a href="/cyberhydra/Profile/avatarChange.php?Usuario='.$usuario.'" class="editarpefil-img-hover">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>

                        <h1>' . $usuario_info["usuario"] . '</h1>
                        <p>' . $tipo[$usuario_info["tipo"]] . '</p>
                    </div>
                    <div class="editarperfil-body-wrapper">
                        <h1 class="titulos-divisiones">Nombre de Usuario</h1>
                        <hr class="lineadivisora">
                        <div class="inputs">
                            <label>Usuario: </label> <input id="Usuario" type="text" placeholder="Usuario" value="' . $usuario_info["usuario"] . '">
                        </div>
                        <h1 class="titulos-divisiones">Información Personal</h1>
                        <hr class="lineadivisora">
                        <div class="inputs">
                            <label>Nombre: </label> <input id="Nombre" type="text" placeholder="Nombre" value="' . $usuario_info["Nombre"] . '" '.$disabled .'>
                        </div>
                        <div class="inputs">
                            <label>Apellido: </label> <input id="Apellido" type="text" placeholder="Apellido" value="' . $usuario_info["apellido"] . '" '.$disabled .'>
                        </div>
                        <div class="inputs">
                            <label>Correo Electrónico: </label> <input id="Email" type="text" placeholder="Email" value="' . $usuario_info["Mail"] . '" '.$disabled .'>
                        </div>
                        <div class="inputs">
                            <label>Institución: </label> <input id="Institucion" type="text" placeholder="Institución" value="' . $usuario_info["Institucion"] . '" '.$disabled .'>
                        </div>
                        <div class="inputs">
                            <label>Año: </label> <input id="Año" type="text" placeholder="Año" value="' . $usuario_info["año"] . '" '.$disabled .'>
                        </div>
                        <div class="inputs">
                            <label>Documento: </label> <input id="Documento" type="text" placeholder="Documento" value="' . $usuario_info["ci"] . '" '.$disabled .'>
                        </div>
                        <div class="inputs">
                            <label>Celular: </label> <input id="Celular" type="text" placeholder="Celular" value="' . $usuario_info["Contacto"] . '" '.$disabled .'>
                        </div>
                        <h1 class="titulos-divisiones">Cambiar Contraseña</h1>
                        <hr class="lineadivisora">
                        <div class="inputs" id="contraseña-anterior">
                            <label>Contraseña Anterior: </label> <input id="ContraActual" type="password" placeholder="Contraseña Anterior">
                        </div>
                        <div class="inputs" id="contraseña-nueva">
                            <label>Nueva Contraseña: </label> <input id="ContraNueva" type="password" placeholder="Nueva Contraseña">
                        </div>
                        <div class="botonContra">
                            <button onclick="contraseña('.$usuario2.')"><i class="fas fa-key"></i> Cambiar Contraseña</button>
                        </div>
                        <hr class="lineadivisora">
                        <div class="botonGuardar">
                            <button onclick="guardar('.$usuario2.')"><i class="fas fa-save"></i> Guardar Cambios</button>
                            <button class="deshabilitar" onclick="eliminar('.$usuario2.')"><i class="fas fa-user-slash"></i> Deshabilitar Cuenta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';
    echo $Perfil;
    ?>

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