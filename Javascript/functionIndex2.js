window.onload = function(){
    estadisticasInicial()
    
    $("#torn-InscAct").load("/cyberhydra/Torneo/PHP/mostTorn.php");
    $("#torn-Act").load("/cyberhydra/Torneo/PHP/tornsAct.php");
    $("#partiTorn").load("/cyberhydra/Torneo/PHP/jugarPart.php");

};
