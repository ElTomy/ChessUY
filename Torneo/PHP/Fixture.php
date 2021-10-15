<?php
include '../../servidor.php';
$server = new servidor();
date_default_timezone_set("America/Montevideo");
if(isset($_POST['id'])){
    
    $IDT = $_POST['id'];
    $Participantes = [];
    $Participantes = $server->FixturePuntos($IDT);
    $cantParticipantes = count($Participantes);
    $partidos = $server->TraigoPartidosTorneo();
    $Info = $server->InfoPartida('',$IDT);
    $Torns = $server->InfoTorneo();
    $cant = count($Torns);
    for($a = 0;$a<$cant;$a++){
        if($Torns[$a]["ID_Torneo"] = $IDT){
            $TiempoPart = $Torns[$a]["tiempo"];
        }
    }
    if($Info){
        $Ronda = $Info[0]['ronda'];
        $Ronda++;
    }else{
        $Ronda = 1;
    }
    $day = date('d');
    $mes = date('m');
    $year = date('Y');
    $cantdias = cal_days_in_month(CAL_GREGORIAN, $mes, $year);
    if($cantdias == $day){
        if($mes = 12){
            $mes = 1;
            $year++;
            $day = 1;
        }else{
            $mes++;
            $day = 1;
        }
    }else{
        $day++;
    }
    $num = 1;
    $col = 0;
    foreach ($partidos as $buscoPartido) {
        if($buscoPartido['Torneo'] == $IDT){
            if($buscoPartido['estado'] == 1){
               $col = 1;
           }
        }
    }
    if($col == 0){
        for($x = 1;$x <= $cantParticipantes;$x++){
            if($x%2 != 0){
                $Usu1 = $Participantes[$x]['Usuario'];
                $Usu2 = $Participantes[($x-1)]['Usuario'];
            }else{
                if($num == 1){
                    $Hora = 120000;
                }else{
                    if($num == 2){
                        $Hora = 140000;
                    }else{
                        if($num == 3){
                            $Hora = 160000;
                        }else{
                            if($num == 4){
                                $Hora = 180000;
                                if($cantdias == $day){
                                    if($mes = 12){
                                        $mes = 1;
                                        $year++;
                                        $day = 1;
                                    }else{
                                        $mes++;
                                        $day = 1;
                                    }
                                }else{
                                    $day++;
                                }
                                $num = 0;
                            }
                        }
                    }
                }
                $num++;
                $fecha =  $year.$mes.$day.$Hora;
                $server->AgendoPartida($Usu1, $Usu2,"1","2",$IDT,$TiempoPart);
                $server->InfoPartidaTorneo($IDT,$Usu1, $Usu2, $fecha, $Ronda);
            }
        }
    }
}
?>