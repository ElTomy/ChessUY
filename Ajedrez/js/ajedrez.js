$( document ).ready(function(){
    $.ajax({
        url: "/ChessUY/Ajedrez/php/armoAjedrez.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("ArmoAjedrez").innerHTML = data;
            boardsize();
        }
    });
    CreoTablero();
    PosicionPiezas();
});

const Piezas = {
    BRey: 'r', 
    BDama: 'd',
    BCaballo: 'c',
    BAlfil: 'a',
    BTorre:'t', 
    BPeon:'p',
    NRey: 'r', 
    NDama: 'd',
    NCaballo: 'c',
    NAlfil: 'a',
    NTorre:'t', 
    NPeon:'p',  
}
const Tablero = [];
var seleccionado = null;
var  Movimiento = [[],[]];

function boardsize(){
    
    var width = window.innerWidth;
    var height = window.innerHeight;
    console.log("width:" + width);
    console.log("height:" + height);

  

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

            $(".cell").css ('width', cell_width);
            $(".cell").css ('height', cell_width);
            $(".board-text").css ('width', cell_width);
            $(".board-text").css ('height', cell_width);

            $(".ajedrez-wrapper").css ('height', boardtotal_width);
            $(".ajedrez-wrapper").css ('width', boardtotal_width);

        }else{
            $(".cell").css ('width', cell_width);
            $(".cell").css ('height', cell_width);
    
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
       
        $(".ajedrez-wrapper").css ('height', boardtotal);
        $(".ajedrez-wrapper").css ('width', boardtotal);
    }    
}
function PosicionPiezas(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x][2] ={
            Piezas: Piezas.BPeon,
        }
        Tablero[x][7] ={
            Piezas: Piezas.NPeon,
        }  
    }
    Tablero[1][1] ={
        Piezas: Piezas.BTorre,
    }
    Tablero[1][8] ={
        Piezas: Piezas.NTorre,
    }
    Tablero[2][1] ={
        Piezas: Piezas.BCaballo,
    }
    Tablero[2][8] ={
        Piezas: Piezas.NCaballo,
    }
    Tablero[3][1] ={
        Piezas: Piezas.BAlfil,
    }
    Tablero[3][8] ={
        Piezas: Piezas.NAlfil,
    }
    Tablero[4][1] ={
        Piezas: Piezas.BDama,
    }
    Tablero[4][8] ={
        Piezas: Piezas.NDama,
    }
    Tablero[5][1] ={
        Piezas: Piezas.BRey,
    }
    Tablero[5][8] ={
        Piezas: Piezas.NRey,
    }
    Tablero[6][1] ={
        Piezas: Piezas.BAlfil,
    }
    Tablero[6][8] ={
        Piezas: Piezas.NAlfil,
    }
    Tablero[7][1] ={
        Piezas: Piezas.BCaballo,
    }
    Tablero[7][1] ={
        Piezas: Piezas.NCaballo,
    }
    Tablero[8][1] ={
        Piezas: Piezas.BTorre,
    }
    Tablero[8][8] ={
        Piezas: Piezas.NTorre,
    }
}
function CreoTablero(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x] = [];
        for(let y = 1; y <= 8; y += 1){
            Tablero[x][y] = null;
        }
    }
}
function seleccionar(x,y){
    console.log(Tablero)
    if(seleccionado == null){
        if(Tablero[x][y].Piezas != null){
            seleccionado = {
                Ejex: x,
                Ejey: y,
                Contenido: Tablero[x][y].Piezas,
            }
            Movimientos();
        }
    }else{
        /*if(Tablero[x][y] != Movimiento.Posible){
            Muevo la pieza
        }else{
            if(Tablero[x][y] != null){
                seleccionado = {
                    Ejex: x,
                    Ejey: y,
                    Contenido: Tablero[x][y].Piezas,
                }
            Movimientos();
            }else{
                seleccionado = null;
                movimientos = null;
            }  
        }*/
     
    }
}
function Movimientos(){
    let x = seleccionado.Ejex
    let y = seleccionado.Ejey;
    switch(seleccionado.Contenido){
        case Piezas.NTorre, Piezas.BTorre:
                Torre(x,y);
        break;
        case Piezas.NCaballo,Piezas.BCaballo:
                Caballo(x,y);
        break;
        case Piezas.NAlfil,Piezas.BAlfil:
                Alfil(x,y);
        break;
        case Piezas.NPeon,Piezas.BPeon:
                Peon(x,y);
        break;
        case Piezas.NDama,Piezas.BDama:
                Dama(x,y);
        break;
        case Piezas.NRey,Piezas.BRey:
                Rey(x,y);
        break;
                                            
    }
}
function Peon(x,y){
    var xx = x + 1;
    var yy = y + 1;
    if(seleccionado.Contenido == Piezas.BPeon){
        if(y == 2){
            Movimiento[x][4] = true;
        }
        Movimiento[x][yy] = Movimiento.Posible;
        if(Tablero[xx][yy].Piezas != null){
            Movimiento[xx][yy] = Movimiento.Posible;
        }
        xx = x -1;
        if(Tablero[xx][yy].Piezas != null){
            Movimiento[xx][yy] = Movimiento.Posible;
        }
    }else{
        if(y == 7){
            Movimiento[x][5] = Movimiento.Posible;
        }
        yy = y -1;
        xx = x +1;

        Movimiento[x][yy] = Movimiento.Posible;
        if(Tablero[xx][yy].Piezas != null){
            Movimiento[xx][yy] = Movimiento.Posible;
        }else{
            xx = x -1;
            if(Tablero[xx][yy].Piezas != null){
                Movimiento[xx][yy] = Movimiento.Posible;
            }
        }
    }
}
function Torre(x,y){
    for(let px = x;px <= 8;px += 1){
        Movimiento[px][y] = Movimiento.Posible;
    }
    for(let px = x;px >= 8;px -= 1){
        Movimiento[px][y] = Movimiento.Posible;
    }
    for(let py = y;py <= 8;py += 1){
        Movimiento[x][py] = Movimiento.Posible;
    }
    for(let py = y;py >= 8;py -= 1){
        Movimiento[x][py] = Movimiento.Posible;
    }
}
function Caballo(x,y){
    if (x-2>=1 && y-1<=8) {Movimiento[x-2][y-1] = Movimiento.Posible;}
    if (x-2>=1 && y+1<=8) {Movimiento[x-2][y+1] = Movimiento.Posible;}
    if (x-1>=1 && y+2<=8) {Movimiento[x-2][y+2] = Movimiento.Posible;}
    if (x+1>=1 && y+2<=8) {Movimiento[x+1][y+2] = Movimiento.Posible;}
    if (x+2>=1 && y+1<=8) {Movimiento[x+2][y+1] = Movimiento.Posible;}
    if (x+2>=1 && y-1<=8) {Movimiento[x+2][y-1] = Movimiento.Posible;}
    if (x+1>=1 && y-2<=8) {Movimiento[x+1][y-2] = Movimiento.Posible;}
    if (x-1>=1 && y-2<=8) {Movimiento[x-1][y-2] = Movimiento.Posible;}
}
function Alfil(x,y){
    let ix;
    let iy;
    let i;
    if(x<y){
        ix = x;
        iy = y;
    }else{
        ix = y;
        iy = x;
    }
    for(i = iy;i <= 8;ipx += 1){
        Movimiento[px][y] = Movimiento.Posible;
    }
    for(i = ix;i >= 8;i -= 1){
        Movimiento[px][y] = Movimiento.Posible;
    }
    for(i = y;i <= 8;i += 1){
        Movimiento[x][py] = Movimiento.Posible;
    }
    for(i = y;i >= 8;i -= 1){
        Movimiento[x][py] = Movimiento.Posible;
    }
    
}
function Dama(x,y){
    for(let px = x;px <= 8;px += 1){
        Movimiento[px][y] = Movimiento.Posible;
    }
    for(let px = x;px >= 8;px -= 1){
        Movimiento[px][y] = Movimiento.Posible;
    }
    for(let py = y;py <= 8;py += 1){
        Movimiento[x][py] = Movimiento.Posible;
    }
    for(let py = y;py >= 8;py -= 1){
        Movimiento[x][py] = Movimiento.Posible;
    }
}
function Rey(x,y){
    
}
window.onresize = boardsize;