window.onload = function(){
    estadisticasInicial()
    
    $("#torn-InscAct").load("/ChessUY/Torneo/PHP/mostTorn.php");
    $("#torn-Act").load("/ChessUY/Torneo/PHP/tornsAct.php");
    $("#partiTorn").load("/ChessUY/Torneo/PHP/jugarPart.php");

};
