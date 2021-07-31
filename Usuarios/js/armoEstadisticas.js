$( document ).ready(function(){
    $.ajax({
        url: "/ChessUY/Usuarios/armoStatsIndex.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("tabla-estadisticas").innerHTML = data;
        }
    });
});