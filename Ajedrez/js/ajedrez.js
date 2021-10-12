$( document ).ready(function(){
    $.ajax({
        url:  "/ChessUY/Modal/modalEspera.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
      });
    $.ajax({
        async: false,
        url:  "/ChessUY/Ajedrez/php/buscoPartido.php",
        type: "POST",
        data: {},
        success: function (data) {
            partido = JSON.parse(data)
            ID_partido = partido['ID_partido'];
            numJugador = partido['numJugador'];
            jugador1 = partido['jugador1'];
            jugador2 = partido['jugador2'];
            turno = partido['turno'];
            col1 = partido['col1'];
            col2 = partido['col2'];
            partido_encontrado = partido['partido_encontrado'];
            colJugador = partido['colJugador'];
            blan = partido['blan'];
            neg = partido['neg'];
            //:Veo si habian quedado en jaque
            $.ajax({
                url:  "/ChessUY/Ajedrez/php/traigoJaque.php",
                type: "POST",
                data: {numJugador:numJugador},
                success: function (data) {
                    tjaque = JSON.parse(data);
                    jaque = tjaque;
                }
              });
        }
      });
    armoOnline();
    resetMovimientos();
    armoAjedrez();
    init();
    barraProgreso(50);
});
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function armoOnline(){
    CreoTablero();
    //:EXISTE EL PARTIDO
    if(partido_encontrado == true){
        traigoTablero();
        if(numJugador == 1){
            if(col1 == 1){
                colJugador = col1;
                blan = 8;
                neg = 1;
            }else{
                colJugador = col1;
                blan = 1;
                neg = 8;
            }
        }else{
            if(col2 == 1){
                colJugador = col2;
                blan = 8;
                neg = 1;
            }else{
                colJugador = col2
                blan = 1;
                neg = 8;
            }
        }
         Turno = turno;
      
    }else{
        //:CREA EL PARTIDO
        PosicionPiezas();
        armoAjedrez();
        guardoTablero();
        Turno = 1;
    }
}
var ID_partido;
function guardoTablero(){
    console.log("GUARDO");
    var tab2 = JSON.stringify(Tablero);
    var movs = JSON.stringify(Jugadas)
    $.ajax({
        url:  "/ChessUY/Ajedrez/php/guardoTablero.php",
        type: "POST",
        data: {id_partido:ID_partido,tablero: tab2, turno: Turno, movimientos: movs, barra:barra},
        success: function (data) {
            $.ajax({
                url:  "/ChessUY/Ajedrez/php/guardoTiempo.php",
                type: "POST",
                data: {id_partido:ID_partido,numJugador:numJugador, temp:minsec1},
                success: function (data) {}
              });
        }
      });
}
function traigoTablero(){
    $.ajax({
        url:  "/ChessUY/Ajedrez/php/traigoTablero.php",
        type: "POST",
        data: {id_partido:ID_partido},
        success: function (data) {
           var dat = JSON.parse(data);

        //:movimientos
           var jug2 = JSON.parse(dat[0]['movimientos'])
           for(var p = 1; p <= jug2.length; p++){
               Jugadas[p] = jug2[p];
           }
        
        //:tablero, barra y tiempo
        barra = dat[0]['barra'];
        tiempo_Jugador1 = dat[0]['tiempo1'];
        tiempo_Jugador2 = dat[0]['tiempo2'];

        tmp1 = tiempo_Jugador1.split(":");
        tmp2 = tiempo_Jugador2.split(":");

        tiempo1 = (tmp1[0]*60);
        tiempo2 = (tmp2[0]*60);
       
        totlsec1 = tiempo1;
        totlsec2 = tiempo2;

        if(numJugador == 1){

            if(dat[0]['turno'] == 1){
                if(jugador2 == null){
                    var tab = JSON.parse(dat[0]['tablero']);
                    for(var p = 1; p <= 8; p++){
                        for(var q = 1; q <= 8; q++){
                            Tablero[p][q] = tab[p][q];
                        }
                    }
                }else{
                    inviertoTablero(dat[0]['tablero']);
                }
               
            }else{
                if(dat[0]['turno']%2 == 0){
                    var tab = JSON.parse(dat[0]['tablero']);
                    for(var p = 1; p <= 8; p++){
                        for(var q = 1; q <= 8; q++){
                            Tablero[p][q] = tab[p][q];
                        }
                    }
                    barraProgreso(barra)
                }else{
                    inviertoTablero(dat[0]['tablero']);
                    barra = 100-barra;
                    barraProgreso(barra)
                }
            }
        }else{
            if(dat[0]['turno'] == 1){
                var tab = JSON.parse(dat[0]['tablero']);
                    for(var p = 1; p <= 8; p++){
                        for(var q = 1; q <= 8; q++){
                            Tablero[p][q] = tab[p][q];
                        }
                    }
            }else{
                if(dat[0]['turno']%2 == 0){
                    inviertoTablero(dat[0]['tablero']);
                    barra = 100-barra;
                    barraProgreso(barra)
                }else{
                    var tab = JSON.parse(dat[0]['tablero']);
                        for(var p = 1; p <= 8; p++){
                            for(var q = 1; q <= 8; q++){
                                Tablero[p][q] = tab[p][q];
                            }
                        }
                    barraProgreso(barra)
                }
            }
        }
         
            armoAjedrez();
        }
      });
}
function guardoJaque(){
  var jaq = JSON.stringify(jaque);
    $.ajax({
        url:  "/ChessUY/Ajedrez/php/guardoJaque.php",
        type: "POST",
        data: {numJugador:numJugador, jaq:jaq},
        success: function (data) {}
      });
}
function traigoJaque(){
    $.ajax({
        url:  "/ChessUY/Ajedrez/php/traigoJaque.php",
        type: "POST",
        data: {numJugador:numJugador},
        success: function (data) {}
      });
}
function boxHeight(){
    var boxHeight = document.getElementById("box").clientHeight;

    $("#box").css("max-height", boxHeight);
}

function armoAjedrez(){

/* 
Armo Tablero     
*/
$.ajax({
    url: "/ChessUY/Ajedrez/php/armoAjedrez.php",
    type: "POST",
    data: {Tablero:Tablero, Movimiento:Movimiento, jaque: jaque, Turno: Turno},
    success: function (data) {
        document.getElementById("ArmoAjedrez").innerHTML = data;
        boardsize();
    }
});

/* 
Armo Tabla Movimientos     
*/
$.ajax({
    type: "POST",
    url: "/ChessUY/Ajedrez/php/armoMovimientos.php",
    data: {Jugadas:Jugadas, Turno:Turno},
    success: function (data) {
        document.getElementById("ArmoMovimientos").innerHTML = data;
    }
});

/* 
Armo Tabla Jugador vs Jugador     
*/
$.ajax({
    type: "POST",
    data: {Turno:Turno, jugador2: jugador2},
    url: "/ChessUY/Ajedrez/php/armoJugadores.php",
    success: function (data) {
        document.getElementById("ArmoJugadores").innerHTML = data;
    }
});

/* 
Armo Chat     
*/

$.ajax({
    type: "POST",
    url: "/ChessUY/Ajedrez/php/armoChat.php",
    success: function (data) {
        document.getElementById("ArmoChat").innerHTML = data;
        heightdiv();
    }
});
}

function heightdiv(){
var height = ((window.innerHeight * 0.98) - 100);


$('#select-wrapper').height(height * 0.5);
}

function barraProgreso(porcentaje){
    $('.bar').css("width", porcentaje + "%");
    $('.bar2').css("width", ((100 - porcentaje) + 5) + "%");
     if(porcentaje >= 50){
        $('.bar').css("z-index", "5");
        $('.bar').css("border-radius", "1em");
        $('.bar2').css("width", ((100 - porcentaje) + 5) + "%");
     }else{
        $('.bar').css("width", (porcentaje + 5) + "%");
        $('.bar').css("border-radius", "1em");
        $('.bar2').css("z-index", "5");
        $('.bar2').css("width", (100 - porcentaje) + "%");
     }
} 
 var Color = {
    Blanco:'b',
    Negro:'n',
}
const Piezas = {
   BRey: 'r', 
   BDama: 'd',
   BCaballo: 'c',
   BAlfil: 'a',
   BTorre:'t', 
   BPeon:'p',
   NRey: 'rn', 
   NDama: 'dn',
   NCaballo: 'cn',
   NAlfil: 'an',
   NTorre:'tn', 
   NPeon:'pn',  
}
var porcentaje = 39;
var barra = 50;
var Jugadas = [];
var elo = 0;
var Turno;
var Reloj = 0;
var rep = 0;
var ultTurn = 0;
var comidas = 0;
var coronaciones = 0;
var menos_tiempo = 0;
var victoria = 0;
var derrota = 0;
var tabla = 0;
var simbolo = null;
var spam = 0;
const Tablero = [];
const TableroJaque = [];
var seleccionado = null;
var  Movimiento = [];
var jaque = {
   jaque: null,
   pieza: null,
   color: null,
   x: null,
   y: null,
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function boardsize(){
    var width = window.innerWidth;
    var height = window.innerHeight;
   
    if(width > 900){
        var board_width = (90 * width) / 100;
        var board_wrapper = (60 * board_width) / 100;
        var board_margin2 = (5 * board_wrapper) / 100;
        var boardtotal_width = board_wrapper - (board_margin2 * 2);
        var board_height = ((98 * height) / 100) - 100;
        var board_margin = (5 * board_height) / 100;
        var boardtotal = board_height - (board_margin * 2);
        var cell_width = boardtotal / 8;

        if(boardtotal >= boardtotal_width){
            cell_width = boardtotal_width / 8;
            board_text_margin = -cell_width + ((30 * cell_width) / 100);

            $(".cell").css ('width', cell_width);
            $(".cell").css ('height', cell_width);
            $(".board-text").css ('margin-top', board_text_margin);
            $(".board-text").css ('margin-right', board_text_margin);
            $(".board-number").css ('margin-top', board_text_margin);
            $(".board-number").css ('margin-right', board_text_margin);
            $(".ajedrez-wrapper").css ('height', boardtotal_width);
            $(".ajedrez-wrapper").css ('width', boardtotal_width);

        }else{
            board_text_margin = -cell_width + ((30 * cell_width) / 100);
            $(".cell").css ('width', cell_width);
            $(".cell").css ('height', cell_width);
            $(".board-text").css ('margin-top', board_text_margin);
            $(".board-text").css ('margin-right', board_text_margin);
            $(".board-number").css ('margin-bottom', board_text_margin);
            $(".board-number").css ('margin-left', board_text_margin);
            $(".ajedrez-wrapper").css ('height', boardtotal);
            $(".ajedrez-wrapper").css ('width', boardtotal);
        }
    }else{
        var board_width = (98 * width) / 100;
        var board_height = ((98 * height) / 100) - 100;

        if(board_width > board_height){
            var board_margin = (2 * board_height) / 100;
            var boardtotal = board_height - (board_margin * 2);
            var cell_height = boardtotal / 8;

            $(".cell").css ('width', cell_height);
            $(".cell").css ('height', cell_height);
        }else{
            var board_margin = (2 * board_width) / 100;
            var boardtotal = board_width - (board_margin * 2);
            var cell_height = boardtotal / 8;

            $(".cell").css ('width', cell_height);
            $(".cell").css ('height', cell_height);
        }
        board_text_margin = -cell_height + ((40 * cell_height) / 100);

        $(".board-text").css ('margin-top', board_text_margin);
        $(".board-text").css ('margin-right', board_text_margin);
        $(".board-number").css ('margin-bottom', board_text_margin);
        $(".board-number").css ('margin-left', board_text_margin);
        $(".ajedrez-wrapper").css ('height', boardtotal);
        $(".ajedrez-wrapper").css ('width', boardtotal);
    }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function ColocoPieza(Pieza,Color,x,y){
    Tablero[x][y] = {
        Piezas: Pieza,
        color: Color,
        Ejex: x,
        Ejey: y,
    }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function PosicionPiezas(){
    if(colJugador == 0){
        //Peones
        for(let x = 1; x <= 8; x += 1){
            ColocoPieza(Piezas.BPeon,Color.Blanco,x,2);
            ColocoPieza(Piezas.NPeon,Color.Negro,x,7);
        }
    }else{
        for(let x = 1; x <= 8; x += 1){
            ColocoPieza(Piezas.BPeon,Color.Blanco,x,7);
            ColocoPieza(Piezas.NPeon,Color.Negro,x,2);
        }
    }
    //:Torres
    ColocoPieza(Piezas.BTorre,Color.Blanco,1,blan);
    ColocoPieza(Piezas.NTorre,Color.Negro,1,neg);
    ColocoPieza(Piezas.BTorre,Color.Blanco,8,blan);
    ColocoPieza(Piezas.NTorre,Color.Negro,8,neg);
    //:Caballo
    ColocoPieza(Piezas.BCaballo,Color.Blanco,2,blan);
    ColocoPieza(Piezas.NCaballo,Color.Negro,2,neg);
    ColocoPieza(Piezas.BCaballo,Color.Blanco,7,blan);
    ColocoPieza(Piezas.NCaballo,Color.Negro,7,neg);
    //:Alfil
    ColocoPieza(Piezas.BAlfil,Color.Blanco,3,blan);
    ColocoPieza(Piezas.NAlfil,Color.Negro,3,neg);
    ColocoPieza(Piezas.BAlfil,Color.Blanco,6,blan);
    ColocoPieza(Piezas.NAlfil,Color.Negro,6,neg);
    //:Dama
    ColocoPieza(Piezas.BDama,Color.Blanco,4,blan);
    ColocoPieza(Piezas.NDama,Color.Negro,4,neg);
    //:Rey
    ColocoPieza(Piezas.BRey,Color.Blanco,5,blan);
    ColocoPieza(Piezas.NRey,Color.Negro,5,neg);
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function resetMovimientos(){
    for(let x = 1; x <= 8; x += 1){
        Movimiento[x] = [];
        for(let y = 1; y <= 8; y += 1){
            Movimiento[x][y] = null;
        }
    }
}

function resetTableroJaque(){
    for(let x = 1; x <= 8; x += 1){
        TableroJaque[x] = [];
        for(let y = 1; y <= 8; y += 1){
            TableroJaque[x][y] = null;
        }
    }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function CreoTablero(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x] = [];
        TableroJaque[x] = [];
        for(let y = 1; y <= 8; y += 1){
            Tablero[x][y] = {
                Piezas: null,
                color: null,
                Ejex: x,
                Ejey: y,
            }
            TableroJaque[x][y] = null;
        }
    }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function seleccionar(x,y){
    if(derrota == 0 && tabla == 0 && victoria == 0){
    var sel;
    // seleccionas las piezas y sus movimientos
    if(seleccionado == null){
        if(Tablero[x][y].Piezas != null){
            if((Turno%2 == 0 && Tablero[x][y].color == "b" && colJugador == 1)||(Turno%2 != 0 && Tablero[x][y].color == "n" && colJugador == 0)){
                seleccionado = {
                    Ejex: x,
                    Ejey: y,
                    Contenido: Tablero[x][y].Piezas,
                    color: Tablero[x][y].color,
                }
                Movimientos();
                armoAjedrez();
            }
        }

    }else{
        //moves la pieza
        if(Movimiento[x][y] == true && Tablero[x][y].color != seleccionado.color){
            sel= seleccionado.Contenido;
            if(Tablero[x][y].Piezas != null){
                simbolo = "x";
                Porcentaje(Tablero[x][y].Piezas,0);
                comidas++;
            }
           if(seleccionado.Contenido == "p"||seleccionado.Contenido == "pn"){
               if(y == 1||y == 8){
                    Coronacion(x,y,sel);
                    if(simbolo != null){
                        simbolo = simbolo + "=";
                    }else{
                        simbolo =  "=";
                    }
               }else{
                    if(y == 6 && Tablero[x][y].Piezas == null) {
                        if(Tablero[x][5].Piezas != null && seleccionado.color != Tablero[x][5].color && seleccionado.Ejey == 5){
                                Porcentaje(Tablero[x][5].Piezas,0);
                                ColocoPieza(null,null,x,5);
                                simbolo = "x";
                                comidas++;
                        }
                    }else{
                        if(y == 3 && Tablero[x][y].Piezas == null){
                            if(Tablero[x][4].Piezas != null && seleccionado.color != Tablero[x][4].color && seleccionado.Ejey == 4){
                                    Porcentaje(Tablero[x][4].Piezas,0);
                                    ColocoPieza(null,null,x,4);
                                    simbolo = "x";
                                    comidas++;
                            }
                        }
                    }
                }
               }else{
                if(seleccionado.Contenido == "r"||seleccionado.Contenido == "rn"){
                   if(seleccionado.Contenido == Piezas.BRey){
                        if(x == 7 && Tablero[8][y].Piezas == Piezas.BTorre){
                            //0-0
                            ColocoPieza(Piezas.BTorre,seleccionado.color,6,y);
                            ColocoPieza(null,null,8,y);
                            simbolo = "0-0";
                        }
                        if(x == 3 && Tablero[1][y].Piezas == Piezas.BTorre){
                            //0-0-0
                            ColocoPieza(Piezas.BTorre,seleccionado.color,4,y);
                            ColocoPieza(null,null,1,y);
                            simbolo = "0-0-0";
                        }
                    }else{
                        if(x == 7 && Tablero[8][y].Piezas == Piezas.NTorre){
                            //0-0
                            ColocoPieza(Piezas.NTorre,seleccionado.color,6,y);
                            ColocoPieza(null,null,8,y);
                            simbolo = "0-0";
                        }
                        if(x == 3 && Tablero[1][y].Piezas == Piezas.NTorre){
                            //0-0-0
                            ColocoPieza(Piezas.NTorre,seleccionado.color,4,y);
                            ColocoPieza(null,null,1,y);
                            simbolo = "0-0-0";
                        }
                    }
                }
            }
            ColocoPieza(seleccionado.Contenido,seleccionado.color,x,y);
            if(jaque.jaque == true){

                for(var o = 1; o <= 8; o++){
                    for(var u = 1; u <= 8; u++){
                        if(Movimiento[o][u] == true){ 
                            if(o == x && u == y){
                                jaque = {
                                    jaque: null,
                                    pieza: null,
                                    color: null,
                                    x: null,
                                    y: null,
                                }
                                resetTableroJaque();
                                guardoJaque();
                            } 
                        }
                    }
                }
            }
            ColocoPieza(null,null,seleccionado.Ejex,seleccionado.Ejey);
            var a = 0;
            armoAjedrez();
            sel= seleccionado.Contenido;
            selc= seleccionado.color;
            Jaque(x,y, sel);
            tablas();
        }else{
            //seleccionas una pieza y sus movimientos
            if(Tablero[x][y] != null){
                if((Turno%2 != 0 && Tablero[x][y].color == "n" && colJugador == 1)||(Turno%2 == 0 && Tablero[x][y].color == "b" && colJugador == 0)){
                    seleccionado = {
                        Ejex: x,
                        Ejey: y,
                        Contenido: Tablero[x][y].Piezas,
                        color: Tablero[x][y].color,
                    }
                    Movimientos();
                    armoAjedrez();
                }
            }
        }
        //SonidoPiezas(x,y);
        //SilenciarPieza(x,y);
        seleccionado = null;
        resetMovimientos(); 
   

        if(a == 0){
            Jugadas[Turno] = {
                Piezas: sel,
                color: selc,
                Ejex: x,
                Ejey: y,
                simbolo: simbolo,
            }
            //Triple-Repeticion
            Triple_Repeticion();
            simbolo = null;
            Turno++;
            ultTurn = true;
            a = 1;
            guardoTablero();
            sendMessage(1);
        }
        
        armoAjedrez();
    }
}
}
var totlsec1 = 900;
var totlsec2 = 900;
var finalizado = false;
var minsec1;
var minsec2;
var tiempo_Jugador1;
var tiempo_Jugador2;
window.setInterval(function tiempo() {
    if(!finalizado){
        if(Turno%2 == 0) {
            if(ultTurn) {
                totlsec2 = totlsec2 + 5;
                ultTurn = false;
            } else {
                totlsec1--;
                if(totlsec1 < 1){
                    Derrota();
                }
            }
        } else {
            if(ultTurn) {
                totlsec1 = totlsec1 + 5;
                ultTurn = false;
            } else {
                totlsec2--;
                menos_tiempo++;
                if(totlsec2 < 1){
                    Reloj = 1;
                    Derrota();
                }
            }
        }
        var sec1 = new Date(0);
        sec1.setSeconds(totlsec1);
        minsec1 = sec1.toISOString().substr(14, 5);
        var sec2 = new Date(0);
        sec2.setSeconds(totlsec2);
        minsec2 = sec2.toISOString().substr(14, 5);

        $("#tempJug1").html("<i class='fas fa-stopwatch'></i>" + minsec1);
        $("#tempJug2").html("<i class='fas fa-stopwatch'></i>" + minsec2);
        
    } else {

    }
}, 1000);
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Movimientos(a,b,sel){
    if(a == undefined && b == undefined){
        let x = seleccionado.Ejex
        let y = seleccionado.Ejey;
    switch(seleccionado.Contenido){
        case Piezas.NTorre:
        case Piezas.BTorre:
                Torre(x,y);
        break;
        case Piezas.NCaballo:
        case Piezas.BCaballo:
                Caballo(x,y);
        break;
        case Piezas.NAlfil:
        case Piezas.BAlfil:
                Alfil(x,y);
        break;
        case Piezas.NPeon:
        case Piezas.BPeon:
                Peon(x,y);
        break;
        case Piezas.NDama:
        case Piezas.BDama:
                Dama(x,y);
        break;
        case Piezas.NRey:
        case Piezas.BRey:
               Rey(x,y);
        break;
    }
}else{
    switch(sel){
        case Piezas.NTorre:
        case Piezas.BTorre:
                Torre(a,b,sel);
        break;
        case Piezas.NCaballo:
        case Piezas.BCaballo:
                Caballo(a,b,sel);
        break;
        case Piezas.NAlfil:
        case Piezas.BAlfil:
                Alfil(a,b,sel);
        break;
        case Piezas.NPeon:
        case Piezas.BPeon:
                Peon(a,b,sel);
        break;
        case Piezas.NDama:
        case Piezas.BDama:
                Dama(a,b,sel);
        break;
        case Piezas.NRey:
        case Piezas.BRey:
               Rey(a,b,sel);
        break;
                                            
    }
}
    if(jaque.jaque == true && seleccionado != null){
        for( p = 1; p <= 8; p++){
            for( q = 1; q <= 8; q++){
                if(Movimiento[p][q] == true){ 
                    if(seleccionado.Contenido != 'r' && seleccionado.Contenido != 'rn'){
                        //veo que piezas pueden comer el jaque
                        if(p != jaque.x || q != jaque.y){
                            Movimiento[p][q] = null;
                            }
                        for(var o = 1; o <= 8; o++){
                            for(var u = 1; u <= 8; u++){
                                if(TableroJaque[o][u] == true){ 
                                    if(o == p && u == q){
                                        Movimiento[p][q] = true;
                                    } 
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    if(jaque.jaque != true && seleccionado != null && (seleccionado.Contenido != Piezas.NRey || seleccionado.Contenido != Piezas.BRey)){
        let x = seleccionado.Ejex
        let y = seleccionado.Ejey;
        let sel = seleccionado.Contenido;
        Mov_Prohibido(x,y,sel);
    }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Peon(x,y, sel){
    var xx = x + 1;
    var yy;
    let xa = x - 1;
    let xb = x + 1;
    if(sel == undefined){
        selecc = seleccionado.Contenido;
    }else{
        selecc = sel;
    }
    if((selecc == Piezas.NPeon && colJugador == 1) || (selecc == Piezas.BPeon && colJugador == 0)){
        yy = y + 1;
        //movimiento: 2-adelante
        if(y == 2 && Tablero[x][4].Piezas == null && Tablero[x][yy].Piezas == null){
            comer(x,4,selecc);
        }
        if(yy<=8){
         //movimiento: 1-adelante
         if(Tablero[x][yy].Piezas == null){
            comer(x,yy,selecc);
         }
        if(xx<=8){
            if(y == 5 &&  (Tablero[xb][y].Piezas == "p" ||  Tablero[xb][y].Piezas == "pn") && Tablero[xb][6].Piezas == null) {
                if((seleccionado.color == "b" && Tablero[xb][y].Piezas != "p")||(seleccionado.color == "n" && Tablero[xb][y].Piezas != "pn")){
                    //Peon al paso derecha
                    comer(xb,6,selecc);
                } 
            }
            //movimiento: comer-d
            if(Tablero[xx][yy].Piezas != null){
                comer(xx,yy,selecc);
            }
        }
        xx = x -1;
        if(xx>=1){
            if(y == 5 &&  (Tablero[xa][y].Piezas == "p" ||  Tablero[xa][y].Piezas == "pn") && Tablero[xa][6].Piezas == null) {
                if((seleccionado.color == "b" && Tablero[xa][y].Piezas != "p")||(seleccionado.color == "n" && Tablero[xa][y].Piezas != "pn")){
                    //Peon al paso izquierda
                    comer(xa,6,selecc);
                }
            }
            //movimiento: comer-i
           if(Tablero[xx][yy].Piezas != null){
            comer(xx,yy,selecc);
           }
         }}
        
    }else{
            yy = y-1;
            //movimiento: 2-adelante
            if(y == 7 && Tablero[x][5].Piezas == null && Tablero[x][yy].Piezas == null){
                comer(x,5,selecc);
            }
            if(yy>=1){
             //movimiento: 1-adelante
             if(Tablero[x][yy].Piezas == null){
                comer(x,yy,selecc);
             }
             if(xx<=8){
                 if(y == 4 && (Tablero[xb][y].Piezas == "p" ||  Tablero[xb][y].Piezas == "pn") && Tablero[xb][3].Piezas == null) {
                    if((seleccionado.color == "b" && Tablero[xb][y].Piezas != "p")||(seleccionado.color == "n" && Tablero[xb][y].Piezas != "pn")){
                        //Peon al paso derecha
                        comer(xb,3,selecc);
                    }
            }
                //movimiento: comer-d
                if(Tablero[xx][yy].Piezas != null){
                    comer(xx,yy,selecc);
                }
             }
             xx = x -1;
             if(xx>=1){
                if(y == 4 && (Tablero[xa][y].Piezas == "p" ||  Tablero[xa][y].Piezas == "pn") && Tablero[xa][3].Piezas == null) {
                    if((seleccionado.color == "b" && Tablero[xa][y].Piezas != "p")||(seleccionado.color == "n" && Tablero[xa][y].Piezas != "pn")){
                        //Peon al paso izquierda
                        comer(xa,3,selecc);
                    }
                }
                //movimiento: comer-i
               if(Tablero[xx][yy].Piezas != null){
                comer(xx,yy,selecc);
               }
             }
    }
}
  
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Torre(x,y,sel){
    let i;
    if(sel == undefined){
        selecc = seleccionado.Contenido;
    }else{
        selecc = sel;
    }
   //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y,selecc);
                break;
            }else{
                comer(ix,y,selecc);
            }
        }
    }
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y,selecc);
                break;
            }else{
                comer(ix,y,selecc);
            }
        }
    }   
    //arriba
    for(i = 1; i <= 8; i++){
        if(y-i>=1){
            iy = y - i;
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy,selecc);
                break;
            }else{
                comer(x,iy,selecc);
            }
        } }
   //abajo↓
    for(i = 1;i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy,selecc);
                break;
            }else{
                comer(x,iy,selecc);
            }
        }
    }

}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Caballo(x,y,sel){
    let xx = x-2;
    let yy = y-1;
    if(sel == undefined){
        selecc = seleccionado.Contenido;
    }else{
        selecc = sel;
    }
    //La primera flecha significa 2 para ese lado y la segunda solo 1
    //←↑
    if (x-2>=1 && y-1>=1) {comer(xx,yy,selecc);}
    yy = y+1;
    //←↓
    if (x-2>=1 && y+1<=8) {comer(xx,yy,selecc);}
    yy = y+2;
    xx = x-1;
    //↓←
    if (x-1>=1 && y+2<=8) {comer(xx,yy,selecc);}
    xx = x+1;
    //↓→
    if (x+1<=8 && y+2<=8) {comer(xx,yy,selecc);}
    xx = x+2;
    yy = y+1;
    //→↓
    if (x+2<=8 && y+1<=8) {comer(xx,yy,selecc);}
    yy = y-1;
    //→↑
    if (x+2<=8 && y-1>=1) {comer(xx,yy,selecc);}
    yy = y-2;
    xx = x+1;
    //↑→
    if (x+1<=8 && y-2>=1) {comer(xx,yy,selecc);}
    xx = x-1;
    //↑←
    if (x-1>=1 && y-2>=1) {comer(xx,yy,selecc);}
    
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Alfil(x,y,sel){
    let ix;
    let iy;
    let i;
    if(sel == undefined){
        selecc = seleccionado.Contenido;
    }else{
        selecc = sel;
    }
    //ArribaIzquierda↑←
    for(i = 1; i <= 8; i++){
        if(y-i>=1 && x-i >= 1){
            ix = x - i;
            iy = y - i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy,selecc);
                break;
            }else{
                comer(ix,iy,selecc);
            }
        }
    }    
    //AbajoIzquierda↓←
    for(i = 1;i <= 8; i++){
        if(y+i<=8 && x-i >= 1){
            ix = x - i;
            iy = y + i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy,selecc);
               break;
            }else{
                comer(ix,iy,selecc);
            }
        }
    }    
    //ArribaDerecha↑→
    for(i = 1;i <= 8; i++){
        if(y-i>=1 && x+i <= 8){
            ix = x + i;
            iy = y - i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy,selecc);
                break;
            }else{
                comer(ix,iy,selecc);
            }
        }
    }   
    //AbajoDerecha→↓
    for(i = 1;i <= 8; i++){
        if(y+i<=8 && x+i <= 8){
            ix = x + i;
            iy = y + i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy,selecc);
                break;
            }else{
                comer(ix,iy,selecc);
            }
        }
    }    

}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Dama(x,y,sel){
   let i;
   let ix;
   let iy;
   if(sel == undefined){
    selecc = seleccionado.Contenido;
}else{
    selecc = sel;
}
    //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y,selecc);
                break;
            }else{
                comer(ix,y,selecc);
            }
        }
    }
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y,selecc);
                break;
            }else{
                comer(ix,y,selecc);
            }
        }
    }   
    //arriba
    for(i = 1; i <= 8; i++){
        if(y-i>=1){
            iy = y - i;
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy,selecc);
                break;
            }else{
                comer(x,iy,selecc);
            }
        } }
   //abajo↓
    for(i = 1; i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy,selecc);
                break;
            }else{
                comer(x,iy,selecc);
            }
        }
    }
//ArribaIzquierda↑←
for(i = 1; i <= 8; i++){
    if(y-i>=1 && x-i >= 1){
        ix = x - i;
        iy = y - i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy,selecc);
            break;
        }else{
            comer(ix,iy,selecc);
        }
    }
}    
//AbajoIzquierda↓←
for(i = 1;i <= 8; i++){
    if(y+i<=8 && x-i >= 1){
        ix = x - i;
        iy = y + i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy,selecc);
           break;
        }else{
            comer(ix,iy,selecc);
        }
    }
}    
//ArribaDerecha↑→
for(i = 1;i <= 8; i++){
    if(y-i>=1 && x+i <= 8){
        ix = x + i;
        iy = y - i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy,selecc);
            break;
        }else{
            comer(ix,iy,selecc);
        }
    }
}   
//AbajoDerecha→↓
for(i = 1;i <= 8; i++){
    if(y+i<=8 && x+i <= 8){
        ix = x + i;
        iy = y + i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy,selecc);
            break;
        }else{
            comer(ix,iy,selecc);
        }
    }
}    

}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Rey(x,y,sel){
    if(sel == undefined){
        selecc = seleccionado.Contenido;
    }else{
        selecc = sel;
    }
    if(x == 5 && (y == 1 || y == 8)  && jaque.jaque == null){
        if((Tablero[1][y].Piezas == Piezas.NTorre || Tablero[1][y].Piezas == Piezas.BTorre)&& Tablero[6][y].Piezas == null && Tablero[7][y].Piezas == null){
            //0-0
            comer(7,y,selecc);
        }
        if((Tablero[1][y].Piezas == Piezas.NTorre || Tablero[1][y].Piezas == Piezas.BTorre)&& Tablero[4][y].Piezas == null && Tablero[2][y].Piezas == null && Tablero[3][y].Piezas == null){
            //0-0-0
            comer(3,y,selecc);
        }
    }
    let xx = x-1;
    let yy = y-1;
    //ArribaIzquierda↑←
    if(x-1 >= 1 && y-1 >= 1){comer(xx,yy,selecc);}
    //ArribaDerecha↑→
    xx=x+1;
    if(x+1 <= 8 && y-1 >= 1){comer(xx,yy,selecc);}
    //AbajoIzquierda↓←
    xx=x-1;
    yy=y+1;
    if(x-1 >= 1 && y+1 <= 8){comer(xx,yy,selecc);}
    //AbajoDerecha→↓
    xx=x+1;
    if(x+1 <= 8 && y+1 <= 8){comer(xx,yy,selecc);}
    //Abajo↓
    yy=y-1;
    if(y-1 >= 1){comer(x,yy,selecc);}
    //Izquierda←
    xx=x-1;
    if(x-1 >= 1){comer(xx,y,selecc);}
    //aribba↑
    yy=y+1;
    if(y+1 <= 8){comer(x,yy,selecc);}
    //Derecha→
    xx=x+1;
    if(x+1 <= 8){comer(xx,y,selecc);}

    JR(selecc);
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function comer(x,y,sel){
    
    if(sel=="tn" || sel=="cn" || sel=="an" || sel=="dn" || sel=="rn" || sel=="pn"){
        var col = "n";
    }else{
        var col = "b";
    }

    if(Tablero[x][y].color != col){
        Movimiento[x][y] = true;
    }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Coronacion(x,y,sel){
    if(sel=="tn" || sel=="cn" || sel=="an" || sel=="dn" || sel=="rn" || sel=="pn"){
        var col = "n";
    }else{
        var col = "b";
    }
    $.ajax({
        url: "/ChessUY/Modal/modalCoronacion.php",
        type: "POST",
        data: {color: col , x:x, y:y},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
      });
}

function cambioCoronacion(x, y, pieza, col){
    coronaciones++;
    $(".modal").hide();
    Porcentaje(pieza,1);
    ColocoPieza(pieza,col,x,y);
    armoAjedrez();
    Jaque(x,y,pieza);
    sendMessage(1);
}
window.onresize = boardsize;
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function JR(sel){
    for(var p = 1; p <= 8; p++){
        for(var q = 1; q <= 8; q++){
            if(Movimiento[p][q] == true){
                JaqueRey(p,q,sel);
            }  
        }}
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function JaqueRey(x,y, sel){
    let i, ix, iy;
    let xx = x-2;
    let yy = y-1;
    console.log("Movimiento" ,x,y, sel);

    if(sel=="tn" || sel=="cn" || sel=="an" || sel=="dn" || sel=="rn" || sel=="pn"){
        var col = "n";
    }else{
        var col = "b";
    }

    if(col == "n"){
        var colorC = "c";
        var colorT = "t";
        var colorD = "d";
        var colorA = "a";
        var colorP = "p";
        var colorR = "r";
    }else{
        var colorC = "cn";
        var colorT = "tn";
        var colorD = "dn";
        var colorA = "an";
        var colorP = "pn";
        var colorR = "rn";
    }
    
    //:Caballo
    //←↑
    if (x-2>=1 && y-1>=1) {
        if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
        if(Movimiento[x][y] != null){
            yy = y+1;
            //←↓
            if (x-2>=1 && y+1<=8) {
                if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                if(Movimiento[x][y] != null){
                    yy = y+2;
                    xx = x-1;
                    //↓←
                    if (x-1>=1 && y+2<=8) {
                        if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                        if(Movimiento[x][y] != null){
                            xx = x+1;
                            //↓→
                            if (x+1<=8 && y+2<=8) {
                                if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                                if(Movimiento[x][y] != null){
                                    xx = x+2;
                                    yy = y+1;
                                    //→↓
                                    if (x+2<=8 && y+1<=8) {
                                        if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                                        if(Movimiento[x][y] != null){
                                            yy = y-1;
                                            //→↑
                                            if (x+2<=8 && y-1>=1) {
                                                if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                                                if(Movimiento[x][y] != null){
                                                    yy = y-2;
                                                    xx = x+1;
                                                    //↑→
                                                    if (x+1<=8 && y-2>=1) {
                                                        if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                                                        if(Movimiento[x][y] != null){
                                                            xx = x-1;
                                                            //↑←
                                                            if (x-1>=1 && y-2>=1) {
                                                                if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}
                                                            }
                                                        }
                                                    } 
                                                }
                                            } 
                                        }
                                    }
                                }
                            } 
                        }    
                    } 
                }
            }
        }
    } 
    
    //?----------------------------------------------------------------------------------
    //:Torre y Reina
    //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                if(Tablero[ix][y].Piezas == colorD ||Tablero[ix][y].Piezas == colorT){
                    Movimiento[x][y] = null
                    if(x >= 3 ){
                        Movimiento[x-2][y] = null
                    }
                }
                break;
            }
        }
    }
    
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                if(Tablero[ix][y].Piezas == colorD ||Tablero[ix][y].Piezas == colorT){
                    Movimiento[x][y] = null;
                    if(x <= 6 ){
                        Movimiento[x+2][y] = null
                    }
                }
                break;
            }
        }
    }   
    //arriba
    for(i = 1; i <= 8; i++){
        if(y-i>=1){
            iy = y - i;
            if(Tablero[x][iy].Piezas != null){
                if(Tablero[x][iy].Piezas == colorD ||Tablero[x][iy].Piezas == colorT){
                    Movimiento[x][y] = null
                    if(y <= 6 ){
                        Movimiento[x][y+2] = null
                    }
                }
                break;
            }
        } 
    }
        
   //abajo↓
    for(i = 1;i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                if(Tablero[x][iy].Piezas == colorD ||Tablero[x][iy].Piezas == colorT){
                    Movimiento[x][y] = null 
                    if(y >= 3 ){
                        Movimiento[x][y-2] = null
                    }
                }
                break;
            }
        }
    }
    //?----------------------------------------------------------------------------------
    //:Alfil y Reina

    //ArribaIzquierda↑←
for(i = 1; i <= 8; i++){
    if(y-i>=1 && x-i >= 1){
        ix = x - i;
        iy = y - i;
        if(Tablero[ix][iy].Piezas != null){
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
                if(x <= 6 && y <= 6){
                    Movimiento[x+2][y+2] = null
                }
            }
            break;
        }
    }
}    

//AbajoIzquierda↓←
for(i = 1;i <= 8; i++){
    if(y+i<=8 && x-i >= 1){
        ix = x - i;
        iy = y + i;
        if(Tablero[ix][iy].Piezas != null){
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
                if(x <= 6 && y >= 3){
                    Movimiento[x+2][y-2] = null
                }
            }
            break;
        }
    }
}    

//ArribaDerecha↑→
for(i = 1;i <= 8; i++){
    if(y-i>=1 && x+i <= 8){
        ix = x + i;
        iy = y - i;
        if(Tablero[ix][iy].Piezas != null){
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
                if(x >= 3 && y <= 6){
                    Movimiento[x-2][y+2] = null
                }
            }
            break;
        }
    }
}  
 
//AbajoDerecha→↓
for(i = 1;i <= 8; i++){
    if(y+i<=8 && x+i <= 8){
        ix = x + i;
        iy = y + i;
        if(Tablero[ix][iy].Piezas != null){
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
                if(x >= 3 && y >= 3){
                    Movimiento[x-2][y-2] = null
                }
            }
            break;
        }
    }
}   

  //?----------------------------------------------------------------------------------
    //:Peon y Reina
    xx = x-1;
    yy = y-1;
    console.log("col", col);
    if(col == "n"){
        //ArribaIzquierda↑←
        if(x-1 >= 1 && y-1 >= 1){if(Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
        //ArribaDerecha↑→
        xx=x+1;
        if(x+1 <= 8 && y-1 >= 1){if(Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
        //AbajoIzquierda↓←
        xx=x-1;
        yy=y+1;
        if(x-1 >= 1 && y+1 <= 8){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
        //AbajoDerecha→↓
        xx=x+1;
        if(x+1 <= 8 && y+1 <= 8){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
   }else{
       //ArribaIzquierda↑←
       if(x-1 >= 1 && y-1 >= 1){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
       //ArribaDerecha↑→
       xx=x+1;
       if(x+1 <= 8 && y-1 >= 1){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
       //AbajoIzquierda↓←
       xx=x-1;
       yy=y+1;
       if(x-1 >= 1 && y+1 <= 8){if(Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
       //AbajoDerecha→↓
       xx=x+1;
       if(x+1 <= 8 && y+1 <= 8){if(Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
   }
    
    //Abajo↓
    yy=y-1;
    if(y-1 >= 1){if( Tablero[x][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //Izquierda←
    xx=x-1;
    if(x-1 >= 1){if( Tablero[xx][y].Piezas == colorR){Movimiento[x][y] = null}}
    //aribba↑
    yy=y+1;
    if(y+1 <= 8){if( Tablero[x][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //Derecha→
    xx=x+1;
    if(x+1 <= 8){if( Tablero[xx][y].Piezas == colorR){Movimiento[x][y] = null}}

}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Jaque(x,y, sel){
    //: llamo a movimiento para generar movimiento en nueva posicion
    Movimientos(x,y, sel);
    if(sel=="tn" || sel=="cn" || sel=="an" || sel=="dn" || sel=="rn" || sel=="pn"){
        var colorR = "r";
        var color = "n"
    }else{
        var colorR = "rn";
        var color = "b"
    }
    for(var p = 1; p <= 8; p++){
        for(var q = 1; q <= 8; q++){
            if(Movimiento[p][q] == true){
                if(Tablero[p][q].Piezas == colorR){
                    if(simbolo != null){
                        simbolo = simbolo + "+";
                    }else{
                        simbolo = "+";
                    }
                    var reyX = p;
                    var reyY = q;
                    jaque = {
                        jaque: true,
                        pieza:sel,
                        color: color,
                        x: x,
                        y: y,
                    }
                    break;
                }
            }
        }  
       }

       if(jaque.jaque == true){
            switch(sel){
                case Piezas.NCaballo:
                case Piezas.BCaballo:
                    TableroJaque[x][y] = true;
                break;
                case Piezas.NPeon:
                case Piezas.BPeon:
                        TableroJaque[x][y] = true;
                break;
                case Piezas.NTorre:
                case Piezas.BTorre:
                    if(jaque.y == reyY){
                        var l=jaque.x
                        if(jaque.x > reyX){
                            for(l; l > reyX; l--){
                                TableroJaque[l][jaque.y] = true;
                            }
                        }else{
                            for(l; l < reyX; l++){
                                TableroJaque[l][jaque.y] = true;
                            }
                        }
                    }else{
                        var l=jaque.y
                        if(jaque.y > reyY){
                            for(l; l > reyY; l++){
                                TableroJaque[jaque.x][l] = true;
                            }
                        }else{
                            for(l; l < reyY; l++){
                                TableroJaque[jaque.x][l] = true;
                            }
                        }
                    }
                    
            break;
                case Piezas.NAlfil:
                case Piezas.BAlfil:
                        if(jaque.y > reyY){
                            if(jaque.x > reyX){
                                var l=jaque.x;
                                var g=jaque.y;
                                for(g; g > reyY; --g){
                                    TableroJaque[l][g] = true;
                                    l = l-1;
                                }
                            }else{
                                var l=jaque.x;
                                var g=jaque.y;
                                for(g; g > reyY; --g){
                                    TableroJaque[l][g] = true;
                                    l++;
                                }
                            }
                        }else{
                            if(jaque.x > reyX){
                                var l=jaque.x;
                                var g=jaque.y;
                                for(g; g < reyY; g++){
                                    TableroJaque[l][g] = true;
                                    l = l-1;
                                }
                            }else{
                                var l=jaque.x;
                                var g=jaque.y;
                                for(g; g < reyY; g++){
                                    TableroJaque[l][g] = true;
                                    l++;
                                }
                            }
                        }
                break;
                case Piezas.NDama:
                case Piezas.BDama:
                        if(jaque.y == reyY || jaque.x == reyX){
                            if(jaque.y == reyY){
                                var l=jaque.x
                                if(jaque.x > reyX){
                                    for(l; l > reyX; l--){
                                        TableroJaque[l][jaque.y] = true;
                                    }
                                }else{
                                    for(l; l < reyX; l++){
                                        TableroJaque[l][jaque.y] = true;
                                    }
                                }
                            }else{
                                var l=jaque.y
                                if(jaque.y > reyY){
                                    for(l; l > reyY; l++){
                                        TableroJaque[jaque.x][l] = true;
                                    }
                                }else{
                                    for(l; l < reyY; l++){
                                        TableroJaque[jaque.x][l] = true;
                                    }
                                }
                            }
                        }else{
                            if(jaque.y > reyY){
                                if(jaque.x > reyX){
                                    var l=jaque.x;
                                    var g=jaque.y;
                                    for(g; g > reyY; --g){
                                        TableroJaque[l][g] = true;
                                        l = l-1;
                                    }
                                }else{
                                    var l=jaque.x;
                                    var g=jaque.y;
                                    for(g; g > reyY; --g){
                                        TableroJaque[l][g] = true;
                                        l++;
                                    }
                                }
                            }else{
                                if(jaque.x > reyX){
                                    var l=jaque.x;
                                    var g=jaque.y;
                                    for(g; g < reyY; g++){
                                        TableroJaque[l][g] = true;
                                        l = l-1;
                                    }
                                }else{
                                    var l=jaque.x;
                                    var g=jaque.y;
                                    for(g; g < reyY; g++){
                                        TableroJaque[l][g] = true;
                                        l++;
                                    }
                                }
                            }
                        }
                break;                             
            }
    }
       resetMovimientos();
      if(jaque.jaque == true){JaqueMate();} 
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Mov_Prohibido(x,y,sel){
    let i, ix, iy, u, ux, uy;
    if(sel=="tn" || sel=="cn" || sel=="an" || sel=="dn" || sel=="rn" || sel=="pn"){
        var col = "n";
    }else{
        var col = "b";
    }
    if(col == "n"){
        var colorR = "rn";

        var colorTop = "t";
        var colorDop = "d";
        var colorAop = "a";
    }else{
        var colorR = "r";

        var colorTop = "tn";
        var colorDop = "dn";
        var colorAop = "an"; 
    }
    //----------------------------------------------------------------------------------
    //:Torre y Reina

    //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                if(Tablero[ix][y].Piezas == colorR){
                    //izquierda
                    for(u = 1; u <= 8; u++){
                        if( x-u >= 1){
                            ux = x - u;
                            if(Tablero[ux][y].Piezas != null){
                                if(Tablero[ux][y].Piezas == colorDop || Tablero[ux][y].Piezas == colorTop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if(q != Tablero[ux][y].Ejey){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    }
                                }
                                break;
                            }
                        }
                    }
                }
                break;
            }
        }
    }
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                if(Tablero[ix][y].Piezas == colorR){
                    //derecha→
                    for(u = 1;u <= 8; u++){
                        ux  = u +x;
                        if(ux <= 8){
                            if(Tablero[ux][y].Piezas != null){
                                if(Tablero[ux][y].Piezas == colorDop ||Tablero[ux][y].Piezas == colorTop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if(q != Tablero[ux][y].Ejey){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    }
                                }
                                break;
                            }
                        }
                    }
                }
                break;
            }
        }
    }   
    //arriba
    for(i = 1; i <= 8; i++){
        if(y-i>=1){
            iy = y - i;
            if(Tablero[x][iy].Piezas != null){
                if(Tablero[x][iy].Piezas == colorR){
                    //abajo
                    for(u = 1;u <= 8; u++){
                        uy  = u +y;
                        if(uy <= 8){
                            if(Tablero[x][uy].Piezas != null){
                                if(Tablero[x][uy].Piezas == colorDop ||Tablero[x][uy].Piezas == colorTop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if(p != Tablero[x][uy].Ejex){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    } 
                                }
                                break;
                            }
                        }
                    }
                }
                break;
            }
        } 
    }
    //abajo↓
    for(i = 1;i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                if(Tablero[x][iy].Piezas == colorR){
                    //arriba
                    for(u = 1; u <= 8; u++){
                        if(y-u>=1){
                            uy = y - u;
                            if(Tablero[x][uy].Piezas != null){
                                if(Tablero[x][uy].Piezas == colorDop ||Tablero[x][uy].Piezas == colorTop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if(p != Tablero[x][uy].Ejex){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    } 
                                }
                                break;
                            }
                        } 
                    }
                }
                break;
            }
        }
    }
//?----------------------------------------------------------------------------------
    //:Alfil y Reina

    //ArribaIzquierda↑←
    for(i = 1; i <= 8; i++){
        if(y-i>=1 && x-i >= 1){
            ix = x - i;
            iy = y - i;
            if(Tablero[ix][iy].Piezas != null){
                if(Tablero[ix][iy].Piezas == colorR){
                    //AbajoDerecha
                    for(u = 1;u <= 8; u++){
                        if(y+u<=8 && x+u <= 8){
                            ux = x + u;
                            uy = y + u;
                            if(Tablero[ux][uy].Piezas != null){
                                if(Tablero[ux][uy].Piezas == colorDop ||Tablero[ux][uy].Piezas == colorAop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if((p >! x && q >! y) || (p <! x && q <! y)){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    } 
                                }
                                break;
                            }
                        }
                    }
                }
                break;
            }
        }
    }
    //AbajoIzquierda↓←
    for(i = 1;i <= 8; i++){
        if(y+i<=8 && x-i >= 1){
            ix = x - i;
            iy = y + i;
            if(Tablero[ix][iy].Piezas != null){
                if(Tablero[ix][iy].Piezas == colorR){
                    //ArribaDerecha
                    for(u = 1;u <= 8; u++){
                        if(y+u<=8 && x+u <= 8){
                            ux = x + u;
                            uy = y + u;
                            if(Tablero[ux][uy].Piezas != null){
                                if(Tablero[ux][uy].Piezas == colorDop ||Tablero[ux][uy].Piezas == colorAop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if((p <! x && q >! y) || (p >! x && q <! y)){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    }
                                }
                                break;
                            }
                        }
                    } 
                }
                break;
            }
        }
    }   
    //ArribaDerecha↑→
    for(i = 1;i <= 8; i++){
        if(y-i>=1 && x+i <= 8){
            ix = x + i;
            iy = y - i;
            if(Tablero[ix][iy].Piezas != null){
                if(Tablero[ix][iy].Piezas == colorR){
                    for(u = 1;u <= 8; u++){
                        if(y+u<=8 && x-u >= 1){
                            ux = x - u;
                            uy = y + u;
                            if(Tablero[ux][uy].Piezas != null){
                                if(Tablero[ux][uy].Piezas == colorDop ||Tablero[ux][uy].Piezas == colorAop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if((p >! x && q <! y) || (p <! x && q >! y)){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    } 
                                }
                                break;
                            }
                        }
                    }  
                }
                break;
            }
        }
    }  
    //AbajoDerecha→↓
    for(i = 1;i <= 8; i++){
        if(y+i<=8 && x+i <= 8){
            ix = x + i;
            iy = y + i;
            if(Tablero[ix][iy].Piezas != null){
                if(Tablero[ix][iy].Piezas == colorR){
                    for(u = 1; u <= 8; u++){
                        if(y-u>=1 && x-u >= 1){
                            ux = x - u;
                            uy = y - u;
                            if(Tablero[ux][uy].Piezas != null){
                                if(Tablero[ux][uy].Piezas == colorDop ||Tablero[ux][uy].Piezas == colorAop){
                                    for(var p = 1; p <= 8; p++){
                                        for(var q = 1; q <= 8; q++){
                                            if(Movimiento[p][q] == true){
                                                if((p >! x && q >! y) || (p <! x && q <! y)){
                                                    Movimiento[p][q] = null;
                                                }
                                            }  
                                        }
                                    } 
                                }
                                break;
                            }
                        }
                    }
                }
                break;
            }
        }
    } 
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function JaqueMate(){
    var jaqueMate = true;
    var F_rey = true;
    //:creo todos los movimientos posibles
    for( p = 1; p <= 8; p++){
        for( q = 1; q <= 8; q++){
            if(Tablero[p][q].Piezas != null && Tablero[p][q].color != jaque.color){
                switch(Tablero[p][q].Piezas){
                    case Piezas.NTorre:
                    case Piezas.BTorre:
                            Torre(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NCaballo:
                    case Piezas.BCaballo:
                            Caballo(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NAlfil:
                    case Piezas.BAlfil:
                            Alfil(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NPeon:
                    case Piezas.BPeon:
                            Peon(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NDama:
                    case Piezas.BDama:
                            Dama(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NRey:
                    case Piezas.BRey:
                           Rey(p,q,Tablero[p][q].Piezas);
                           var Xrey = p;
                           var Yrey = q;
                    break;
            }}
        }
    }
    for( p = 1; p <= 8; p++){
        for( q = 1; q <= 8; q++){
            //:recorro todos los movimientos
            if(Movimiento[p][q] == true){ 
                //:si existen los movimientos los comparo con el TableroJaque
                for(var o = 1; o <= 8; o++){
                    for(var u = 1; u <= 8; u++){
                        //:recorro TableroJaque
                        if(TableroJaque[o][u] == true){
                            if(o == p && u == q){
                                jaqueMate = false;
                                break;
                            }
                        }
                    }
                }
            }
        }
    }
    if(jaqueMate == true){
        resetMovimientos();
        Rey(Xrey,Yrey,Tablero[Xrey][Yrey].Piezas);
        for(var o = 1; o <= 8; o++){
            for(var u = 1; u <= 8; u++){
                if(Movimiento[o][u] == true){
                    F_rey = false;
                }
            }
        }
    }
        
    if(jaqueMate == true && F_rey == true){
        finalizado = true;
        simbolo = "#";
        Victoria(); 
        victoria++;
        sendResultado(1)
        ActualizarEstadisticas(1);  
    }else{
        guardoJaque();
    }
    resetMovimientos();
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Derrota(){
    finalizado = true;
    $.ajax({
        url: "/ChessUY/Modal/modalDerrota.php",
        type: "POST",
        data: {jugador2:jugador2},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
      });
    derrota++;  
    sendResultado(2)
    ActualizarEstadisticas(0);
}
function Victoria(){
    finalizado = true;
    $.ajax({
        url: "/ChessUY/Modal/modalVictoria.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
      });   
    victoria++;
    sendResultado(1)
    ActualizarEstadisticas(1); 
}
//
//
//:--------------------------------------ONLINE----------------------------------------------/
var conn;
function init(){
    conn = new WebSocket('ws://localhost:8080');

        conn.onopen = function (e) {
            console.log("Connection established!");
            $.ajax({
                url:  "/ChessUY/Modal/modalEspera.php",
                type: "POST",
                data: {},
                success: function (data) {
                    document.getElementById("modal").innerHTML = data;
                }
              });
            $.ajax({
            async: false,
            url:  "/ChessUY/Ajedrez/php/UsuOnline.php",
            type: "POST",
            data: {action:'agregar'},
            success: function (data) {}
            });
            sendConnection();
        };
        conn.onmessage = function(e) {
            receiveMessage(e);
        };
        conn.onclose = function(e) {
            console.log('Conexión websocket cerrada!');
        };
    }

    function sendConnection(e){
        name = sessionStorage.getItem('usuario') 
        room = ID_partido;
        conn.send("{\"type\":\"login\",\"name\":\"" + name + "\",\"room\":\""+ room + "\"}")

    }

    function sendResultado(e){
        switch(e){
            case 1:
                //:VICTORIA
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "vitoria";
                conn.send(JSON.stringify(msg));
            break;
            case 2:
                //:DERROTA
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "derrota";
                conn.send(JSON.stringify(msg));
            break;
            case 3:
                //:PIDO TABLAS
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "Pido_tablas";
                conn.send(JSON.stringify(msg));
            break;
            case 4:
                //:ACEPTO TABLAS
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "Acepto_tablas";
                conn.send(JSON.stringify(msg));
            break;
            case 5:
                //:RECHAZO TABLAS
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "Rechazo_tablas";
                conn.send(JSON.stringify(msg));
            break;
            case 6:
                //:TABLAS
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "tablas";
                conn.send(JSON.stringify(msg));
            break;
            case 7:
                //:RESPONDO TABLAS
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "Respondo_tablas";
                conn.send(JSON.stringify(msg));
            break;
        }
    }
    function sendMessage(e) {
        if(e == 1){
            //guardoTablero();
            var tab = "tab:" +JSON.stringify(Tablero);
            var msg = {};
            msg["type"] = "message";
            msg["message"] = tab;
            conn.send(JSON.stringify(msg));

            var jug = "jug:" +JSON.stringify(Jugadas);
            var msg = {};
            msg["type"] = "message";
            msg["message"] = jug;
            conn.send(JSON.stringify(msg));

            var jaq = "jaq:" +JSON.stringify(jaque);
            var msg = {};
            msg["type"] = "message";
            msg["message"] = jaq;
            conn.send(JSON.stringify(msg));

            var tur = "tur:" + Turno;
            var msg = {};
            msg["type"] = "message";
            msg["message"] = tur;
            conn.send(JSON.stringify(msg));
        }
    };

    function receiveMessage(e) {
        var jsonMessage = JSON.parse(e.data);
        if(jsonMessage.type === "onlineUsers"){
            var count = 0;
                var usuarios = [];
                $.each(jsonMessage.onlineUsers, function (key, val) {
                    if (count === 0) {
                        usuarios.push(val)
                    } else {
                        usuarios.push(val)
                    }
                    count++;
                });

                arUsuarios = JSON.stringify(usuarios)

            $.ajax({
                url:  "/ChessUY/Ajedrez/php/BuscoUsuOnline.php",
                type: "POST",
                data: {arUsuarios:arUsuarios},
                success: function (data) {
                    console.log(data);
                    var dat = JSON.parse(data);

                    if(dat['encontrado'] == true){
                        if(jugador2 == null){
                             jugador2 = dat['jugador2'];
                            if(jugador2 != null){
                                $.ajax({
                                    type: "POST",
                                    data: {Turno:Turno, jugador2: jugador2},
                                    url: "/ChessUY/Ajedrez/php/armoJugadores.php",
                                    success: function (data) {
                                        document.getElementById("ArmoJugadores").innerHTML = data;
                                    }
                                });
                            }
                    }
                        $(".modal").hide();

                    }else if(dat['encontrado'] == false){
                        $.ajax({
                            url: "/ChessUY/Modal/modalDesconeccion.php",
                            type: "POST",
                            data: {jugador2:jugador2},
                            success: function (data) {
                                document.getElementById("modal").innerHTML = data;
                            }
                        });   
                    }
                }
                });

        }else if (jsonMessage.type === "message") {
        var json2 = jsonMessage['message']
            tipo = 0;
            if(json2.includes("victoria")){
                Derrota();
            }else if(json2.includes("derrota")){
                Victoria();
            }else if(json2.includes("Pido_tablas")){
                $.ajax({
                    url: "/ChessUY/Modal/modalPidoTablas.php",
                    type: "POST",
                    data: {jugador2:jugador2},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });   
            }else if(json2.includes("Acepto_tablas")){
                $.ajax({
                    url: "/ChessUY/Modal/modalTablasAceptadas.php",
                    type: "POST",
                    data: {jugador2:jugador2},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });
            }else if(json2.includes("Rechazo_tablas")){
                $.ajax({
                    url: "/ChessUY/Modal/modalTablasRechazadas.php",
                    type: "POST",
                    data: {jugador2:jugador2},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });
            }else if(json2.includes("tablas")){
                $.ajax({
                    url: "/ChessUY/Modal/modalTablas.php",
                    type: "POST",
                    data: {turno:Turno},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });
            }else if(json2.includes("Respondo_tablas")){
                //console.log("respondo")

            }else if(json2.includes("tab:")){
                var tab = json2.slice(4)
                tipo = 1;
            }else if(json2.includes("jug:")){
                var jug = json2.slice(4)
                tipo = 2;
            }else if(json2.includes("jaq:")){
                var jaq = json2.slice(4)
                tipo = 3;
            }else if(json2.includes("tur:")){
                var tur = json2.slice(4)
                tipo = 4;
            }

            switch(tipo){
                case 1:
                    inviertoTablero(tab);
                    break;
                case 2:
                    var jug2 = JSON.parse(jug);
                    for(var p = 1; p <= jug2.length; p++){
                        Jugadas[p] = jug2[p];
                    }
                    break;
                case 3:
                    var jaq2 = JSON.parse(jaq);
                    if(jaq2.jaque == true){
                         var jx = 9-jaq2.x;
                         var jy = 9-jaq2.y;
                        Jaque(jx, jy, Jugadas[Turno].Piezas)
                    }else{jaque = jaq2}

                    if(jaque.jaque == null){
                        guardoJaque();
                    }

                    break;
                case 4:
                    Turno = tur;
                    break;
            }
        }else{console.log("ERROR")}

        resetMovimientos();
        armoAjedrez();
    };
//:------------------------------------------------------------------------------------------/
//
//
function inviertoTablero(tab){
    var pp = 8;
    var qq = 8;
    var tab2 = JSON.parse(tab);
            for(var p = 1; p <= 8; p++){
                for(var q = 1; q <= 8; q++){
                    Tablero[pp][qq] = tab2[p][q];
                    qq = qq-1;
                }
                qq = 8;
                pp = pp-1;
            }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function box(boxcontent){
    if(boxcontent == "chat"){
        $(".table-wrapper").hide();
        $(".chat").show();
        $("#chat").addClass('active');
        $("#movimiento").removeClass('active');
    }
    else{
        $(".chat").hide();
        $(".table-wrapper").show();
        $("#chat").removeClass('active');
        $("#movimiento").addClass('active');
    }

}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function tablas(){
    //:Rey-Haogado
    Rey_Haogado('b');
    Rey_Haogado('n');
    //:Insuficiencia-de-Piezas
    Falta_de_Piezas();
}
function Rey_Haogado(color){
    var tablas = true;
    //:creo todos los movimientos posibles
    for( p = 1; p <= 8; p++){
        for( q = 1; q <= 8; q++){
            if(Tablero[p][q].Piezas != null && Tablero[p][q].color == color){
                switch(Tablero[p][q].Piezas){
                    case Piezas.NTorre:
                    case Piezas.BTorre:
                            Torre(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NCaballo:
                    case Piezas.BCaballo:
                            Caballo(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NAlfil:
                    case Piezas.BAlfil:
                            Alfil(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NPeon:
                    case Piezas.BPeon:
                            Peon(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NDama:
                    case Piezas.BDama:
                            Dama(p,q,Tablero[p][q].Piezas);
                    break;
                    case Piezas.NRey:
                    case Piezas.BRey:
                           Rey(p,q,Tablero[p][q].Piezas);
                    break;
            }}
        }
    }
    for( p = 1; p <= 8; p++){
        for( q = 1; q <= 8; q++){
            if(Movimiento[p][q] == true){ 
                tablas = false;
                break;
            }
        }
    }
    if(tablas == true){
        llamoTablas();
    }
}
function Acuerdo_Mutuo(){   
    if(spam < 3 && derrota == 0 && tabla == 0 && victoria == 0){
        spam++;
        //:cambiar a ESPERO
        $.ajax({
            url:  "/ChessUY/Modal/modalEsperoTablas.php",
            type: "POST",
            data: {},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
                sendResultado(3);
            }
        });
    }
}
function aceptar_tablas(){
    finalizado = true;
    $.ajax({
        url: "/ChessUY/Modal/modalAceptoTablas.php",
        type: "POST",
        data: {jugador2:jugador2},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
            sendResultado(4)
        }
        });
    tabla++;
    ActualizarEstadisticas(0.5);
}
function rechazar_tablas(){
    $.ajax({
        url: "/ChessUY/Modal/modalRechazoTablas.php",
        type: "POST",
        data: {jugador2:jugador2},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
            sendResultado(5);
        }
        });
}
function Triple_Repeticion(){
    if(Turno > 4){
        var p = Jugadas[Turno].Piezas;
        var p2 = Jugadas[(Turno - 4)].Piezas;
        var x = Jugadas[Turno].Ejex;
        var x2 = Jugadas[(Turno - 4)].Ejex;
        var y = Jugadas[Turno].Ejey;
        var y2 = Jugadas[(Turno - 4)].Ejey;
        if(p == p2 && x == x2 && y == y2){
            rep++;
            if(rep == 8){
                llamoTablas();
            }
        }else{
            rep = 0;
        }
    }
}
function Falta_de_Piezas(){
    var fp = true;
    var piezas_tablero = '';
    for( p = 1; p <= 8; p++){
        for( q = 1; q <= 8; q++){
           if(Tablero[p][q].Piezas != null){
                piezas_tablero = piezas_tablero + Tablero[p][q].Piezas +"-"; 
           }
        }
    }
    if( piezas_tablero.includes('d') || piezas_tablero.includes('dn') || piezas_tablero.includes('t') || 
        piezas_tablero.includes('tn') || piezas_tablero.includes('p') || piezas_tablero.includes('pn')) {
        fp = false;
    }
    if(fp == true){
        llamoTablas();
    }
}
function llamoTablas(){
    finalizado = true;
    $.ajax({
        url: "/ChessUY/Modal/modalTablas.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
            sendResultado(6)
        }
        });
    tabla++;
    ActualizarEstadisticas(0.5);
}
function Porcentaje(pieza,cor){
    var suma = 0;
    switch(pieza){
        case Piezas.NTorre:
            suma = 5;
        break;
        case Piezas.BTorre:
            suma =  -5;
        break;
        case Piezas.NCaballo:
            suma =  +3;
        break;
        case Piezas.BCaballo:
            suma =  -3;
        break;
        case Piezas.NAlfil:
            suma =  +3;
        break;
        case Piezas.BAlfil:
            suma =  -3;
        break;
        case Piezas.NPeon:
            suma = 1;
        break;    
        case Piezas.BPeon:
            suma = -1;       
        break;
        case Piezas.NDama:
            suma = 9;
        break;
        case Piezas.BDama:
            suma = -9;
        break;
    }
    if(cor == 1){suma = suma * -1}
    porcentaje = porcentaje + suma;
    if(porcentaje>78){
        barra = 100;
    }else{
        if(porcentaje<0){
            barra = 0;
        }else{
            barra = (100/78)*porcentaje;
        }
    }
    barraProgreso(barra);
} 
function ActualizarEstadisticas(resultado){
    $.ajax({
        url: "/ChessUY/Ajedrez/php/ELO.php",
        type: "POST",
        data: {jugador2:jugador2, resultado:resultado},
        success: function (data) {
            elo = data;
            console.log('ELO => ', elo);
            $.ajax({
                url: "/ChessUY/Logros/PHP/ActualizoEstadisticas.php",
                type: "POST",
                data: {puntaje:elo,victorias:victoria,derrotas:derrota,tablas:tabla,coronaciones:coronaciones,comidas:comidas,menos_tiempo:menos_tiempo,menos_movimientos:Turno,Reloj:Reloj,Campeon:0},
                success: function (data) {
                    $.ajax({
                        url: "/ChessUY/Ajedrez/php/cambioEstado.php",
                        type: "POST",
                        data: {numJugador:numJugador},
                        success: function (data) {}
                        });
                }
                });
        }
        });
}
