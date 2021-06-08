function mostrarSolicitudes(){
    $.ajax({
        type: "POST",
        url: "Usuarios/Solicitud/PHP/Solicitud.php",
        data: "",
        success: function (response) {
            console.log(response);
        }
    });
}