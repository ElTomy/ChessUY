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
        jugador2 = partido[0]['usu2'];
        col1 = partido[0]['col1'];
        turno = partido[0]['turno'];
        tablero = partido[0]['tablero'];
        movimientos = partido[0]['movimientos'];
        barra = partido[0]['barra'];
        tiempo1 = partido[0]['tiempo1'];
        tiempo2 = partido[0]['tiempo2'];

        Turno = turno;
        console.log("jug2",jugador2);
    }
  });
  CreoTablero();
  armoTablero(tablero, barra, col1);
  armoMovimientos(movimientos);
  barraProgreso(barra);
  armoAjedrez();
  init();
});

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
const Tablero = [];
var  Movimiento = [];
var jaque = {
   jaque: null,
   pieza: null,
   color: null,
   x: null,
   y: null,
}
var jug1="";
var jug2="";

function armoTablero(tablero, barra, col){
    var tab = JSON.parse(tablero);

    if(col == 0){
        if(Turno%2 == 0){
            for(var p = 1; p <= 8; p++){
                for(var q = 1; q <= 8; q++){
                    Tablero[p][q] = tab[p][q];
                }
            }
            barraProgreso(barra);
        }else{
            inviertoTablero(tab);
            barra = 100-barra;
            barraProgreso(barra);
        }

    }else if(col == 1){
        if(Turno%2 == 0){
            inviertoTablero(tab);
            barra = 100-barra;
            barraProgreso(barra);
        }else{
            for(var p = 1; p <= 8; p++){
                for(var q = 1; q <= 8; q++){
                    Tablero[p][q] = tab[p][q];
                }
            }
            barraProgreso(barra);
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
//:--------------------------------------ONLINE----------------------------------------------/
var conn;
function init(){
    conn = new WebSocket('ws://localhost:8080');

        conn.onopen = function (e) {
            console.log("Connection established!");
            $.ajax({
            async: false,
            url:  "/ChessUY/SalaEspectadores/php/UsuOnline.php",
            type: "POST",
            data: {action:'agregar'},
            success: function (data) {}});
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
        name = sessionStorage.getItem('usuario');
        console.log('name: ', name);
        room = sessionStorage.getItem('id_partido');
        conn.send("{\"type\":\"login\",\"name\":\"" + name + "\",\"room\":\""+ room + "\"}")

    }

    function sendMessage(e) {};

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
                url:  "/ChessUY/SalaEspectadores/php/BuscoUsuOnline.php",
                type: "POST",
                data: {arUsuarios:arUsuarios, jug1:jug1, jug2:jugador2},
                success: function (data) {
                    console.log(data);
                    var dat = JSON.parse(data);

                     if(dat['usuarios_conectados'] == false){
                        $.ajax({
                            url: "/ChessUY/Modal/modalDesconeccion.php",
                            type: "POST",
                            data: {jugador2:dat['usuario_desconectado']},
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
                    data: {jugador2:jug2},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });   
            }else if(json2.includes("Acepto_tablas")){
                $.ajax({
                    url: "/ChessUY/Modal/modalTablasAceptadas.php",
                    type: "POST",
                    data: {jugador2:jug2},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });
            }else if(json2.includes("Rechazo_tablas")){
                $.ajax({
                    url: "/ChessUY/Modal/modalTablasRechazadas.php",
                    type: "POST",
                    data: {jugador2:jug2},
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
            }else if(json2.includes("ChatE:")){
                var chat = json2.slice(6);
                tipo = 5;
            }

            switch(tipo){
                case 1:
                    var tab2 = JSON.parse(tab)
                    if(Turno%2 == 0){
                        inviertoTablero(tab2);
                    }else{
                        for(var p = 1; p <= 8; p++){
                            for(var q = 1; q <= 8; q++){
                                Tablero[p][q] = tab2[p][q];
                            }
                        }
                    }
                    
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

                    break;
                case 4:
                    Turno = tur;
                    break;
                case 5:
                    var content = document.getElementById('chat-box').innerHTML;
                    document.getElementById('chat-box').innerHTML = content +  '<div class="mensaje1-wrapper"> <div class="mensaje1"><a class="nombre" href="/ChessUY/Profile/'+jugador2+'">'+jugador2+'</a><p>'+chat+'</p></div></div>';
                    break;
            }
        }else{console.log("ERROR")}
        armoAjedrez();
    };

    function mandarChat(e){
        var message = document.getElementById('message').value;

        if(e.keyCode == 13){
            if(message.length > 0){
                var msg = {};
                msg["type"] = "message";
                msg["message"] = "ChatE:" + message;
                conn.send(JSON.stringify(msg));
    
                var content = document.getElementById('chat-box').innerHTML;
                document.getElementById('chat-box').innerHTML = content +  '<div class="mensaje2-wrapper"> <div class="mensaje2"><a class="nombre" href="/ChessUY/Profile/'+jug1+'">'+jug1+'</a><p>'+message+'</p></div></div>';
                document.getElementById('message').value = '';
            }
        }
    }
//:------------------------------------------------------------------------------------------/
//