<?php
$numero_mensaje = $_POST['numero_mensaje'];

switch($numero_mensaje){
    case 1:
        $mensaje_2 = "Login:";
        $link = "/ChessUY/Form/Login";
        $mensaje = "El usuario o contraseña que ingresó es incorrecto.";
        break;
    
    case 2:
        $mensaje_2 = "Login:";
        $link = "/ChessUY/Form/Login";
        $mensaje = "No existe una cuenta con ese nombre de usuario.";
        break;

    case 3:
        $mensaje_2 = "Register:";
        $link = "/ChessUY/Index";
        $mensaje = "Su cuenta ha sido registrada con éxito.";
        break;

    case 4:
        $mensaje_2 = "Login:";
        $link = "/ChessUY/Index";
        $mensaje = "Se ha logeado correctamente.";
        break;

    case 5:
        $mensaje_2 = "Register:";
        $link = "/ChessUY/Index";
        $mensaje = "Tu cuenta ha sido creada correctamente pero actualmente no esta aprobada, en breve le informaremos.";
        break;
    
    case 6:
        $mensaje_2 = "Login:";
        $link = "";
        $mensaje = "Debe completar todos los campos.";
        break;

    case 7:
        $mensaje_2 = "Register:";
        $link = "";
        $mensaje = "Debe completar todos los campos.";
        break;

    case 8:
        $mensaje_2 = "Register:";
        $link = "";
        $mensaje = "La contraseña debe tener mas de 8 caracteres y solo puede contener letras y numeros.";
        break;
    
    case 9:
        $mensaje_2 = "Error:";
        $link = "";
        $mensaje = "Hubo un error inesperado, vuelve a intentarlo.";
        break;
}


$modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>$mensaje_2</h1>
                        <hr>
                        <p>$mensaje</p>
                        <a href='$link'><i class='fas fa-times-circle'></i> Cerrar</a>
                    </div>
                </div>
            </div>";

echo $modal;
return $modal;

?>

