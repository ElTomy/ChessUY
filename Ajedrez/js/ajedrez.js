$( document ).ready(function(){
    CreoTablero();
    PosicionPiezas();
    resetMovimientos();
    armoAjedrez();
    
});
//
//
/*------------------------------------------------------------------------------------------*/
//
//
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
var simbolo = null;
const Tablero = [];
var seleccionado = null;
var  Movimiento = [];
var Enroque = [];
Enroque[1] = {
    x: null,
    y: null,
    p: null,
    q: null,
    Simbolo: null,
    Piezas: null,
    Color: null,
}
Enroque[2] = {
    x: null,
    y: null,
    p: null,
    q: null,
    Simbolo: null,
    Piezas: null,
    Color: null,
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
//
//
/*------------------------------------------------------------------------------------------*/
//
//
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
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function seleccionar(x,y){
    var sel;
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
        if(Movimiento[x][y] == true && Tablero[x][y].color != seleccionado.color){
          
           if((seleccionado.Contenido == "p"||seleccionado.Contenido == "pn")&&(y == 1||y == 8)){
                sel= seleccionado.Contenido;
                Coronacion(x,y,sel);
                simbolo = "=";
                if(Tablero[x][y].Piezas != null){
                    simbolo = simbolo + ",x";
                }
                    Jugadas[Turno] = {
                        Piezas: seleccionado.Contenido,
                        color: seleccionado.color,
                        Ejex: x,
                        Ejey: y,
                        simbolo: simbolo,
                    }
               }else{
                   if(Tablero[x][y].Piezas != null){
                    simbolo = simbolo + "x";
                    Jugadas[Turno] = {
                        Piezas: seleccionado.Contenido,
                        color: seleccionado.color,
                        Ejex: x,
                        Ejey: y,
                        simbolo: "x",
                    }
                   }else{
                       if(Enroque[1].Piezas != null || Enroque[2].Piezas != null){
                        let ax;
                        let p;
                           if(x == 7){
                            ax = Enroque[1].x;
                            p = Enroque[1].p;
                           }else{
                            ax = Enroque[2].x;
                            p = Enroque[2].p;
                           }
                        let ay = Enroque.y;
                        let q = Enroque.q;
                        Tablero[ax][ay] = {
                            Piezas: null,
                            color: null,
                            Ejex: ax,
                            Ejey: ay,
                        }
                        Tablero[p][q] = {
                            Piezas: Enroque.Piezas,
                            color: Enroque.Color,
                            Ejex: p,
                            Ejey: q,
                        };
                        simbolo = Enroque.Simbolo;
                       }
                    Jugadas[Turno] = {
                        Piezas: seleccionado.Contenido,
                        color: seleccionado.color,
                        Ejex: x,
                        Ejey: y,
                        simbolo: simbolo,
                    }
                   }
                    Tablero[x][y] = {
                        Piezas: seleccionado.Contenido,
                        color: seleccionado.color,
                        Ejex: x,
                        Ejey: y,
                    }
               }
            Tablero[seleccionado.Ejex][seleccionado.Ejey] = {
                Piezas: null,
                color: null,
                Ejex: seleccionado.Ejex,
                Ejey: seleccionado.Ejey,
            }
            simbolo = null;
            Turno = Turno + 1;
           
            armoAjedrez();
        }else{
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
        console.log(Jugadas);
        sel= seleccionado.Contenido;
        seleccionado = null;
        Enroque[1,2] = {
            x: null,
            y: null,
            p: null,
            q: null,
            Simbolo: null,
            Piezas: null,
            Color: null,
        }
        muestrotablero();
        resetMovimientos(); 
        Jaque(x,y, sel);
        armoAjedrez();
      
    }
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
}}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function Peon(x,y, sel){
    var xx = x + 1;
    var yy;
    if(sel == undefined){
        selecc = seleccionado.Contenido;
    }else{
        selecc = sel;
    }
    if(selecc == Piezas.BPeon){
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
            //movimiento: comer-d
            if(Tablero[xx][yy].Piezas != null){
                comer(xx,yy,selecc);
            }
        }
        xx = x -1;
        if(xx>=1){
            //movimiento: comer-i
           if(Tablero[xx][yy].Piezas != null){
            comer(xx,yy,selecc);
           }
         }}
        
    }else{
        if(selecc == Piezas.NPeon){
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
                //movimiento: comer-d
                if(Tablero[xx][yy].Piezas != null){
                    comer(xx,yy,selecc);
                }
             }
             xx = x -1;
             if(xx>=1){
                
                //movimiento: comer-i
               if(Tablero[xx][yy].Piezas != null){
                comer(xx,yy,selecc);
               }
             }}
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
   if(selecc == Piezas.BRey){
        if(x == 5 && y == 1){
            if(Tablero[8][1].Piezas == Piezas.BTorre){
                //0-0
                comer(7,1,selecc);
                Enroque[1] = {
                    x: 8,
                    y: 1,
                    p: 6,
                    q: 1,
                    Simbolo:"0-0",
                    Piezas: Piezas.BTorre,
                    Color: Color.Blanco,
                } 
            }
            if( Tablero[1][1].Piezas == Piezas.BTorre){
                //0-0-0
                comer(3,1,selecc);
                Enroque[2] = {
                    x: 1,
                    y: 1,
                    p: 4,
                    q: 1,
                    Simbolo:"0-0-0",
                    Piezas: Piezas.BTorre,
                    Color: Color.Blanco,
                }
            }
        }
    }else{
        if(x == 5 && y == 8){
            if(Tablero[8][8].Piezas == Piezas.NTorre){
                //0-0
                comer(7,8,selecc);
                Enroque[1] = {
                    x: 8,
                    y: 8,
                    p: 6,
                    q: 8,
                    Simbolo:"0-0",
                    Piezas: Piezas.NTorre,
                    Color: Color.Negro,
                }
            }
            if(Tablero[1][8].Piezas == Piezas.NTorre){
                //0-0-0
                comer(3,8,selecc);
                Enroque[2] = {
                    x: 1,
                    y: 8,
                    p: 4,
                    q: 8,
                    Simbolo:"0-0-0",
                    Piezas: Piezas.NTorre,
                    Color: Color.Negro,
                }
            }
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
    if(col == Color.Negro){
        Tablero[x][y] = {
            Piezas: Piezas.NDama,
            color: col,
            Ejex: x,
            Ejey: y,
        }
    }else{
        Tablero[x][y] = {
            Piezas: Piezas.BDama,
            color: col,
            Ejex: x,
            Ejey: y,
        }
    }
 
}
window.onresize = boardsize;

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
 
    let i;
    let ix;
    let iy;
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
var jaque;
function Jaque(x,y, sel){
   
    // llamo a movimiento para generar movimiento en nueva posicion
    Movimientos(x,y, sel);
 
    if(sel=="tn" || sel=="cn" || sel=="an" || sel=="dn" || sel=="rn" || sel=="pn"){
        var colorR = "r";
        var color = "b";
    }else{
        var colorR = "rn";
        var color = "n";
    }
    for(var p = 1; p <= 8; p++){
        for(var q = 1; q <= 8; q++){
            if(Movimiento[p][q] == true){
                if(Tablero[p][q].Piezas == colorR){
                    console.log("JAQUE")
                    simbolo = "+";
                    if(Tablero[x][y].Piezas != null){
                        simbolo = simbolo + ",x";
                    }
                    jaque = true;
                    var a = p;
                    var b = q;
                    Jugadas[Turno] = {
                        Piezas: sel,
                        color: color,
                        Ejex: x,
                        Ejey: y,
                        simbolo: simbolo,
                    }
                    break;
             }
            }
        }  
       }
       
       //comprobar jaquemate
       //if(jaque == true){
       //     JaqueMate(a,b,sel);
       //}
       if(jaque == true){
            //JaqueMate(a,b,sel, x,y, colorR);
        }
       resetMovimientos();

}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function SalirJaque(){
  //metodo tomy
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function JaqueMate(a,b,sel, x,y, colorR){
    console.log(sel, x, y, colorR)
    let i;
    let ix;
    let iy;
    let xx = x-2;
    let yy = y-1;

    if(colorR =='r'){
        var  op = [
            "p",
            "t",
            "c",
            "a",
            "d"
          ];
    }else{
        var  op = [
            "pn",
            "tn",
            "cn",
            "an",
            "dn"
          ];
    }
   
    switch(sel){
        case Piezas.NTorre:
        case Piezas.BTorre:
               
        break;
        case Piezas.NCaballo:
        case Piezas.BCaballo:
            console.log("caballo")
                //Caballo
                //←↑
                if (x-2>=1 && y-1>=1) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(1,"("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }} 
                yy = y+1;
                //←↓
                if (x-2>=1 && y+1<=8) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(2, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }}
                yy = y+2;
                xx = x-1;
                //↓←
                if (x-1>=1 && y+2<=8) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(3, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }} 
                xx = x+1;
                //↓→
                if (x+1<=8 && y+2<=8) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(4, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }} 
                xx = x+2;
                yy = y+1;
                //→↓
                if (x+2<=8 && y+1<=8) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(5, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }}
                yy = y-1;
                //→↑
                if (x+2<=8 && y-1>=1) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(6, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }} 
                yy = y-2;
                xx = x+1;
                //↑→
                if (x+1<=8 && y-2>=1) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(7, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }} 
                xx = x-1;
                //↑←
                if (x-1>=1 && y-2>=1) {if(Tablero[xx][yy].Piezas == colorR){
                    console.log(8, "("+xx +","+ yy +")", "("+x +","+ y +")")
                    pX = x;
                    pY = y;
                }}

                //peon
    
                for(var p = 1; p <= 8; p++){
                    for(var q = 1; q <= 8; q++){
                        if(Tablero[p][q].Piezas == op[0]){
                            //Peon(p,q, op[0])
                           
                            //if(Movimientos[pX][pY] == true){
           
          //                  }
                           
                    }}}
    
        break;
        case Piezas.NAlfil:
        case Piezas.BAlfil:
                
        break;
        case Piezas.NPeon:
        case Piezas.BPeon:
               
        break;
        case Piezas.NDama:
        case Piezas.BDama:
                
        break;
        case Piezas.NRey:
        case Piezas.BRey:
             
        break;}
   
}
//
//
/*------------------------------------------------------------------------------------------*/
//
//
function muestrotablero(){
    console.table([ [Tablero[1][1].Piezas, Tablero[2][1].Piezas,Tablero[3][1].Piezas,Tablero[4][1].Piezas,Tablero[5][1].Piezas,Tablero[6][1].Piezas,Tablero[7][1].Piezas,Tablero[8][1].Piezas] ,
                    [Tablero[1][2].Piezas, Tablero[2][2].Piezas,Tablero[3][2].Piezas,Tablero[4][2].Piezas,Tablero[5][2].Piezas,Tablero[6][2].Piezas,Tablero[7][2].Piezas,Tablero[8][2].Piezas] ,
                    [Tablero[1][3].Piezas, Tablero[2][3].Piezas,Tablero[3][3].Piezas,Tablero[4][3].Piezas,Tablero[5][3].Piezas,Tablero[6][3].Piezas,Tablero[7][3].Piezas,Tablero[8][3].Piezas] ,
                    [Tablero[1][4].Piezas, Tablero[2][4].Piezas,Tablero[3][4].Piezas,Tablero[4][4].Piezas,Tablero[5][4].Piezas,Tablero[6][4].Piezas,Tablero[7][4].Piezas,Tablero[8][4].Piezas] ,
                    [Tablero[1][5].Piezas, Tablero[2][5].Piezas,Tablero[3][5].Piezas,Tablero[4][5].Piezas,Tablero[5][5].Piezas,Tablero[6][5].Piezas,Tablero[7][5].Piezas,Tablero[8][5].Piezas] ,
                    [Tablero[1][6].Piezas, Tablero[2][6].Piezas,Tablero[3][6].Piezas,Tablero[4][6].Piezas,Tablero[5][6].Piezas,Tablero[6][6].Piezas,Tablero[7][6].Piezas,Tablero[8][6].Piezas] ,
                    [Tablero[1][7].Piezas, Tablero[2][7].Piezas,Tablero[3][7].Piezas,Tablero[4][7].Piezas,Tablero[5][7].Piezas,Tablero[6][7].Piezas,Tablero[7][7].Piezas,Tablero[8][7].Piezas] ,
                    [Tablero[1][8].Piezas, Tablero[2][8].Piezas,Tablero[3][8].Piezas,Tablero[4][8].Piezas,Tablero[5][8].Piezas,Tablero[6][8].Piezas,Tablero[7][8].Piezas,Tablero[8][8].Piezas] ,
                    
    ]);
}