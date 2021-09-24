$( document ).ready(function(){
    $.ajax({
        url:  "/ChessUY/SalaEspectadores/php/TraigoPartidos.php",
        type: "POST",
        data: {},
        success: function (data) {
            console.log(data)
            document.getElementById("partidos").innerHTML = data;
        }
      });
});