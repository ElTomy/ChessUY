$( document ).ready(function(){
    $.ajax({
        url: "/cyberhydra/Profile/PHP/buscar.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("search-box").innerHTML = data;
        }
    });
    
});

function perfil(usuario){
    usuario = usuario.charAt(0).toUpperCase() + usuario.slice(1);
    location.href = usuario;
}