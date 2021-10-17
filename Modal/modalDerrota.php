<?php
session_start();
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Derrota</h1>
                        <hr><div class='modal-trofeo'>
                        <img src='/cyberhydra/media/images/Trofeo.png'></div>
                        <p>El ganador fue:</p>
                        <h1 id ='jugador'>".$_POST['jugador2']."</h1>
                        <a href='/ChessUY/Index.php'><i class='fas fa-home' aria-hidden='true'></i> Inicio</a>
                    </div>
                </div>
            </div>";

echo $modal;
return $modal;
?>