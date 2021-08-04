$( document ).ready(function(){

});

function backgroundColor(input){
    var color = input.value;
    $(".avatar").css("background-color", color);
    $(".icono").css("background-color", color);
}

function iconColor(input){
    var color = input.value;
    $("#icon").css("color", color);
    $("#icono-selec1").css("color", color);
    $("#icono-selec2").css("color", color);
    $("#icono-selec3").css("color", color);
    $("#icono-selec4").css("color", color);
    $("#icono-selec5").css("color", color);
    $("#icono-selec6").css("color", color);
    $("#icono-selec7").css("color", color);
}

function cambiarIcono(icono){
    var clase = icono.getAttribute( 'icono' );
    document.getElementById("icon").className = clase;
}

function guardar(user){
    var usuario = user;
    var icono = document.getElementById("icon").className;
    var color_icono = document.getElementById("colorIcono").value;
    var color_fondo = document.getElementById("colorbackground").value;

    $.ajax({
        url: "/ChessUY/Profile/PHP/enviarAvatar.php",
        type: "POST",
        data: {Usuario: usuario, Icono: icono, ColorIcono: color_icono ,ColorFondo: color_fondo},
        success: function (execute) {
            if(execute == true){
                location.href = location.href;
            }else{
                alert("Se pudrió.");
            }
        }
    });

}