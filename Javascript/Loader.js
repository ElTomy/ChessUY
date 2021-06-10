window.onload = function(){
    $(".loader-wrapper").fadeOut("slow");

    $("#header").load("/ChessUY/Page/header.html");
    $("#footer").load("/ChessUY/Page/footer.html");
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