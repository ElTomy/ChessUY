<?php
session_start();
$usu = $_SESSION["usuario"];
$Icon = $_SESSION["icono"];
$colFondo = $_SESSION["colorfondo"];
$colIcon = $_SESSION["coloricono"];

if($_SESSION['tipo'] == 0){
    $tipo = "<i class='fas fa-star'></i> Administrador";
  }else if($_SESSION['tipo'] == 1){
    $tipo = "<i class='fas fa-chess-knight'></i> Jugador";
  }else if($_SESSION['tipo'] == 2){
    $tipo = "<i class='fas fa-ruler-horizontal'></i> Árbitro";
  }else if($_SESSION['tipo'] == 3){
    $tipo = "<i class='fas fa-microphone'></i> Periodista";
  }
$Tablero = $_POST['Tablero'];
$mov = $_POST['Movimiento'];
$jaque = $_POST['jaque'];
$turno = $_POST['Turno'];
if(isset($_POST['Jugadas'])){
    $jugadas = $_POST['Jugadas'];
}
$letras_y = array("A", "B", "C", "D", "E", "F", "G", "H");
$numeros_x = array("8", "7", "6", "5", "4", "3", "2", "1");
$Ajedrez = '<div class="ajedrez-flex">
                    <div class="ajedrez-wrapper">
                        <div class="ajedrez">';


for($y = 1; $y <= 8; $y++){
    for($x = 1; $x <= 8; $x++){
       
        switch($Tablero[$x][$y]['Piezas']){

            case "t":
                $img = "<i class='fas fa-chess-rook' id='Blanco'></i>";
                break;
            case "tn":
                $img = "<i class='fas fa-chess-rook' id='Negro'></i>";
                break;

                case "c":
                    $img = "<i class='fas fa-chess-knight' id='Blanco'></i>";
                    break;
                case "cn":
                    $img = "<i class='fas fa-chess-knight' id='Negro'></i>";
                    break;

                    case "a":
                        $img = "<i class='fas fa-chess-bishop' id='Blanco'></i>";
                        break;
                    case "an":
                        $img = "<i class='fas fa-chess-bishop' id='Negro'></i>";
                        break;

                        case "d":
                            $img = "<i class='fas fa-chess-queen' id='Blanco'></i>";
                            break;
                        case "dn":
                            $img = "<i class='fas fa-chess-queen' id='Negro'></i>";
                            break;

                            case "r":
                                $img = "<i class='fas fa-chess-king' id='Blanco'></i>";
                                break;
                            case "rn":
                                $img = "<i class='fas fa-chess-king' id='Negro'></i>";
                                break;

                                case "p":
                                    $img = "<i class='fas fa-chess-pawn' id='Blanco'></i>";
                                    break;
                                case "pn":
                                    $img = "<i class='fas fa-chess-pawn' id='Negro'></i>";
                                    break;

                                    default:
                                    $img = "";
        }

        if($mov[$x][$y] == "true"){

            if($Tablero[$x][$y]['Piezas'] != null && ($Tablero[$x][$y]['Piezas'] != 'r' && $Tablero[$x][$y]['Piezas'] != 'rn')){
                $op = "style='display: flex'";
                $punto = "style = 'width: 80%; height: 80%; border: 5px solid rgba(255, 255, 255, 0.623); border-radius: 50%; background-color: none;'";
            }else{
                $op = "style='display: flex'";
                $punto = "style = 'width: 20%; height: 20%; border-radius: 50%; background-color: rgba(255, 255, 255, 0.623);'";
            }

            
        }else{
            $op = "";
            $punto = "";
        }
        $xjaque = '<i class="fas fa-times"></i>';
        if($jaque['jaque'] == true && ($Tablero[$x][$y]['Piezas'] == 'r' || $Tablero[$x][$y]['Piezas'] == 'rn') && $Tablero[$x][$y]['color'] != $jaque['color']){
                $op = "style='display: flex'";
                $punto = "style = 'width: 80%; height: 80%; border: 5px solid rgba(217, 63, 71, 1); border-radius: 50%; background-color: none;'";
        }

        //if
        if($y == 1){
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p><p class="board-text">' . $letras_y[($x - 1)] . '</p>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-text">' . $letras_y[($x - 1)] . '</p>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }

        }else if(($y)%2 == 0){
            if($y == 2 && $x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }else if($y == 2){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }else if($y == 8 && $x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>'. $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }else if($y == 8){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }else{
                if($x == 1){
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>'. $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
                }else{
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '>'. $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
                }
            }
        }else{
            if($y == 7 && $x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>'; 
            }else if($y == 7){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '>' . $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
            }else{
                if($x == 1){
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>'. $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
                }else{
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '>'. $img . '<div class="seleccionado" '. $op .'><div class="punto" ' . $punto .'></div></div>';
                }
            }
            
        }
        
        $Ajedrez .= '</div>';
    }
}

$movimientos = "'movimientos'";
$chat = "'chat'";

$Ajedrez .='
                    </div>
                        </div>
                    </div>
                </div>
                <div class="second-player-mobile">
                    <div class="profile-body-picture">
                    <i class="fas fa-user"></i>
                    </div>
                    <div class="profile-avatar-body">
                    <h1>ByJuanii</h1>
                    <p><i class="fas fa-chess-knight"></i> Jugador</p>
                    </div>
                </div>

                <div class="movimientos>
                </div>';

echo $Ajedrez;

?>