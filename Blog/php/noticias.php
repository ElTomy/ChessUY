<?php

include '../../servidor.php';
$server= new servidor();

$noticia = $server->MuestroNoticias();
$noticialength = count($noticia);


$noticias = '';

for($x = 0; $x < $noticialength; $x++){

    $noticias .= '  <div class="noticia">
                        <div class="noticia-img">
                            <img src="'.$noticia[$x]['IMG'].'" alt="" />
                        </div>
                        <div class="noticia-body">
                            <h1>'.$noticia[$x]['Titulo'].'</h1>
                            
                            <h3>'. $noticia[$x]['Descripcion'] .'</h3>
                            <hr />
                            <p class="autor"><span data-lang="author">Autor:</span> '. $noticia[$x]['Usuario'] .'</p>
                            <button class="ver-mas" onclick="noticia('.$noticia[$x]["ID"].')"><span data-lang="read-more">Ver más</span></button>
                        </div>
                    </div>';
}

echo $noticias;
return $noticias;
?>