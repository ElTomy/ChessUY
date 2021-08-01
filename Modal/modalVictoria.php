<?php
session_start();
if($_POST['turno']%2 == 0){
    $jugador = "ALFI ᴮᴼᵀ";
}else{
    $jugador = $_SESSION['usuario'];
}
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Victoria</h1>
                        <hr><div class='modal-trofeo'>
                        <img src='/cyberhydra/media/images/Trofeo.png'></div>
                        <p>El ganador fue:</p>
                        <h1 id ='jugador'>".$jugador."</h1>
                        <a onclick='cerrar()'><i class='fas fa-times-circle'></i> Cerrar</a>
                    </div>
                </div>
            </div>";

echo $modal;
return $modal;
?>