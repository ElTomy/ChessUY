<?php
$Ajedrez = "hola";
for($x = 1; $x < 8; $x++){
    for($y = 1; $y < 8; $y++){
        if(($x + $y)%2 == 0){
            $Ajedrez .='<div onclick="seleccionar($x,$y)" class="cell">';
        }else{
            $Ajedrez .='<div onclick="seleccionar($x,$y)" class="cell2">';
        }
        $Ajedrez .='</div>';
    }
}
//juani el tema de las letras y numeros  no se como acerlo 
$Ajedrez .='
<p class="board-number">$x</p>
<p class="board-text">H</p>             
';
echo $Ajedrez;
return $Ajedrez;
?>