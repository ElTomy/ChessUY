
<script src="/ChessUY/Ajedrez/js/ajedrez.js"></script>
<?php
$color = $_POST['color'];
$x = $_POST['x'];
$y = $_POST['y'];

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
                        <div class='button-wrapper'>
                            <button onclick = 'cambioCoronacion($x, $y, 'd', $color)'><i class='fas fa-chess-queen' id='Blanco'></i></button>
                            <button><i class='fas fa-chess-bishop' id='Blanco'></i></button>
                            <button><i class='fas fa-chess-knight' id='Blanco'></i></button>
                            <button><i class='fas fa-chess-rook' id='Blanco'></i></button>
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
                        <button cambioCoronacion($x, $y, dn, $color)><i class='fas fa-chess-queen' id='Negro'></i></button>
                        <button><i class='fas fa-chess-bishop' id='Negro'></i></button>
                        <button><i class='fas fa-chess-knight' id='Negro'></i></button>
                        <button><i class='fas fa-chess-rook' id='Negro'></i></button>
                        </div>

                    </div>
                </div>
            </div>";
}

echo $modal;
return $modal;

?>