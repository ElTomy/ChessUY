<?php
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Esperando</h1>
                        <hr><div>
                            <i class='fas fa-spinner' style='color: #ffaa00; animation: spin 3s infinite linear; font-size:200px'></i>
                          </div>
                        
                        <p class='modal-p'>".$_POST['jugador2']." esta desconectado!</p>
                        <p class='modal-p'>Puedes esperalo a que se reconecte o volver al menu.</p>
                        <a href='/ChessUY/Index.php'><i class='fas fa-home' aria-hidden='true'></i> Inicio</a>
                        </div>
                        </div>
                </div>
            </div>";

echo $modal;
?>