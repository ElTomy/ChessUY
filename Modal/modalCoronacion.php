<?php

$color = $_POST['color'];
if($color == 'b'){
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Coronación</h1>
                        <hr>
                        <p>Elija su pieza</p>
                        <div style='display: flex'>
                        <i class='fas fa-chess-queen' id='Blanco'></i>
                        <i class='fas fa-chess-bishop' id='Blanco'></i>
                        <i class='fas fa-chess-knight' id='Blanco'></i>
                        <i class='fas fa-chess-rook' id='Blanco'></i>
                        </div>

                    </div>
                </div>
            </div>";
}else{
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Coronación</h1>
                        <hr>
                        <p>Elija su pieza</p>
                        <div >
                        <img src='/ChessUY/media/svg/Piezas/SVG/Reina_Dorada.svg' alt=''>
                        <img src='/ChessUY/media/svg/Piezas/SVG/Torre_Dorada.svg' alt=''>
                        <img src='/ChessUY/media/svg/Piezas/SVG/Caballo_Dorado.svg' alt=''>
                        <img src='/ChessUY/media/svg/Piezas/SVG/Alfil_Dorada.svg' alt=''>
                        </div>

                    </div>
                </div>
            </div>";
}

echo $modal;
return $modal;

?>