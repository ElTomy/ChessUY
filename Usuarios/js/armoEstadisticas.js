$( document ).ready(function(){
    $.ajax({
        url: "/cyberhydra/Usuarios/armoStatsIndex.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("tabla-estadisticas").innerHTML = data;
        }
    });
});