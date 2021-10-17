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
        $mensaje = "Hubo un error inesperado, o el nombre de usuario ya está en uso. Vuelve a intentarlo y si el error persiste contacte a un Administrador.";
        break;

    case 10:
        $mensaje_2 = "Register:";
        $link = "";
        $mensaje = "El año cursado debe ser numerico (1-6).";
        break;

    case 11:
        $mensaje_2 = "Register:";
        $link = "";
        $mensaje = "El campo de celular o de cedula debe ser numerico.";
        break;

    case 12:
        $mensaje_2 = "Register:";
        $link = "";
        $mensaje = "La cedula no es válida, debe tener 8 digitos.";
        break;

    case 13:
        $mensaje_2 = "Register:";
        $link = "";
        $mensaje = "El nombre de usuario no está disponible o contiene caracteres no permitidos";
        break;

    case 14:
        $mensaje_2 = "Editar:";
        $link = "";
        $mensaje = "El nombre de usuario ya existe.";
        break;

    case 15:
        $mensaje_2 = "Editar:";
        $link = "";
        $mensaje = "Debes completar ambos campos para cambiar la contraseña.";
        break;

    case 16:
        $mensaje_2 = "Editar:";
        $link = "";
        $mensaje = "La contraseña actual no es correcta.";
        break;

    case 17:
        $mensaje_2 = "Editar:";
        $link = "";
        $mensaje = "Se ha cambiado la contraseña con exito.";
        break;

    case 18:
        $mensaje_2 = "Noticia:";
        $link = "";
        $mensaje = "Debe completar todos los campos.";
        break;

    case 19:
        $mensaje_2 = "Noticia:";
        $link = "";
        $mensaje = "La noticia se ha creado con exito.";
        break;

    case 20:
        $mensaje_2 = "Noticia:";
        $link = "";
        $mensaje = "La noticia se ha editado con exito.";
        break;
    
    case 21:
        $mensaje_2 = "Entrenamientos:";
        $link = "";
        $mensaje = "Ese movimiento es incorrecto.";
        break;    

    case 22:
        $mensaje_2 = "Entrenamientos:";
        $link = "";
        $mensaje = "Felicidades completaste este entrenamiento.";
        break;  
        
    case 23:
        $mensaje_2 = "Entrenamientos:";
        $link = "";
        $mensaje = "No quedan entrenamientos.";
        break;  
    case 24:
        $mensaje_2 = "Organizar Torneos:";
        $link = "";
        $mensaje = "El emparejamiento entre los jugadores se realizo correctamente.";
        break;  
    case 25:
        $mensaje_2 = "Organizar Torneos:";
        $link = "";
        $mensaje = "El emparejamiento entre los jugadores no se realizo debido a que no sea han concretado todos los partidos.";
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
                        <a onclick='cerrar()'><i class='fas fa-times-circle'></i> Cerrar</a>
                    </div>
                </div>
            </div>";

echo $modal;
return $modal;

?>

