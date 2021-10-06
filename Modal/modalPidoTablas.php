<?php
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/cyberhydra/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Tablas</h1>
                        <hr><div class='modal-trofeo'>
                        <img src='/cyberhydra/media/images/Trofeo.png'></div>
                        <h1 id ='jugador'>".$_POST['jugador2']."</h1>
                        <p>Pide Tablas</p>
                        <div style='display:flex; justify-content: center; aline-items: center'>
                        <a onclick='aceptar_tablas();'><i class='fas fa-times-circle'></i> Aceptar</a>
                        <a onclick='rechazar_tablas();'><i class='fas fa-times-circle'></i> Rechazar</a>
                        </div>
                    </div>
                </div>
            </div>";

echo $modal;
return $modal;
?>