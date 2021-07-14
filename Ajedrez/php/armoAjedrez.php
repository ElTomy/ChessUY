<?php
$Tablero = $_POST['Tablero'];
$mov = $_POST['Movimiento'];
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
$letras_y = array("A", "B", "C", "D", "E", "F", "G", "H");
$numeros_x = array("8", "7", "6", "5", "4", "3", "2", "1");
$Ajedrez = '    <div class="mobile-img">
                    <img src="../media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
                </div>
                <div class="first-player-mobile">
                    <div class="first-player-wrapper">
                        <div class="profile-body-picture">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="profile-avatar-body">
                            <h1>ByJuanii</h1>
                            <p><i class="fas fa-chess-knight"></i> Jugador</p>
                        </div>
                    </div>
                    <p class="espectadores"><i class="fas fa-eye"></i> 10</p>
                </div>
                <div class="ajedrez-flex">
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

            if($Tablero[$x][$y]['Piezas'] != null){
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

/*

En la parte donde hace el <a href="/ChessUY/Profile/ByJuanii <-- aca hay que poner el nombre del Usuario ej: "ByJuanii";

*/
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

                <div class="movimientos">
                <div class="movimientos-img">
                    <img src="../media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
                </div>
                <div class="jugadores">
                    <a href="/ChessUY/Profile/ByJuanii">
                        <div class="JugadorUno">
                            <div class="jugador-img">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="jugador-body">
                                <h1 '.$colorJugador.' >ByJuanii</h1>
                                <p><i class="fas fa-star"></i> Administrador</p>
                            </div>
                        </div>
                    </a>
                    <h1>-</h1>
                    <a href="/ChessUY/Profile/ByJuanii">
                        <div class="JugadorDos">
                            <div class="jugador-body">
                                <h1 '.$colorJugador2.'>Jugador 2</h1>
                                <p><i class="fas fa-chess-knight"></i> Jugador</p>
                            </div>
                            <div class="jugador-img">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <h1>Movimientos</h1>
                <div class="table-wrapper">
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
                            $Ajedrez .=' <tr>
                            <td>'.$img.'</td>';
                            if($s == 'x'){
                                $Ajedrez .='<td>'.$s.$j.$p.'</td>';
                            }else{
                               if($s == 'x+'){
                                $Ajedrez .='<td>'.'x'.$j.$p.'+'.'</td>';
                               }elseif ($s == 'x=') {
                                $Ajedrez .='<td>'.'x'.$j.$p.'='.'</td>';
                               }elseif ($s == '0-0' || $s == '0-0-0'){
                                $Ajedrez .='<td>'.$s.'</td>';
                               }else{
                                $Ajedrez .='<td>'.$j.$p.$s.'</td>';
                            }}
                            
                            $Ajedrez .='</tr>';
                        }
                        $Ajedrez .=' </table>
                </div>
                <button onclick="Derrota()"><i class="fas fa-flag"></i> Rendirse</button>
                </div>';

echo $Ajedrez;

?>