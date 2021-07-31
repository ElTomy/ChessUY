<?php
session_start();
if($_POST['turno']%2 == 0){
    $jugador = $_SESSION['usuario'];
}else{
    $jugador = "ALFI ᴮᴼᵀ";
}
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Tablas</h1>
                        <hr><div class='modal-trofeo'>
                        <img src='/ChessUY/media/images/Trofeo.png'></div>
                        <h1 id ='jugador'>".$jugador."</h1>
                        <p>Rechazo las Tablas</p>
                        <p>Se sigue el juego</p>
                        <a onclick='cerrar()'><i class='fas fa-times-circle'></i> Cerrar</a>
                    </div>
                </div>
            </div>";

echo $modal;
return $modal;
?>