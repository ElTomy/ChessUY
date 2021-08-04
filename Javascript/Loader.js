window.onload = function(){
    $(".loader-wrapper").fadeOut("slow");

    $("#header").load("/ChessUY/Page/header.php");
    $("#footer").load("/ChessUY/Page/footer.html");

    $("#torn-InscAct").load("/ChessUY/Torneo/PHP/mostTorn.php");
};

function Modal(numero_mensaje){
    var numero = numero_mensaje;

    $.ajax({
        url: "/ChessUY/Modal/modal.php",
        type: "POST",
        data: { numero_mensaje: numero},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
    });
}