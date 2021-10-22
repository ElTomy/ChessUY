<?php
include '../servidor.php';
$server= new servidor();

$usuarios_info = $server->Top();

$estadisticas = "";

for($x = 1; $x <= 5; $x++){
    $estadisticas .= '  <a class="player" href="/cyberhydra/Profile/Profile.php?Usuario='.$usuarios_info[($x - 1)]['usuario'].'">
                            <div class="info-left">

                                <p class="posicion">#'.$x.'</p>

                                <div class="player-img" style="background-color: '.$usuarios_info[($x - 1)]['ColorFondo'].'">
                                    <i class="'.$usuarios_info[($x - 1)]['Icono'].'" style="color: '.$usuarios_info[($x - 1)]['ColorIcono'].'"></i>
                                </div>

                                <p class="nombre">'.$usuarios_info[($x - 1)]['usuario'].'</p>
                                
                            </div>

                            <div class="puntaje">
                            '. $usuarios_info[($x - 1)]['ELO'] .'
                            </div>

                        </a>';
}

echo $estadisticas;
return $estadisticas;

?>