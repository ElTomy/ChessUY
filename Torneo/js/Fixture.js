$( document ).ready(function(){
    MuestroTorneos();
});
class Fixture{
    constructor(ronda, usuario1, usuario2){
    this.ronda=ronda;
    this.usuario1=usuario1;
    this.usuario2=usuario2;
}
get rond(){
    return this.ronda;
}
set rond(x){
    this.ronda=x;
}
get us1(){
    return this.usuario1;
}
set us1(x){
    this.usuario1=x;
}
get us2(){
    return this.usuario2;
}
set us2(x){
    this.usuario2=x;
}
}
function MuestroTorneos(){
    $.ajax({
        type: "POST",
        url: "/ChessUY/Torneo/PHP/TraigoTorneos.php",
        data: {},
        success: function (data) {
            document.getElementById("Torneos").innerHTML = data;
        }    
    });    
}
function Ficture(id){
    $.ajax({
        type: "POST",
        url: "/ChessUY/Torneo/PHP/Fixture.php",
        data: {id:id},
        success: function (data) {
            $.ajax({
                url: "/ChessUY/Modal/modal.php",
                type: "POST",
                data:{numero_mensaje: data},
                success: function (modal){
                    document.getElementById("modal").innerHTML = modal;
                }
            });
        }    
    });   
}
function FinalizarTorneo(id){
    $.ajax({
        type: "POST",
        url: "/ChessUY/Torneo/PHP/FinalizarTorneo.php",
        data: {id:id},
        success: function (data) {
            $.ajax({
                url: "/ChessUY/Modal/modal.php",
                type: "POST",
                data:{numero_mensaje: data},
                success: function (modal){
                    document.getElementById("modal").innerHTML = modal;
                }
            });
        }    
    });   
}
