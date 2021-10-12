<?php
    include '../../servidor.php';
    $server= new servidor();

    $noticias = $server->NoticiasIndex();

    echo "<div class='noticias-grid'>";

    for($x = 0; $x < 3; $x++){
        if(strlen($noticias[$x]['Informacion']) <= 100){
            $informacion = $noticias[$x]['Informacion'];
        }
        else{
            $informacion = substr($noticias[$x]['Informacion'],0,350) . '...';
        }


        echo "  <div class='noticia-wrapper'>
                    <div class='noticia'>
                        <div class='noticia-image'>
                        <img src='".$noticias[$x]['IMG']."' alt='' />
                        </div>
                        <div class='noticia-body'>
                        <h1>".$noticias[$x]['Titulo']."</h1>
                        <hr />
                        <p>
                            ".$informacion."
                        </p>
                        <a onclick='noticia(".$noticias[$x]['ID'].")'>Leer Más</a>
                        </div>
                    </div>
                </div>";

    }
    echo "</div>";

?>