<?php
$letras_y = array("A", "B", "C", "D", "E", "F", "G", "H");
$Ajedrez = "";
for($y = 1; $y <= 8; $y++){
    for($x = 1; $x <= 8; $x++){
        if($y == 1){
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell"><p class="board-number">' . $y . '</p><p class="board-text">' . $letras_y[($x - 1)] . '</p>';
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell"><p class="board-text">' . $letras_y[($x - 1)] . '</p>';
            }

        }else if(($y)%2 == 0){
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2"><p class="board-number">' . $y . '</p>';
            }else{
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2">';
            }

        }else{
            if($x == 1){
                $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell"><p class="board-number">' . $y . '</p>';
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