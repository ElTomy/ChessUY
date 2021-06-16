<?php
$letras_y = array("A", "B", "C", "D", "E", "F", "G", "H");
$numeros_x = array("8", "7", "6", "5", "4", "3", "2", "1");
$Ajedrez = "";
for($y = 1; $y <= 8; $y++){
    for($x = 1; $x <= 8; $x++){
        if($y == 1){
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell"><p class="board-number">' . $numeros_x[($y - 1)] . '</p><p class="board-text">' . $letras_y[($x - 1)] . '</p>';
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell"><p class="board-text">' . $letras_y[($x - 1)] . '</p>';
            }

        }else if(($y)%2 == 0){
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2"><p class="board-number">' . $numeros_x[($y - 1)] . '</p>';
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2">';
            }

        }else{
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell"><p class="board-number">' . $numeros_x[($y - 1)] . '</p>';
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell">';
            }

        }
        $Ajedrez .='</div>';
    }
}
echo $Ajedrez;
return $Ajedrez;
?>