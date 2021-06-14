$( document ).ready(function(){
    boardsize();
});


function boardsize(){
    var width = window.innerWidth;
    var height = window.innerHeight;


    var board_width = (90 * width) / 100;

    var boardgrid_width = (60 * board_width) / 100;
    var boardgrid_height = ((98 * height) / 100) - 100;

    var boardmargin_width = (5 * boardgrid_width) / 100;
    var boardmargin_height = (5* boardgrid_height) / 100;
    

    var boardtotal_width = boardgrid_width - boardmargin_width;
    var boardtotal_height = boardgrid_height - boardmargin_height;

    var column_width = boardtotal_width / 8;
    var cell_height = column_width * 8;

    var cellmax_height = boardtotal_height / 8;
    var cellmax_width = boardtotal_width / 8;

    $(".cell").css ('width', column_width);
    $(".cell").css ('height', column_width);

    if(cell_height > boardtotal_height || cell_height == boardtotal_height){
        $(".ajedrez").css ('width', boardtotal_height);
        
        $(".cell").css ('width', cellmax_height);
        $(".cell").css ('height', cellmax_height);
    }

    console.log('Height: ' + height);
    console.log('Board Total Width: ' + boardtotal_width);
    console.log('Board Total Height: ' + boardtotal_height);
    
}
window.onresize = boardsize;