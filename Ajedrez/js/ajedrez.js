$( document ).ready(function(){
    CreoTablero();
    PosicionPiezas();
    resetMovimientos();
    armoAjedrez();
    
});
 function armoAjedrez(){
    $.ajax({
        url: "/ChessUY/Ajedrez/php/armoAjedrez.php",
        type: "POST",
        data: {Tablero:Tablero},
        success: function (data) {
            document.getElementById("ArmoAjedrez").innerHTML = data;
            boardsize();
        }
    });
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
const Tablero = [];
var seleccionado = null;
var  Movimiento = [];

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
function PosicionPiezas(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x][2] ={
            Piezas: Piezas.BPeon,
            Ejex: x,
            Ejey: 2,
     
        }
        Tablero[x][7] ={
            Piezas: Piezas.NPeon,
            Ejex: x,
            Ejey: 7,
           
        }  
    }
    Tablero[1][1] ={
        Piezas: Piezas.BTorre,
        Ejex: 1,
        Ejey: 1,
      
    }
    Tablero[1][8] ={
        Piezas: Piezas.NTorre,
        Ejex: 1,
        Ejey: 8,
     
    }
    Tablero[2][1] ={
        Piezas: Piezas.BCaballo,
        Ejex: 2,
        Ejey: 1,
       
    }
    Tablero[2][8] ={
        Piezas: Piezas.NCaballo,
        Ejex: 2,
        Ejey: 8,
      
    }
    Tablero[3][1] ={
        Piezas: Piezas.BAlfil,
        Ejex: 3,
        Ejey: 1,
       
    }
    Tablero[3][8] ={
        Piezas: Piezas.NAlfil,
        Ejex: 3,
        Ejey: 8,
       
    }
    Tablero[4][1] ={
        Piezas: Piezas.BDama,
        Ejex: 4,
        Ejey: 1,
    
    }
    Tablero[4][8] ={
        Piezas: Piezas.NDama,
        Ejex: 4,
        Ejey: 8,
 
    }
    Tablero[5][1] ={
        Piezas: Piezas.BRey,
        Ejex: 5,
        Ejey: 1,
      
    }
    Tablero[5][8] ={
        Piezas: Piezas.NRey,
        Ejex: 5,
        Ejey: 8,
     
    }
    Tablero[6][1] ={
        Piezas: Piezas.BAlfil,
        Ejex: 6,
        Ejey: 1,
      
    }
    Tablero[6][8] ={
        Piezas: Piezas.NAlfil,
        Ejex: 6,
        Ejey: 8,
      
    }
    Tablero[7][1] ={
        Piezas: Piezas.BCaballo,
        Ejex: 7,
        Ejey: 1,
      
    }
    Tablero[7][8] ={
        Piezas: Piezas.NCaballo,
        Ejex: 7,
        Ejey: 8,
   
    }
    Tablero[8][1] ={
        Piezas: Piezas.BTorre,
        Ejex: 8,
        Ejey: 1,
      
    }
    Tablero[8][8] ={
        Piezas: Piezas.NTorre,
        Ejex: 8,
        Ejey: 8,
      
    }

}
function resetMovimientos(){
    for(let x = 1; x <= 8; x += 1){
        Movimiento[x] = [];
        for(let y = 1; y <= 8; y += 1){
            Movimiento[x][y] = null;
        }
    }
}
function CreoTablero(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x] = [];
        for(let y = 1; y <= 8; y += 1){
            Tablero[x][y] = {
                Piezas: null,
                Ejex: x,
                Ejey: y,
            }
        }
    }
}
function seleccionar(x,y){
    
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
        if(Movimiento[x][y] == true){
            console.log(Tablero[x][y])
            console.log(Tablero[seleccionado.Ejex][seleccionado.Ejey])
            Tablero[x][y] = {
                Piezas: seleccionado.Contenido,
                Ejex: x,
                Ejey: y,
            }
            Tablero[seleccionado.Ejex][seleccionado.Ejey] = {
                Piezas: null,
                Ejex: seleccionado.Ejex,
                Ejey: seleccionado.Ejey,
            }
            console.log(Tablero[x][y])
            console.log(Tablero[seleccionado.Ejex][seleccionado.Ejey])
            console.log("-----")
            armoAjedrez();
        }else{
            if(Tablero[x][y] != null){
                seleccionado = {
                    Ejex: x,
                    Ejey: y,
                    Contenido: Tablero[x][y].Piezas,
                }
            Movimientos();
            }
                seleccionado = null;
                resetMovimientos(); 
              
        }
    }
}
function Movimientos(){
    muestrotablero();

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
}
function Peon(x,y){
    var xx = x + 1;
    var yy;
    if(seleccionado.Contenido == Piezas.BPeon){
        yy = y + 1;
        //movimiento: 2-adelante
        if(y == 2){
            Movimiento[x][4] = true;
        }
         //movimiento: 1-adelante
         Movimiento[x][yy] = true;
         if(xx<=8){
            //movimiento: comer-d
            if(Tablero[xx][yy].Piezas != null){
            Movimiento[xx][yy] = true;
            }
         }
         xx = x -1;
         if(xx>=1){
            
            //movimiento: comer-i
           if(Tablero[xx][yy].Piezas != null){
               Movimiento[xx][yy] = true;
           }
         }
        
    }else{
        if(seleccionado.Contenido == Piezas.NPeon){
            yy = y-1;
            //movimiento: 2-adelante
            if(y == 7){
                Movimiento[x][5] = true;
            }
             //movimiento: 1-adelante
             Movimiento[x][yy] = true;
             if(xx<=8){
                //movimiento: comer-d
                if(Tablero[xx][yy].Piezas != null){
                Movimiento[xx][yy] = true;
                }
             }
             xx = x -1;
             if(xx>=1){
                
                //movimiento: comer-i
               if(Tablero[xx][yy].Piezas != null){
                   Movimiento[xx][yy] = true;
               }
             }
    }
}
}
function Torre(x,y){
    //aribba↑
    for(let px = x;px <= 8;px += 1){
        Movimiento[px][y] = true;
    }
    //abajo↓
    for(let px = x;px >= 1;px -= 1){
        Movimiento[px][y] = true;
    }
    //derecha→
    for(let py = y;py <= 8;py += 1){
        Movimiento[x][py] = true;
    }
    //izquierda←
    for(let py = y;py >= 1;py -= 1){
        Movimiento[x][py] = true;
    }
}
function Caballo(x,y){
    let xx = x-2;
    let yy = y-1;
    //La primera flecha significa 2 para ese lado y la segunda solo 1
    //←↑
    if (x-2>=1 && y-1<=8) {Movimiento[xx][yy] = true;}
    yy = y+1;
    //←↓
    if (x-2>=1 && y+1<=8) {Movimiento[xx][yy] = true;}
    yy = y+2;
    xx = x-1;
    //↓←
    if (x-1>=1 && y+2<=8) {Movimiento[xx][yy] = true;}
    xx = x+1;
    //↓→
    if (x+1>=1 && y+2<=8) {Movimiento[xx][yy] = true;}
    xx = x+2;
    yy = y+1;
    //→↓
    if (x+2>=1 && y+1<=8) {Movimiento[xx][yy] = true;}
    yy = y-1;
    //→↑
    if (x+2>=1 && y-1<=8) {Movimiento[xx][yy] = true;}
    yy = y-2;
    xx = x+1;
    //↑→
    if (x+1>=1 && y-2<=8) {Movimiento[xx][yy] = true;}
    xx = x-1;
    //↑←
    if (x-1>=1 && y-2<=8) {Movimiento[xx][yy] = true;}
}
function Alfil(x,y){
    let ix;
    let iy;
    let i;
    //ArribaIzquierda↑←
    for(i = 1;i <= 8;i += 1){
        if(y-i>=1 && x-i >= 1){
            ix = x - i;
            iy = y - i;
            Movimiento[ix][iy] = true;
        }
    }    
    //AbajoIzquierda↓←
    for(i = 1;i <= 8;i += 1){
        if(y+i<=8 && x-i >= 1){
            ix = x - i;
            iy = y + i;
            Movimiento[ix][iy] = true;
        }
    }    
    //ArribaDerecha↑→
    for(i = 1;i <= 8;i += 1){
        if(y-i>=1 && x+i <= 8){
            ix = x + i;
            iy = y - i;
            Movimiento[ix][iy] = true;
        }
    }   
    //AbajoDerecha→↓
    for(i = 1;i <= 8;i += 1){
        if(y+i<=8 && x+i <= 8){
            ix = x + i;
            iy = y + i;
            Movimiento[ix][iy] = true;
        }
    }    
    
}
function Dama(x,y){
    //aribba↑
    for(let px = x;px <= 8;px += 1){
        Movimiento[px][y] = true;
    }
    //abajo↓
    for(let px = x;px >= 1;px -= 1){
        Movimiento[px][y] = true;
    }
    //derecha→
    for(let py = y;py <= 8;py += 1){
        Movimiento[x][py] = true;
    }
    //izquierda←
    for(let py = y;py >= 1;py -= 1){
        Movimiento[x][py] = true;
    }
    let ix;
    let iy;
    let i;
    //ArribaIzquierda↑←
    for(i = 1;i <= 8;i += 1){
        if(y-i>=1 && x-i >= 1){
            ix = x - i;
            iy = y - i;
            Movimiento[ix][iy] = true;
        }
    }
    //AbajoIzquierda↓←
    for(i = 1;i <= 8;i += 1){
        if(y+i<=8 && x-i >= 1){
            ix = x - i;
            iy = y + i;
            Movimiento[ix][iy] = true;
        }
    }
    //ArribaDerecha↑→
    for(i = 1;i <= 8;i += 1){
        if(y-i>=1 && x+i <= 8){
            ix = x + i;
            iy = y - i;
            Movimiento[ix][iy] = true;
        }
    }
    //AbajoDerecha→↓
    for(i = 1;i <= 8;i += 1){
        if(y+i<=8 && x+i <= 8){
            ix = x + i;
            iy = y + i;
            Movimiento[ix][iy] = true;
        }
    }
}
function Rey(x,y){
    if(seleccionado.Contenido == Piezas.BRey){
        if(x == 5 && y == 1){
            if(Tablero[8][1].Piezas == Piezas.BTorre){
                //0-0
                Movimiento[7][1] = true;
            }else if( Tablero[1][1].Piezas == Piezas.BTorre){
                //0-0-0
                Movimiento[3][1] = true;
            }
        }
    }else{
        if(x == 5 && y == 8){
            if(Tablero[8][8].Piezas == Piezas.NTorre){
                //0-0
                Movimiento[7][8] = true;
            }else if(Tablero[1][8].Piezas == Piezas.NTorre){
                //0-0-0
                Movimiento[3][8] = true;
            }
        }
    }
    let xx = x-1;
    let yy = y-1;
    //ArribaIzquierda↑←
    if(x-1 >= 1 && y-1 >= 1){Movimiento[xx][yy] = true;}
    //ArribaDerecha↑→
    xx=x+1;
    if(x+1 <= 8 && y-1 >= 1){Movimiento[xx][yy] = true;}
    //AbajoIzquierda↓←
    xx=x-1;
    yy=y+1;
    if(x-1 >= 1 && y+1 <= 8){Movimiento[xx][yy] = true;}
    //AbajoDerecha→↓
    xx=x+1;
    if(x+1 <= 8 && y+1 <= 8){Movimiento[xx][yy] = true;}
    //Abajo↓
    yy=y-1;
    if(y-1 >= 1){Movimiento[x][yy] = true;}
    //Izquierda←
    xx=x-1;
    if(x-1 >= 1){Movimiento[xx][y] = true;}
    //aribba↑
    yy=y+1;
    if(y+1 <= 8){Movimiento[x][yy] = true;}
    //Derecha→
    xx=x+1;
    if(x+1 <= 8){Movimiento[xx][y] = true;}
}
window.onresize = boardsize;

function muestrotablero(){

    console.table([ [Tablero[8][1].Piezas, Tablero[7][1].Piezas,Tablero[6][1].Piezas,Tablero[5][1].Piezas,Tablero[4][1].Piezas,Tablero[3][1].Piezas,Tablero[2][1].Piezas,Tablero[1][1].Piezas] ,
                    [Tablero[8][2].Piezas, Tablero[7][2].Piezas,Tablero[6][2].Piezas,Tablero[5][2].Piezas,Tablero[4][2].Piezas,Tablero[3][2].Piezas,Tablero[2][2].Piezas,Tablero[1][2].Piezas] ,
                    [Tablero[8][3].Piezas, Tablero[7][3].Piezas,Tablero[6][3].Piezas,Tablero[5][3].Piezas,Tablero[4][3].Piezas,Tablero[3][3].Piezas,Tablero[2][3].Piezas,Tablero[1][3].Piezas] ,
                    [Tablero[8][4].Piezas, Tablero[7][4].Piezas,Tablero[6][4].Piezas,Tablero[5][4].Piezas,Tablero[4][4].Piezas,Tablero[3][4].Piezas,Tablero[2][4].Piezas,Tablero[1][4].Piezas] ,
                    [Tablero[8][5].Piezas, Tablero[7][5].Piezas,Tablero[6][5].Piezas,Tablero[5][5].Piezas,Tablero[4][5].Piezas,Tablero[3][5].Piezas,Tablero[2][5].Piezas,Tablero[1][5].Piezas] ,
                    [Tablero[8][6].Piezas, Tablero[7][6].Piezas,Tablero[6][6].Piezas,Tablero[5][6].Piezas,Tablero[4][6].Piezas,Tablero[3][6].Piezas,Tablero[2][6].Piezas,Tablero[1][6].Piezas] ,
                    [Tablero[8][7].Piezas, Tablero[7][7].Piezas,Tablero[6][7].Piezas,Tablero[5][7].Piezas,Tablero[4][7].Piezas,Tablero[3][7].Piezas,Tablero[2][7].Piezas,Tablero[1][7].Piezas] ,
                    [Tablero[8][8].Piezas, Tablero[7][8].Piezas,Tablero[6][8].Piezas,Tablero[5][8].Piezas,Tablero[4][8].Piezas,Tablero[3][8].Piezas,Tablero[2][8].Piezas,Tablero[1][8].Piezas] ,
                    
    ]);
}