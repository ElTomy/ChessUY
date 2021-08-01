
$( document ).ready(function(){
    $.ajax({
        url: "/cyberhydra/Profile/PHP/buscar.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("search-box").innerHTML = data;
        }
    });

    $(document).on('keyup', '#buscador', function(){

        var value = $(this).val();
        value = value.toLowerCase();
        console.log(value);

        buscador(value);
    });
    
});

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


