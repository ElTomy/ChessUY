<?php

if(isset($_POST['exec'])) {
    $opc = $_POST['exec'];

    switch ($opc) {
        case 0:
            //Ingresa correctamente
            $modal =
            "<div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Te has unido al torneo</h1>
                        <hr>
                        <p>Ahora solo falta esperar a que el torneo empiece.</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Ok</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";
            break;
        case 1:
            //Ya esta unido
            $modal =
            "<div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Ya formas parte de un torneo</h1>
                        <hr>
                        <p>Recuerde que solo puede estar inscrito a un torneo a la vez.</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Ok</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";
            break;
        case 2:
            //Ya cerraron las inscripciones
            $modal =
            "<div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Desafortunadamente no llegaste a tiempo</h1>
                        <hr>
                        <p>Las inscripciones ya se cerraron.</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Ok</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";
            break;
        case 3:
            //Algo que no va
            $modal =
            "<div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Hubo un error</h1>
                        <hr>
                        <p>Reinicie la pagina e intente nuevamente.</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Ok</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";
            break;
        default:
            //Error inesperado?
            $modal =
            "<div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Te has unido al torneo</h1>
                        <hr>
                        <p>Ahora solo falta esperar a que el torneo empiece.</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='cerrar()'>Ok</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";
            break;
    }
    echo $modal;
}

?>
