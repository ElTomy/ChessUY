<?php
    include '../../servidor.php';
    $server= new servidor();
    session_start();

    if(isset($_SESSION['tipo'])){
        $tipo = $_SESSION['tipo'];
    }else{
        $tipo = 1;
    }

    if(isset($_POST['Nombre'])){
        $nombre = $_POST['Nombre'];
    }else{
        $nombre = "";
    }


    $usuarios = $server->InfoUsuario();

    $numero_usuarios = count($usuarios);
    
    $jugador = "";

    $tipos = array("<p><i class='fas fa-star'></i> Administrador</p>", "<p><i class='fas fa-chess-knight'></i> Jugador</p>", "<p><i class='fas fa-ruler-horizontal'></i> Árbitro</p>", "<p><i class='fas fa-microphone'></i> Periodista</p>");

    if($nombre != ""){
        $encontrado = false;

        for($x = 1; $x <= $numero_usuarios; $x++){

            $username = strtolower($usuarios[($x - 1)]['usuario']);

            if(strpos($username, $nombre) !== false){
                $encontrado = true;
                $jugador .= "    <div class='player-wrapper'>
                                                <div class='player'>
                                                    <div class='img-wrapper'>
                                                        <div class='player-img' style='background-color: ". $usuarios[($x - 1)]['ColorFondo']."'>
                                                            <div class='logo'><i class='". $usuarios[($x - 1)]['Icono'] ."' style='color: ". $usuarios[($x - 1)]['ColorIcono']."'></i></div>
                                                        </div>
                                                    </div>
                                                    <div class='player-body'>
                                                        <h1>" . $usuarios[($x - 1)]['usuario'] . "</h1>"
                                                        . $tipos[$usuarios[($x - 1)]['tipo']] .
                                                    "</div>
                                                </div>
                                                <div class='profileButton'>
                                                    <button onclick= perfil('" . $usuarios[($x - 1)]['usuario'] . "')><i class='fas fa-id-card'></i><p class='buttonText'>Perfil</p></button>";
                                                
                                                    if($tipo == 0){
                                                        $jugador .= "<button class='eliminar' onclick='eliminar('" . $usuarios[($x - 1)]['usuario'] . "')'><i class='fas fa-user-slash'></i> Eliminar</button>";
                                                    }
                                    $jugador .= "</div>
                                            </div>";
            }else{
            }
        }

        if($encontrado == false){
            $jugador .= "   <div class='player-not-found'>
                                    <h1><i class='fas fa-exclamation'></i> Lo sentimos...</h1>
                                    <p>No encontramos un usuario con ese nombre.</p>
                            </div>";
        }
    }else{
        for($x = 1; $x <= $numero_usuarios; $x++){
            $usuario = $usuarios[($x - 1)]['usuario'];

            $usuario2 = "'$usuario'";

            $jugador .= "    <div class='player-wrapper'>
                                            <div class='player'>
                                                <div class='img-wrapper'>
                                                    <div class='player-img' style='background-color: ". $usuarios[($x - 1)]['ColorFondo']."'>
                                                        <div class='logo'><i class='". $usuarios[($x - 1)]['Icono'] ."' style='color: ". $usuarios[($x - 1)]['ColorIcono']."'></i></div>
                                                    </div>
                                                </div>
                                                <div class='player-body'>
                                                    <h1>" . $usuarios[($x - 1)]['usuario'] . "</h1>"
                                                    . $tipos[$usuarios[($x - 1)]['tipo']] .
                                                "</div>
                                            </div>
                                            <div class='profileButton'>
                                                <button onclick= perfil('" . $usuarios[($x - 1)]['usuario'] . "')><i class='fas fa-id-card'></i><p class='buttonText'>Perfil</p></button>";
                                                
                                                if($tipo == 0){
                                                    $jugador .= '<button class="eliminar" onclick="eliminar(' . $usuario2 . ')"><i class="fas fa-user-slash"></i> Eliminar</button>';
                                                }
                                 $jugador .= "</div>
                                        </div>";
        }
    }
    
    

    echo $jugador;

?>