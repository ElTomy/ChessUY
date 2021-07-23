<?php
    include '/cyberhydra/servidor.php';
    $server= new servidor();
    session_start();
    $usuarios = $server->InfoUsuario();

    $numero_usuarios = count($usuarios);
    
    $jugador = "";

    $tipos = array("<p><i class='fas fa-star'></i> Administrador</p>", "<p><i class='fas fa-chess-knight'></i> Jugador</p>", "<p><i class='fas fa-ruler-horizontal'></i> Árbitro</p>", "<p><i class='fas fa-microphone'></i> Periodista</p>");

    for($x = 1; $x <= $numero_usuarios; $x++){

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
                                <button onclick= perfil('" . $usuarios[($x - 1)]['usuario'] . "')><i class='fas fa-id-card'></i><p class='buttonText'>Perfil</p></button>
                            </div>
                        </div>";
    }

    echo $jugador;

?>