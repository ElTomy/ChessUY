<?php

include '../../servidor.php';
$server= new servidor();
session_start();

$logros = $server->TraigoLogros();
$numero_logros = count($logros);

$logro = "";

for($x = 1; $x <= $numero_logros; $x++){
    $logro .= '  <div class="logro">
                    <div class="logro-img">
                        <img src="'. $logros[($x - 1)]['Imagen'] .'" alt="">
                        <i class="fas fa-lock" id="locked"></i>
                    </div>

                    <h1>'. $logros[($x - 1)]['Nombre'] .'</h1>
                    <p class="desc">'. $logros[($x - 1)]['Descripcion'] .'</p>
                    <p>'. $logros[($x - 1)]['Porcentaje'] .'% de los usuarios tienen este logro.</p>
                </div>';
}

echo $logro;
return $logro;

?>