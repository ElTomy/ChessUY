<?php

    $id_noticia = $_POST['ID'];

    $modal = '<div class="modal">
                <div class="modal-wrapper">
                    <div class="modal-logo">
                        <img src="/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
                    </div>
                    <div class="modal-content">
                        <h1>Eliminar</h1>
                        <hr><div class="modal-trofeo">
                        <p>¿Seguro que desea eliminar la noticia?</p>
                        <h3>(Se borrará completamente y se perderán todos los datos).</h3>
                        <div class="eliminar-buttons">
                            <a onclick="borrar('.$id_noticia.')"><i class="fas fa-newspaper"></i> Borrar</a>
                            <a onclick="cerrar()"><i class="fas fa-times-circle"></i> Cancelar</a>
                        </div>
                        
                    </div>
                </div>
            </div>';

echo $modal;
return $modal;
?>