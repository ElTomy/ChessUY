<?php
if($_POST['exec']) {
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>El torneo se creo correctamente</h1>
                        <hr>
                        <p>Todo salio bien, no te preocupes, el sistema se ocupa del resto</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Bien, muchas gracias</button>
                        </div>
                        </div>

                    </div>
                </div>
            </div>";
} else {
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>No se pudo crear el torneo</h1>
                        <hr>
                        <p>Asegurate que esten todos los datos, sino el problema es del servidor, intenta denuevo mas tarde</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Lo intentare denuevo</button>
                        </div>
                        </div>

                    </div>
                </div>
            </div>";
}

echo $modal;
return $modal;

?>