<?php
$color = $_POST['color'];
$x = $_POST['x'];
$y = $_POST['y'];

if($color == 'b'){
    $d = '"'.$x.'","'.$y.'", "d" , "'.$color.'"';
    $a = '"'.$x.'","'.$y.'", "a" , "'.$color.'"';
    $c = '"'.$x.'","'.$y.'", "c" , "'.$color.'"';
    $t = '"'.$x.'","'.$y.'", "t" , "'.$color.'"';
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
                            <button onclick = 'cambioCoronacion($d)'><i class='fas fa-chess-queen' id='Blanco'></i></button>
                            <button onclick = 'cambioCoronacion($a)'><i class='fas fa-chess-bishop' id='Blanco'></i></button>
                            <button onclick = 'cambioCoronacion($c)'><i class='fas fa-chess-knight' id='Blanco'></i></button>
                            <button onclick = 'cambioCoronacion($t)'><i class='fas fa-chess-rook' id='Blanco'></i></button>
                        </div>

                    </div>
                </div>
            </div>";
}else{
    $dn = '"'.$x.'","'.$y.'", "dn" , "'.$color.'"';
    $an = '"'.$x.'","'.$y.'", "an" , "'.$color.'"';
    $cn = '"'.$x.'","'.$y.'", "cn" , "'.$color.'"';
    $tn = '"'.$x.'","'.$y.'", "tn" , "'.$color.'"';
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
                        <button onclick = 'cambioCoronacion($dn)'><i class='fas fa-chess-queen' id='Negro'></i></button>
                        <button onclick = 'cambioCoronacion($an)'><i class='fas fa-chess-bishop' id='Negro'></i></button>
                        <button onclick = 'cambioCoronacion($cn)'><i class='fas fa-chess-knight' id='Negro'></i></button>
                        <button onclick = 'cambioCoronacion($tn)'><i class='fas fa-chess-rook' id='Negro'></i></button>
                        </div>

                    </div>
                </div>
            </div>";
}

echo $modal;
return $modal;

?>