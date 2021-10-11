/**
 * Con la ID traigo la info de la bd y armo:
 * 
 * tablero
 * jugadores
 * movimientos
 * turno
 * tiempo
 * 
 * y hago el INIT
 * 
 */
 $( document ).ready(function(){
   var id_partido = sessionStorage.getItem('id_partido');
 
   $.ajax({
    async: false,
    url:  "/ChessUY/SalaEspectadores/php/cargoPartido.php",
    type: "POST",
    data: {id_partido:id_partido},
    success: function (data) {
        var partido = JSON.parse(data)
        console.log(partido);
        jug1 = partido[0]['usu1'];
        jug2 = partido[0]['usu2'];
        turno = partido[0]['turno'];
        tablero = partido[0]['tablero'];
        movimientos = partido[0]['movimientos'];

        Turno = turno;
    }
  });
  CreoTablero();
  armoTablero(tablero);
  armoMovimientos(movimientos);
  armoAjedrez();

});
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
var Turno;
var Reloj = 0;
var rep = 0;
var ultTurn = 0;
var menos_tiempo = 0;
const Tablero = [];
var seleccionado = null;
var  Movimiento = [];
var jaque = {
   jaque: null,
   pieza: null,
   color: null,
   x: null,
   y: null,
}
var socket;

function armoTablero(tablero){
    var tab = JSON.parse(tablero);
    if(Turno%2 == 0){
        inviertoTablero(tab);
    }else{
        for(var p = 1; p <= 8; p++){
            for(var q = 1; q <= 8; q++){
                Tablero[p][q] = tab[p][q];
            }
        }
    }
}

function armoMovimientos(movimientos){
    var mov = JSON.parse(movimientos);
           for(var p = 1; p <= mov.length; p++){
               Jugadas[p] = mov[p];
           }
}

function CreoTablero(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x] = [];
        for(let y = 1; y <= 8; y += 1){
            Tablero[x][y] = {
                Piezas: null,
                color: null,
                Ejex: x,
                Ejey: y,
            }
        }
    }
}

function inviertoTablero(tab){
    var pp = 8;
    var qq = 8;
            for(var p = 1; p <= 8; p++){
                for(var q = 1; q <= 8; q++){
                    Tablero[pp][qq] = tab[p][q];
                    qq = qq-1;
                }
                qq = 8;
                pp = pp-1;
            }
}

function armoAjedrez(){

    /* 
    Armo Tablero     
    */
    $.ajax({
        url: "/ChessUY/SalaEspectadores/php/armoAjedrez.php",
        type: "POST",
        data: {Tablero:Tablero, Movimiento:Movimiento, jaque: jaque, Turno: Turno, jugador1:jug1},
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
        url: "/ChessUY/SalaEspectadores/php/armoMovimientos.php",
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
        data: {Turno:Turno, jugador2: jug2,  jugador1:jug1},
        url: "/ChessUY/SalaEspectadores/php/armoJugadores.php",
        success: function (data) {
            document.getElementById("ArmoJugadores").innerHTML = data;
        }
    });
    
    /* 
    Armo Chat     
    */
    
    $.ajax({
        type: "POST",
        url: "/ChessUY/SalaEspectadores/php/armoChat.php",
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