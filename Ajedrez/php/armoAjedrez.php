<?php

$letras_y = array("A", "B", "C", "D", "E", "F", "G", "H");
$numeros_x = array("8", "7", "6", "5", "4", "3", "2", "1");
$Ajedrez = "";

$torre_n = "<i class='fas fa-chess-rook' id='Negro'></i>";
$caballo_n = "<i class='fas fa-chess-knight' id='Negro'></i>";
$alfil_n = "<i class='fas fa-chess-bishop' id='Negro'></i>";
$reina_n = "<i class='fas fa-chess-queen' id='Negro'></i>";
$rey_n = "<i class='fas fa-chess-king' id='Negro'></i>";
$peon_n = "<i class='fas fa-chess-pawn' id='Negro'></i>";

$torre_b = "<i class='fas fa-chess-rook' id='Blanco'></i>";
$caballo_b = "<i class='fas fa-chess-knight' id='Blanco'></i>";
$alfil_b = "<i class='fas fa-chess-bishop' id='Blanco'></i>";
$reina_b = "<i class='fas fa-chess-queen' id='Blanco'></i>";
$rey_b = "<i class='fas fa-chess-king' id='Blanco'></i>";
$peon_b = "<i class='fas fa-chess-pawn' id='Blanco'></i>";


$posicionFicha_n = array($torre_n, $caballo_n, $alfil_n, $reina_n, $rey_n, $alfil_n, $caballo_n, $torre_n);
$posicionFicha_b = array($torre_b, $caballo_b, $alfil_b, $reina_b, $rey_b, $alfil_b, $caballo_b, $torre_b);






for($y = 1; $y <= 8; $y++){
    for($x = 1; $x <= 8; $x++){
        if($y == 1){
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p><p class="board-text">' . $letras_y[($x - 1)] . '</p>' . $posicionFicha_n[($x - 1)];
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-text">' . $letras_y[($x - 1)] . '</p>' . $posicionFicha_n[($x - 1)];
            }

        }else if(($y)%2 == 0){
            if($y == 2 && $x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>' . $peon_n;
            }else if($y == 2){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '>' . $peon_n;
            }else if($y == 8 && $x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p><p class="board-text">' . $letras_y[($x - 1)] . '</p>' . $posicionFicha_b[($x - 1)];
            }else if($y == 8){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-text">' . $letras_y[($x - 1)] . '</p>' . $posicionFicha_b[($x - 1)];
            }else{
                if($x == 1){
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>';
                }else{
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2" id=' . $x . '' . $y. '>';
                }
            }
        }else{
            if($y == 7 && $x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>' . $peon_b; 
            }else if($y == 7){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '>' . $peon_b;
            }else{
                if($x == 1){
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '><p class="board-number">' . $numeros_x[($y - 1)] . '</p>';
                }else{
                    $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell" id=' . $x . '' . $y. '>';
                }
            }
            
        }
        $Ajedrez .='</div>';
    }
}
echo $Ajedrez;
return $Ajedrez;
?>