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
        data: {Tablero:Tablero, Movimiento:Movimiento, Jugadas:Jugadas ,Turno:Turno},
        success: function (data) {
            document.getElementById("ArmoAjedrez").innerHTML = data;
            boardsize();
        }
    });
 }
 const Color = {
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
var Jugadas = [];
var Turno = 1;
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
            color: Color.Blanco,
            Ejex: x,
            Ejey: 2,
        }
        Tablero[x][7] ={
            Piezas: Piezas.NPeon,
            color: Color.Negro,
            Ejex: x,
            Ejey: 7,
        }  
    }
    Tablero[1][1] ={
        Piezas: Piezas.BTorre,
        color: Color.Blanco,
        Ejex: 1,
        Ejey: 1,
    }
    Tablero[1][8] ={
        Piezas: Piezas.NTorre,
        color: Color.Negro,
        Ejex: 1,
        Ejey: 8,
    }
    Tablero[2][1] ={
        Piezas: Piezas.BCaballo,
        color: Color.Blanco,
        Ejex: 2,
        Ejey: 1,
    }
    Tablero[2][8] ={
        Piezas: Piezas.NCaballo,
        color: Color.Negro,
        Ejex: 2,
        Ejey: 8,
    }
    Tablero[3][1] ={
        Piezas: Piezas.BAlfil,
        color: Color.Blanco,
        Ejex: 3,
        Ejey: 1,
    }
    Tablero[3][8] ={
        Piezas: Piezas.NAlfil,
        color: Color.Negro,
        Ejex: 3,
        Ejey: 8,
    }
    Tablero[4][1] ={
        Piezas: Piezas.BDama,
        color: Color.Blanco,
        Ejex: 4,
        Ejey: 1,
    }
    Tablero[4][8] ={
        Piezas: Piezas.NDama,
        color: Color.Negro,
        Ejex: 4,
        Ejey: 8,
    }
    Tablero[5][1] ={
        Piezas: Piezas.BRey,
        color: Color.Blanco,
        Ejex: 5,
        Ejey: 1,
    }
    Tablero[5][8] ={
        Piezas: Piezas.NRey,
        color: Color.Negro,
        Ejex: 5,
        Ejey: 8,
    }
    Tablero[6][1] ={
        Piezas: Piezas.BAlfil,
        color: Color.Blanco,
        Ejex: 6,
        Ejey: 1,
    }
    Tablero[6][8] ={
        Piezas: Piezas.NAlfil,
        color: Color.Negro,
        Ejex: 6,
        Ejey: 8,
    }
    Tablero[7][1] ={
        Piezas: Piezas.BCaballo,
        color: Color.Blanco,
        Ejex: 7,
        Ejey: 1,
    }
    Tablero[7][8] ={
        Piezas: Piezas.NCaballo,
        color: Color.Negro,
        Ejex: 7,
        Ejey: 8,
    }
    Tablero[8][1] ={
        Piezas: Piezas.BTorre,
        color: Color.Blanco,
        Ejex: 8,
        Ejey: 1,
    }
    Tablero[8][8] ={
        Piezas: Piezas.NTorre,
        color: Color.Negro,
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
                color: null,
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
                color: Tablero[x][y].color,
            }
            Movimientos();
            armoAjedrez();
        }
    }else{
        if(Movimiento[x][y] == true && Tablero[x][y].color != seleccionado.color){
           if((seleccionado.Contenido == "p"||seleccionado.Contenido == "pn")&&(y == 1||y == 8)){
                Coronacion(x,y);
                console.log("coronacion")
                Jugadas[Turno] = {
                    Piezas: seleccionado.color,
                    color: seleccionado.color,
                    Ejex: x,
                    Ejey: y,
                    simbolo: "=",
                }
           }else{
               if(Tablero[x][y].Piezas != null){
                Jugadas[Turno] = {
                    Piezas: seleccionado.color,
                    color: seleccionado.color,
                    Ejex: x,
                    Ejey: y,
                    simbolo: "x",
                }
               }
                Tablero[x][y] = {
                    Piezas: seleccionado.Contenido,
                    color: seleccionado.color,
                    Ejex: x,
                    Ejey: y,
                }
                Jugadas[Turno] = {
                    Piezas: seleccionado.color,
                    color: seleccionado.color,
                    Ejex: x,
                    Ejey: y,
                    simbolo: null,
                }
           }
            Tablero[seleccionado.Ejex][seleccionado.Ejey] = {
                Piezas: null,
                color: null,
                Ejex: seleccionado.Ejex,
                Ejey: seleccionado.Ejey,
            }
            //muestrotablero();
            Turno = Turno + 1;
            armoAjedrez();
        }else{
            if(Tablero[x][y] != null){
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
        seleccionado = null;
        resetMovimientos(); 
        armoAjedrez();
      
    }
}
function Movimientos(){

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
        if(y == 2 && Tablero[x][4].Piezas == null && Tablero[x][yy].Piezas == null){
            comer(x,4);
        }
         //movimiento: 1-adelante
         if(Tablero[x][yy].Piezas == null){
            comer(x,yy);
         }
        if(xx<=8){
            //movimiento: comer-d
            if(Tablero[xx][yy].Piezas != null){
                comer(xx,yy);
            }
        }
        xx = x -1;
        if(xx>=1){
            
            //movimiento: comer-i
           if(Tablero[xx][yy].Piezas != null){
            comer(xx,yy);
           }
         }
        
    }else{
        if(seleccionado.Contenido == Piezas.NPeon){
            yy = y-1;
            //movimiento: 2-adelante
            if(y == 7 && Tablero[x][5].Piezas == null && Tablero[x][yy].Piezas == null){
                comer(x,5);
            }
             //movimiento: 1-adelante
             if(Tablero[x][yy].Piezas == null){
                comer(x,yy);
             }
             if(xx<=8){
                //movimiento: comer-d
                if(Tablero[xx][yy].Piezas != null){
                    comer(xx,yy);
                }
             }
             xx = x -1;
             if(xx>=1){
                
                //movimiento: comer-i
               if(Tablero[xx][yy].Piezas != null){
                comer(xx,yy);
               }
             }
    }
}
}
function Torre(x,y){
    let i;
   //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y);
                break;
            }else{
                comer(ix,y);
            }
        }
    }
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y);
                break;
            }else{
                comer(ix,y);
            }
        }
    }   
    //arriba
    for(i = 1; i <= 8; i++){
        if(y-i>=1){
            iy = y - i;
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy);
                break;
            }else{
                comer(x,iy);
            }
        } }
   //abajo↓
    for(i = 1;i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy);
                break;
            }else{
                comer(x,iy);
            }
        }
    }
    
}
function Caballo(x,y){
    let xx = x-2;
    let yy = y-1;
    //La primera flecha significa 2 para ese lado y la segunda solo 1
    //←↑
    if (x-2>=1 && y-1>=1) {comer(xx,yy);}
    yy = y+1;
    //←↓
    if (x-2>=1 && y+1<=8) {comer(xx,yy);}
    yy = y+2;
    xx = x-1;
    //↓←
    if (x-1>=1 && y+2<=8) {comer(xx,yy);}
    xx = x+1;
    //↓→
    if (x+1<=8 && y+2<=8) {comer(xx,yy);}
    xx = x+2;
    yy = y+1;
    //→↓
    if (x+2<=8 && y+1<=8) {comer(xx,yy);}
    yy = y-1;
    //→↑
    if (x+2<=8 && y-1>=1) {comer(xx,yy);}
    yy = y-2;
    xx = x+1;
    //↑→
    if (x+1<=8 && y-2>=1) {comer(xx,yy);}
    xx = x-1;
    //↑←
    if (x-1>=1 && y-2>=1) {comer(xx,yy);}
}
function Alfil(x,y){
    let ix;
    let iy;
    let i;
    //ArribaIzquierda↑←
    for(i = 1; i <= 8; i++){
        if(y-i>=1 && x-i >= 1){
            ix = x - i;
            iy = y - i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy);
                break;
            }else{
                comer(ix,iy);
            }
        }
    }    
    //AbajoIzquierda↓←
    for(i = 1;i <= 8; i++){
        if(y+i<=8 && x-i >= 1){
            ix = x - i;
            iy = y + i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy);
               break;
            }else{
                comer(ix,iy);
            }
        }
    }    
    //ArribaDerecha↑→
    for(i = 1;i <= 8; i++){
        if(y-i>=1 && x+i <= 8){
            ix = x + i;
            iy = y - i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy);
                break;
            }else{
                comer(ix,iy);
            }
        }
    }   
    //AbajoDerecha→↓
    for(i = 1;i <= 8; i++){
        if(y+i<=8 && x+i <= 8){
            ix = x + i;
            iy = y + i;
            if(Tablero[ix][iy].Piezas != null){
                comer(ix,iy);
                break;
            }else{
                comer(ix,iy);
            }
        }
    }    
    
}
function Dama(x,y){
   let i;
   let ix;
   let iy;
    //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y);
                break;
            }else{
                comer(ix,y);
            }
        }
    }
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                comer(ix,y);
                break;
            }else{
                comer(ix,y);
            }
        }
    }   
    //arriba
    for(i = 1; i <= 8; i++){
        if(y-i>=1){
            iy = y - i;
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy);
                break;
            }else{
                comer(x,iy);
            }
        } }
   //abajo↓
    for(i = 1;i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                comer(x,iy);
                break;
            }else{
                comer(x,iy);
            }
        }
    }
//ArribaIzquierda↑←
for(i = 1; i <= 8; i++){
    if(y-i>=1 && x-i >= 1){
        ix = x - i;
        iy = y - i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy);
            break;
        }else{
            comer(ix,iy);
        }
    }
}    
//AbajoIzquierda↓←
for(i = 1;i <= 8; i++){
    if(y+i<=8 && x-i >= 1){
        ix = x - i;
        iy = y + i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy);
           break;
        }else{
            comer(ix,iy);
        }
    }
}    
//ArribaDerecha↑→
for(i = 1;i <= 8; i++){
    if(y-i>=1 && x+i <= 8){
        ix = x + i;
        iy = y - i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy);
            break;
        }else{
            comer(ix,iy);
        }
    }
}   
//AbajoDerecha→↓
for(i = 1;i <= 8; i++){
    if(y+i<=8 && x+i <= 8){
        ix = x + i;
        iy = y + i;
        if(Tablero[ix][iy].Piezas != null){
            comer(ix,iy);
            break;
        }else{
            comer(ix,iy);
        }
    }
}    
}
function Rey(x,y){
   if(seleccionado.Contenido == Piezas.BRey){
        if(x == 5 && y == 1){
            if(Tablero[8][1].Piezas == Piezas.BTorre){
                //0-0
                comer(7,1);
            }else if( Tablero[1][1].Piezas == Piezas.BTorre){
                //0-0-0
                comer(3,1);
            }
        }
    }else{
        if(x == 5 && y == 8){
            if(Tablero[8][8].Piezas == Piezas.NTorre){
                //0-0
                comer(7,8);
            }else if(Tablero[1][8].Piezas == Piezas.NTorre){
                //0-0-0
                comer(3,8);
            }
        }
    }
    let xx = x-1;
    let yy = y-1;
    //ArribaIzquierda↑←
    if(x-1 >= 1 && y-1 >= 1){comer(xx,yy);}
    //ArribaDerecha↑→
    xx=x+1;
    if(x+1 <= 8 && y-1 >= 1){comer(xx,yy);}
    //AbajoIzquierda↓←
    xx=x-1;
    yy=y+1;
    if(x-1 >= 1 && y+1 <= 8){comer(xx,yy);}
    //AbajoDerecha→↓
    xx=x+1;
    if(x+1 <= 8 && y+1 <= 8){comer(xx,yy);}
    //Abajo↓
    yy=y-1;
    if(y-1 >= 1){comer(x,yy);}
    //Izquierda←
    xx=x-1;
    if(x-1 >= 1){comer(xx,y);}
    //aribba↑
    yy=y+1;
    if(y+1 <= 8){comer(x,yy);}
    //Derecha→
    xx=x+1;
    if(x+1 <= 8){comer(xx,y);}

    JR();
}
function comer(x,y){
    if(Tablero[x][y].color != seleccionado.color){
        Movimiento[x][y] = true;
    }
}
function Coronacion(x,y){
    if(seleccionado.color == Color.Negro){
        Tablero[x][y] = {
            Piezas: Piezas.NDama,
            color: seleccionado.color,
            Ejex: x,
            Ejey: y,
        }
    }else{
        Tablero[x][y] = {
            Piezas: Piezas.BDama,
            color: seleccionado.color,
            Ejex: x,
            Ejey: y,
        }
    }
}
window.onresize = boardsize;

function JR(){
    for(var p = 1; p <= 8; p++){
        for(var q = 1; q <= 8; q++){
            if(Movimiento[p][q] == true){
                JaqueRey(p,q);
            }  
        }}
}
function JaqueRey(x, y){
 
    let i;
    let ix;
    let iy;
    let xx = x-2;
    let yy = y-1;

    if(seleccionado.color == "n"){
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
    if (x-2>=1 && y-1>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} // o algo para marcar
    yy = y+1;
    //←↓
    if (x-2>=1 && y+1<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}}// o algo para marcar
    yy = y+2;
    xx = x-1;
    //↓←
    if (x-1>=1 && y+2<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} // o algo para marcar
    xx = x+1;
    //↓→
    if (x+1<=8 && y+2<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} // o algo para marcar
    xx = x+2;
    yy = y+1;
    //→↓
    if (x+2<=8 && y+1<=8) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}}// o algo para marcar
    yy = y-1;
    //→↑
    if (x+2<=8 && y-1>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} // o algo para marcar
    yy = y-2;
    xx = x+1;
    //↑→
    if (x+1<=8 && y-2>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}} // o algo para marcar
    xx = x-1;
    //↑←
    if (x-1>=1 && y-2>=1) {if(Tablero[xx][yy].Piezas == colorC){Movimiento[x][y] = null}}// o algo para marcar;
    
    //----------------------------------------------------------------------------------
    //Torre y Reina
    //derecha→
    for(i = 1;i <= 8; i++){
        ix  = i +x;
        if(ix <= 8){
            if(Tablero[ix][y].Piezas != null){
                if(Tablero[ix][y].Piezas == colorD ||Tablero[ix][y].Piezas == colorT){
                    Movimiento[x][y] = null
                }
                break;
            }else{
                if(Tablero[ix][y].Piezas == colorD ||Tablero[ix][y].Piezas == colorT){
                    Movimiento[x][y] = null
                   
                }
            }
        }
    }
    
    //izquierda
    for(i = 1; i <= 8; i++){
        if( x-i >= 1){
            ix = x - i;
            if(Tablero[ix][y].Piezas != null){
                if(Tablero[ix][y].Piezas == colorD ||Tablero[ix][y].Piezas == colorT){
                    Movimiento[x][y] = null
                }
                break;
            }else{
                if(Tablero[ix][y].Piezas == colorD ||Tablero[ix][y].Piezas == colorT){
                    Movimiento[x][y] = null
                }
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
                }
                break;
            }else{
                if(Tablero[x][iy].Piezas == colorD ||Tablero[x][iy].Piezas == colorT){
                    Movimiento[x][y] = null
                }
            }
        } }
        
   //abajo↓
    for(i = 1;i <= 8; i++){
        iy  = i +y;
        if(iy <= 8){
            if(Tablero[x][iy].Piezas != null){
                if(Tablero[x][iy].Piezas == colorD ||Tablero[x][iy].Piezas == colorT){
                    Movimiento[x][y] = null 
                }
                break;
            }else{
                if(Tablero[x][iy].Piezas == colorD ||Tablero[x][iy].Piezas == colorT){
                    Movimiento[x][y] = null
                }
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
            }
            break;
        }else{
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
            }
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
            }
            break;
        }else{
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
            }
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
            }
            break;
        }else{
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
            }
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
            }
            break;
        }else{
            if(Tablero[ix][iy].Piezas == colorD ||Tablero[ix][iy].Piezas == colorA){
                Movimiento[x][y] = null
            }
        }
    }
}   

  //----------------------------------------------------------------------------------
    //Peon y Rei
    xx = x-1;
    yy = y-1;
    //ArribaIzquierda↑←
    if(x-1 >= 1 && y-1 >= 1){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //ArribaDerecha↑→
    xx=x+1;
    if(x+1 <= 8 && y-1 >= 1){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //AbajoIzquierda↓←
    xx=x-1;
    yy=y+1;
    if(x-1 >= 1 && y+1 <= 8){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //AbajoDerecha→↓
    xx=x+1;
    if(x+1 <= 8 && y+1 <= 8){if(Tablero[xx][yy].Piezas == colorP || Tablero[xx][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //Abajo↓
    yy=y-1;
    if(y-1 >= 1){if(Tablero[x][yy].Piezas == colorP || Tablero[x][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //Izquierda←
    xx=x-1;
    if(x-1 >= 1){if(Tablero[xx][y].Piezas == colorP || Tablero[xx][y].Piezas == colorR){Movimiento[x][y] = null}}
    //aribba↑
    yy=y+1;
    if(y+1 <= 8){if(Tablero[x][yy].Piezas == colorC || Tablero[x][yy].Piezas == colorR){Movimiento[x][y] = null}}
    //Derecha→
    xx=x+1;
    if(x+1 <= 8){if(Tablero[xx][y].Piezas == colorC || Tablero[xx][y].Piezas == colorR){Movimiento[x][y] = null}}

}

function Jaque(){

    //comprobar jaquemate
    //JaqueMate();
}
function JaqueMate(){
    //compruebo movimientos del rey
    //JaqueRey
}
/*function muestrotablero(){
    console.table([ [Tablero[1][1].Piezas, Tablero[2][1].Piezas,Tablero[3][1].Piezas,Tablero[4][1].Piezas,Tablero[5][1].Piezas,Tablero[6][1].Piezas,Tablero[7][1].Piezas,Tablero[8][1].Piezas] ,
                    [Tablero[1][2].Piezas, Tablero[2][2].Piezas,Tablero[3][2].Piezas,Tablero[4][2].Piezas,Tablero[5][2].Piezas,Tablero[6][2].Piezas,Tablero[7][2].Piezas,Tablero[8][2].Piezas] ,
                    [Tablero[1][3].Piezas, Tablero[2][3].Piezas,Tablero[3][3].Piezas,Tablero[4][3].Piezas,Tablero[5][3].Piezas,Tablero[6][3].Piezas,Tablero[7][3].Piezas,Tablero[8][3].Piezas] ,
                    [Tablero[1][4].Piezas, Tablero[2][4].Piezas,Tablero[3][4].Piezas,Tablero[4][4].Piezas,Tablero[5][4].Piezas,Tablero[6][4].Piezas,Tablero[7][4].Piezas,Tablero[8][4].Piezas] ,
                    [Tablero[1][5].Piezas, Tablero[2][5].Piezas,Tablero[3][5].Piezas,Tablero[4][5].Piezas,Tablero[5][5].Piezas,Tablero[6][5].Piezas,Tablero[7][5].Piezas,Tablero[8][5].Piezas] ,
                    [Tablero[1][6].Piezas, Tablero[2][6].Piezas,Tablero[3][6].Piezas,Tablero[4][6].Piezas,Tablero[5][6].Piezas,Tablero[6][6].Piezas,Tablero[7][6].Piezas,Tablero[8][6].Piezas] ,
                    [Tablero[1][7].Piezas, Tablero[2][7].Piezas,Tablero[3][7].Piezas,Tablero[4][7].Piezas,Tablero[5][7].Piezas,Tablero[6][7].Piezas,Tablero[7][7].Piezas,Tablero[8][7].Piezas] ,
                    [Tablero[1][8].Piezas, Tablero[2][8].Piezas,Tablero[3][8].Piezas,Tablero[4][8].Piezas,Tablero[5][8].Piezas,Tablero[6][8].Piezas,Tablero[7][8].Piezas,Tablero[8][8].Piezas] ,
                    
    ]);
}*/