$( document ).ready(function(){

    cargarJugadores();

    $(document).on('keyup', '#buscador', function(){

        var value = $(this).val();
        value = value.toLowerCase();
        console.log(value);

        buscador(value);
    });
    
});

function cargarJugadores(){
    $.ajax({
        url: "/ChessUY/Profile/PHP/buscar.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("search-box").innerHTML = data;
        }
    });
}

function buscador(nombre){
    $.ajax({
        url: "/ChessUY/Profile/PHP/buscar.php",
        type: "POST",
        data: {Nombre: nombre},
        success: function (data) {
            document.getElementById("search-box").innerHTML = data;
        }
    });
}

function perfil(usuario){
    usuario = usuario.charAt(0).toUpperCase() + usuario.slice(1);
    location.href = usuario;
}

function eliminar(usuario){
    $('#modal').show();
    $.ajax({
        type: "POST",
        url: "/ChessUY/Modal/modalEliminarUsuario.php",
        data: {Usuario: usuario},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
    });
}

function borrar(usuario){
    $.ajax({
        type: "POST",
        url: "/ChessUY/Profile/PHP/borrar.php",
        data: {Usuario: usuario},
        success: function (response) {   
            $('#modal').hide();
            cargarJugadores();
        }
    });
}


