$( document ).ready(function(){
    CreoTablero();
    resetMovimientos();
    TraigoEntrenamiento();
});
class Problemas{
    constructor(tiempo, nivel, cantMovimientos){
    this.tiempo=tiempo;
    this.nivel=nivel;
    this.cantMovimientos=cantMovimientos;

}
get time(){
    return this.tiempo;
}
set time(x){
    this.tiempo=x;
}
get lvl(){
    return this.nivel;
}
set lvl(x){
    this.nivel=x;
}
get cantmoves(){
    return this.cantMovimientos;
}
set cantmoves(x){
    this.cantMovimientos=x;
}
}
function boxHeight(){
    var boxHeight = document.getElementById("box").clientHeight;
    console.log(boxHeight);

    $("#box").css("max-height", boxHeight);
}
function TraigoEntrenamiento(){
    $.ajax({
        url: "/cyberhydra/Entrenamiento/php/TraigoEntrenamiento.php",
        type: "POST",
        data: {},
        success: function (data) {
            var dat = JSON.parse(data);
            var tab = JSON.parse(dat[0]['Tablero']);
            var movs = JSON.parse(dat[0]['CantidadMovimientos']);
            idProblema = dat[0]['ID'];
            if(idProblema != 0){
                movi = movs;
                for(var p = 1; p <= 8; p++){
                    for(var q = 1; q <= 8; q++){
                        Tablero[p][q] = tab[p][q];
                    }
                }
                armoAjedrez();
            }else{
                $.ajax({
                    url: "/cyberhydra/Modal/modal.php",
                    type: "POST",
                    data:{numero_mensaje: 23},
                    success: function (modal){
                        document.getElementById("modal").innerHTML = modal;
                    }
                });
            }
        }
    });
}
 function armoAjedrez(){
    console.log(Jugadas);

    /* 
    Armo Tablero     
    */
    $.ajax({
        url: "/cyberhydra/Entrenamiento/php/armoAjedrez.php",
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
        url: "/cyberhydra/Entrenamiento/php/armoMovimientos.php",
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
        data: {Turno:Turno},
        url: "/cyberhydra/Entrenamiento/php/armoJugadores.php",
        success: function (data) {
            document.getElementById("ArmoJugadores").innerHTML = data;
        }
    });
 }

 var Color = {
    Blanco:'b',
    Negro:'n',
}
var colJugador = 0;
var blan = 1;
var neg = 8;
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
var Jugadas = [];
var movi;
var idProblema;
var Turno = 1;
var Reloj = 0;
var ultTurn = 0;
var simbolo = null;
var xp;
var yp;
var pp;
var xXNULL;
var yYNULL;
const Tablero = [];
const TableroJaque = [];
var seleccionado = null;
var  Movimiento = [];
var movimientoCorrect = 0;
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
        var sel;
        // seleccionas las piezas y sus movimientos
        if(seleccionado == null){
            if(Tablero[x][y].Piezas != null){
                if((Turno%2 != 0 && Tablero[x][y].color == "n")||(Turno%2 == 0 && Tablero[x][y].color == "b")){
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
                //llamo a la bd para comprobar que el movimiento es el correcto en caso de que no lo sea muestro un modal de error
                MovimientoCorrecto(x,y,seleccionado.Contenido);
                if(movimientoCorrect == 1){
                    sel= seleccionado.Contenido;
                    if(Tablero[x][y].Piezas != null){
                        simbolo = "x";
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
                                console.log(Tablero[x][5]); 
                                if(Tablero[x][5].Piezas != null && seleccionado.color != Tablero[x][5].color && seleccionado.Ejey == 5){
                                        ColocoPieza(null,null,x,5);
                                        simbolo = "x";
                                }
                            }else{
                                if(y == 3 && Tablero[x][y].Piezas == null){
                                    console.log(Tablero[x][4]);
                                    if(Tablero[x][4].Piezas != null && seleccionado.color != Tablero[x][4].color && seleccionado.Ejey == 4){
                                            ColocoPieza(null,null,x,4);
                                            simbolo = "x";
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
                }
            }else{
                //seleccionas una pieza y sus movimientos
                if(Tablero[x][y] != null){
                    if((Turno%2 != 0 && Tablero[x][y].color == "n")||(Turno%2 == 0 && Tablero[x][y].color == "b")){
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
                simbolo = null;
                Turno++;
                ColocoPieza(pp,"b",xp,yp);
                ColocoPieza(null,null,xXNULL,yYNULL);
                Jugadas[(Turno)] = {
                    Piezas: pp,
                    color: "n",
                    Ejex: xp,
                    Ejey: yp,
                    simbolo: null,
                }
                Turno++;
                ultTurn = true;
                a = 1;
            }
            armoAjedrez();
        }
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
var xp;
var yp;
var pp;
var xXNULL;
var yYNULL;
function MovimientoCorrecto(x,y,p){
    $.ajax({
        type: "POST",
        async: false,
        data: {X:x,Y:y,Pieza:p,ID:idProblema,Turno:Turno},
        url: "/cyberhydra/Entrenamiento/php/MovimientoCorrecto.php",
        success: function (data) {
            var dat = JSON.parse(data);
            xp = JSON.parse(dat[0]["x"]);
            yp = JSON.parse(dat[0]["y"]);
            pp = dat[0]["Pieza"];
            xXNULL = JSON.parse(dat[0]["XNULL"]);
            yYNULL = JSON.parse(dat[0]["YNULL"]);
            if(xp != 0 && xp != 9){
                movimientoCorrect = 1;
            }else{
                if(xp == 0){ 
                    $.ajax({
                        url: "/cyberhydra/Modal/modal.php",
                        type: "POST",
                        data:{numero_mensaje: 21},
                        success: function (modal){
                            document.getElementById("modal").innerHTML = modal;
                        }
                    });
                    movimientoCorrect = 0;
                }else{
                    movimientoCorrect = 0;
                    $.ajax({
                        url: "/cyberhydra/Modal/modal.php",
                        type: "POST",
                        data:{numero_mensaje: 22},
                        success: function (modal){
                            document.getElementById("modal").innerHTML = modal;
                            $.ajax({
                                url: "/cyberhydra/Entrenamiento/php/EntrenamientoCompletado.php",
                                type: "POST",
                                data: {ID:idProblema},
                                success: function (data) {
                                    location.reload();
                                }
                            });
                        }
                    });

                }
            }
        }
    });
}
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
        url: "/cyberhydra/Modal/modalCoronacion.php",
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
    
    //Caballo
    //←↑
    if (x-2>=1 && y-1>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} 
    yy = y+1;
    //←↓
    if (x-2>=1 && y+1<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}}
    yy = y+2;
    xx = x-1;
    //↓←
    if (x-1>=1 && y+2<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} 
    xx = x+1;
    //↓→
    if (x+1<=8 && y+2<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} 
    xx = x+2;
    yy = y+1;
    //→↓
    if (x+2<=8 && y+1<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}}
    yy = y-1;
    //→↑
    if (x+2<=8 && y-1>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} 
    yy = y-2;
    xx = x+1;
    //↑→
    if (x+1<=8 && y-2>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} 
    xx = x-1;
    //↑←
    if (x-1>=1 && y-2>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}};
    
    //----------------------------------------------------------------------------------
    //Torre y Reina
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
    //----------------------------------------------------------------------------------
    //Alfil y Reina

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

  //----------------------------------------------------------------------------------
    //Peon y Reina
    xx = x-1;
    yy = y-1;
    if(col == "n"){
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
    }else{
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
    // llamo a movimiento para generar movimiento en nueva posicion
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
                    console.log("JAQUE")
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
    //Torre y Reina

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
//----------------------------------------------------------------------------------
    //Alfil y Reina

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