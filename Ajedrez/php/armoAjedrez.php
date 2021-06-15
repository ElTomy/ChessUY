<?php
for($x = 1; $x <= 8; $x += 1){
    for($y = 1; $y <= 8; $y += 1){
        $Ajedrez .='<div onclick="seleccionar($x,$y)" class=';
        if(($x + $y)%2 == 0){
            $Ajedrez .='"cell">';
        }else{
            $Ajedrez .='"cell2">';
        }
        $Ajedrez .='</div>';
    }
    $Ajedrez .='<p class="board-number">$x</p>';
}
//juani el tema de las letras no se si sabes una forma mas facil de hacer que usar un switch 
$Ajedrez ='
<p class="board-text">H</p>             
';
echo $Ajedrez;
return $Ajedrez;
?>