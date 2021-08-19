
 $(document).ready(function () {

    /*

        Editar Titulo

    */
     
    $("#titulo-editar").click(function() {

        // Guardo el contenido del titulo.

        var content = $('#titulo-text').text();
        $('#titulo-text').hide();

        // Pongo el contenido en el input.
        $('#titulo-input').val(content);
        $('#titulo-input').show();

        // Cambio los botones.

        $('#titulo-editar').hide();
        $('#titulo-guardar').show();

    });

    $('#titulo-guardar').click(function(){
        // Guardo el contenido del input.

        var content = $('#titulo-input').val();
        $('#titulo-input').hide();

        // Pongo el contenido en el input.
        $('#titulo-text').text(content);
        $('#titulo-text').show();

        // Cambio los botones.

        $('#titulo-editar').show();
        $('#titulo-guardar').hide();
    });

    /*

        Editar Subtitulo
        
    */

        $("#subtitulo-editar").click(function() {

            // Guardo el contenido del titulo.
    
            var content = $('#subtitulo-text').text();
            $('#subtitulo-text').hide();
    
            // Pongo el contenido en el input.
            $('#subtitulo-input').val(content);
            $('#subtitulo-input').show();
    
            // Cambio los botones.
    
            $('#subtitulo-editar').hide();
            $('#subtitulo-guardar').show();
    
        });
        $('#subtitulo-guardar').click(function(){
            // Guardo el contenido del input.
    
            var content = $('#subtitulo-input').val();
            $('#subtitulo-input').hide();
    
            // Pongo el contenido en el input.
            $('#subtitulo-text').text(content);
            $('#subtitulo-text').show();
    
            // Cambio los botones.
    
            $('#subtitulo-editar').show();
            $('#subtitulo-guardar').hide();
        });
 });

function editar(id_noticia){
    location.href = "/ChessUY/Usuarios/Periodista/php/editarNoticia.php";
}

