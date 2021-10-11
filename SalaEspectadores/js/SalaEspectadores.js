$( document ).ready(function(){
    $.ajax({
        url:  "/ChessUY/SalaEspectadores/php/TraigoPartidos.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("partidos").innerHTML = data;
        }
      });
});

var id_partido = "";
function verPartido(id){
    console.log("id", id)
    sessionStorage.setItem('id_partido', id)
    window.location.href = '/ChessUY/SalaEspectadores/ajedrezEspectadores.php?ID='+id;
}