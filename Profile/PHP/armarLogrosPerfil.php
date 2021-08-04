<?php
include '../../servidor.php';
$server= new servidor();
session_start();

$logros = $server->TraigoLogros();
$numero_logros = count($logros);

$logro = '';

for($x = 1; $x <= 4; $x++){
    $logro .= ' <div class="logro-wrapper">
                    <div class="logro">

                        <div class="logro-img">
                            <img src="'. $logros[($x - 1)]['Imagen'] .'" alt="">
                            <i class="fas fa-lock" id="locked"></i>
                        </div>

                        <div class="logro-body">
                            <h1>'. $logros[($x - 1)]['Nombre'] .'</h1>
                            <p>'. $logros[($x - 1)]['Descripcion'] .'</p>
                            <p class="porcentaje">'. $logros[($x - 1)]['Porcentaje'] .'% de los usuarios tienen este logro.</p>
                        </div>
                    </div>
                </div>';
}

echo $logro;
return $logro;
?>