$( document ).ready(function(){
    $("#ArmoAjedrez").load('php/armoAjedrez.php');
    boardsize();
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
const Movimiento = null;

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
    if(seleccionado == null){
        if(Tablero[x][y] != null){
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
    switch(seleccionado.Contenido){
        case Piezas.NTorre, Piezas.BTorre:
            Torre();
        break;
        case Piezas.NCaballo,Piezas.BCaballo:
            Caballo();
        break;
        case Piezas.NAlfil,Piezas.BAlfil:
            Alfil();
        break;
        case Piezas.NPeon,Piezas.BPeon:
            Peon();
        break;
        case Piezas.NDama,Piezas.BDama:
            Dama();
        break;
        case Piezas.NRey,Piezas.BRey:
            Rey();
        break;
                                            
    }
}
function Peon(){

}
function Torre(){
    
}
function Caballo(){
    
}
function Alfil(){
    
}
function Dama(){
    
}
function Rey(){
    
}
window.onresize = boardsize;