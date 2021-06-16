<?php
$Ajedrez = "";
for($y = 1; $y <= 8; $y++){
    for($x = 1; $x <= 8; $x++){
        if(($y)%2 == 0){
            $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell2">';
        }else{
            $Ajedrez .='<div onclick="seleccionar('.$x.','.$y.')" class="cell">';
        }
        $Ajedrez .='</div>';
    }
}
//juani el tema de las letras y numeros  no se como acerlo 
/*$Ajedrez .='
<p class="board-number">$x</p>
<p class="board-text">H</p>             
';*/
echo $Ajedrez;
return $Ajedrez;
?>