<?php
include '../../servidor.php';
$server= new servidor();
session_start();
//$partidos_Online = $server->PartidosOnline();
$partidos = $server->TraigoPartidos();

$info = "";

foreach($partidos as $part){
    //foreach partidos online
    if($part['usu2'] != null){   
    $Jug1 = $server->BuscoJugador($part['usu1']);
    $Jug2 = $server->BuscoJugador($part['usu2']);
    
    $info .= '
            <div class="partido">
                <div class="partido-top">
                <img src="/cyberhydra/media/images/Tablero.PNG" alt="">
                </div>
                <div class="partido-bottom">
                <div class="vs">
                    <div class="player1" style="background-color: '.$Jug1[0]["colFondo"].'">
                    <i class="'.$Jug1[0]['icono'].'" style="color: '.$Jug1[0]['colIcono'].'" "></i>
                    </div>
                    <h2>VS</h2>
                    <div class="player2" style="background-color: '.$Jug2[0]["colFondo"].'">
                    <i class="'.$Jug2[0]['icono'].'" style="color: '.$Jug2[0]['colIcono'].'" "></i>
                    </div>
                </div>
                <button onclick="verPartido('.$part["ID"].')">Ver</button>
                </div>
            </div>';
        }
    
}
//<a href="/cyberhydra/SalaEspectadores/ajedrezEspectadores.php?id='.$part["ID"].'">Ver</a>  
     

//echo json_encode($partidos[0]["ID"]);
echo $info;
?>