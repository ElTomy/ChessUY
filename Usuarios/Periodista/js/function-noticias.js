
 $(document).ready(function () {

    $('#RichText').richText();
    $('#RichText').val("<div>asd</div>")

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
    location.href = "/cyberhydra/Usuarios/Periodista/php/editarNoticia/" + id_noticia;
}

function eliminarNoticia(id_noticia){
    $('#modal').show();
    $.ajax({
        type: "POST",
        url: "/cyberhydra/Modal/modalEliminarNoticia.php",
        data: {ID: id_noticia},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
    });
}

function borrar(id_noticia){
    $.ajax({
        type: "POST",
        url: "php/borrar.php",
        data: {ID: id_noticia},
        success: function (response) {
            location.href = "/cyberhydra/Blog/Blog.html";
        }
    });
}

function guardar(usuario, id, imagen){

    var titulo = $('#titulo-text').text();
    var subtitulo = $('#subtitulo-text').text();
    var contenido = CKEDITOR.instances.contenido.getData();

    console.log(usuario)
    console.log(id)
    console.log(titulo)
    console.log(subtitulo)
    console.log(contenido)
    console.log(imagen)

    $.ajax({
        type: "POST",
        url: "../editar.php",
        data: {Usuario: usuario, Id: id, Titulo: titulo, Descripcion: subtitulo, Informacion: contenido, img: imagen},
        success: function (response) {

            location.href = "/cyberhydra/Blog/" + id;

        }
    });
}

function crear(usuario){

    var titulo = $('#titulo-input').val();
    var subtitulo = $('#subtitulo-input').val();
    let contenido = CKEDITOR.instances.contenido.getData();

    var form_data = new FormData();  // Create a FormData object

    var files = $('#pic')[0].files;

    console.log(contenido)

    if(titulo == ""|| subtitulo == "" || contenido == "" || files.length == 0){

        $.ajax({
            type: "POST",
            url: "/cyberhydra/Modal/modal.php",
            data: { numero_mensaje: 18},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
        });

    }else{

        form_data.append('file', files[0]);  // Append all element in FormData  object
        form_data.append('Titulo', titulo);
        form_data.append('Subtitulo', subtitulo);
        form_data.append('Contenido', contenido);
        form_data.append('Autor', usuario);

        $.ajax({
            type        : "POST",
            url         : "/cyberhydra/Usuarios/Periodista/PHP/crear.php",
            data        : form_data,
            cache       : false,
            dataType    : 'text',
            contentType : false,
            processData : false,

            success: function (response) {
                console.log(response);

                $.ajax({
                    type: "POST",
                    url: "/cyberhydra/Modal/modal.php",
                    data: { numero_mensaje: 19},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                });
            }
        });
    }
}
 