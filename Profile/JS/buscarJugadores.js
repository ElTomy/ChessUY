$( document ).ready(function(){
    $.ajax({
        url: "/ChessUY/Profile/PHP/buscar.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("search-box").innerHTML = data;
        }
    });
    
});

function perfil(usuario){
    location.href = usuario;
}