window.onload = function(){
    $(".loader-wrapper").fadeOut("slow");

    $("#header").load("/ChessUY/Page/header.html");
    $("#footer").load("/ChessUY/Page/footer.html");
};