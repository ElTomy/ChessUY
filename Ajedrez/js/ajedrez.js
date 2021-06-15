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

function boardsize(){
    var width = window.innerWidth;
    var height = window.innerHeight;

    console.log(width);

    if(width > 900){
        var board_width = (90 * width) / 100;
        var board_wrapper = (60 * board_width) / 100;
        var board_margin2 = (5 * board_wrapper) / 100;
        var boardtotal_width = board_wrapper - (board_margin2 * 2);

        console.log('--------------');
        console.log('Ancho Maximo: ' + boardtotal_width);
        console.log('--------------');

        var board_height = ((98 * height) / 100) - 100;
        var board_margin = (5 * board_height) / 100;
        var boardtotal = board_height - (board_margin * 2);
        var cell_width = boardtotal / 8;
        console.log('--------------');
        console.log('Ancho: ' + board_width);
        console.log('Alto: ' + board_height);
        console.log('--------------');

        if(boardtotal >= boardtotal_width){
            console.log('--------------');
            console.log('Ancho Tablero: ' + boardtotal)
            console.log('¡Es Mayor!');
            console.log('--------------');

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
        console.log('--------------');
        console.log('Ancho: ' + board_width);
        console.log('Alto: ' + board_height);
        console.log('--------------');

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
        console.log(cell_height);
        $(".ajedrez-wrapper").css ('height', boardtotal);
        $(".ajedrez-wrapper").css ('width', boardtotal);
    }    
}
function PosicionPiezas(){
    for(let x = 1; x <= 8; x += 1){
        Tablero[x][2] ={
            Pieza: Piezas.BPeon,
        }
        Tablero[x][7] ={
            Pieza: Piezas.NPeon,
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
window.onresize = boardsize;