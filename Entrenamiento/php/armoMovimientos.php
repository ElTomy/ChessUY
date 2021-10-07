<?php

if(isset($_POST['Jugadas'])){
    $jugadas = $_POST['Jugadas'];
}
if(isset($_POST['Turno'])){
$Turnos = $_POST['Turno'];
if($Turnos%2 == 0){
$colorJugador =  "";
$colorJugador2 ="style= 'color: #ffaa00'"; 
}else{
    $colorJugador ="style= 'color: #ffaa00'"; 
    $colorJugador2 =""; 
}
}

$movimientos = '
                                <table>
                                    <tr>
                                        <th>Pieza</th>
                                        <th>Movimiento</th>
                                    </tr>';
                                for($a = 1;$a<$Turnos;$a++){
                                    $i = $Turnos - $a;
                                $s = $jugadas[$i]['simbolo'];
                                switch($jugadas[$i]['Piezas']){
            
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
                                    switch($jugadas[$i]['Ejey']){

                                        case 1:
                                            $p = 8;
                                            break;
                                        case 2:
                                            $p = 7;
                                            break;
                        
                                        case 3:
                                            $p = 6;
                                            break;
                                        case 4:
                                            $p = 5;
                                            break;
                        
                                        case 5:
                                            $p = 4;
                                            break;
                                        case 6:
                                            $p = 3;
                                            break;
                    
                                        case 7:
                                            $p = 2;
                                            break;
                                        case 8:
                                            $p = 1;
                                            break;
                                    }
                                    switch($jugadas[$i]['Ejex']){

                                        case 1:
                                            $j = "A";
                                            break;
                                        case 2:
                                            $j = "B";
                                            break;
                        
                                        case 3:
                                            $j = "C";
                                            break;
                                        case 4:
                                            $j = "D";
                                            break;
                        
                                        case 5:
                                            $j = "E";
                                            break;
                                        case 6:
                                            $j = "F";
                                            break;
                    
                                        case 7:
                                            $j = "G";
                                            break;
                                        case 8:
                                            $j = "H";
                                            break;
                                    }
                                    $movimientos .=' <tr>
                                    <td>'.$img.'</td>';
                                    if($s == 'x'){
                                        $movimientos .='<td>'.$s.$j.$p.'</td>';
                                    }else{
                                    if($s == 'x+'){
                                        $movimientos .='<td>'.'x'.$j.$p.'+'.'</td>';
                                    }elseif ($s == 'x=') {
                                        $movimientos .='<td>'.'x'.$j.$p.'='.'</td>';
                                    }elseif ($s == '0-0' || $s == '0-0-0'){
                                        $movimientos .='<td>'.$s.'</td>';
                                    }else{
                                        $movimientos .='<td>'.$j.$p.$s.'</td>';
                                    }}
                                    
                                    $movimientos .='</tr>';
                                }
                                $movimientos .=' </table>';

                            echo $movimientos;
                            return $movimientos;
?>