$( document ).ready(function(){
    boardsize();
});


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
window.onresize = boardsize;