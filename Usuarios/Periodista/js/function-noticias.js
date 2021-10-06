
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

function prueba(usuario){

    
    var titulo = $('#titulo-text').text();
    var subtitulo = $('#subtitulo-text').text();
    var contenido = $('#RichText').val();
    
    $.ajax({
        type: "POST",
        url: "editar.php",
        data: {Usuario: usuario, Titulo: titulo, Subtitulo: subtitulo, Informacion: contenido, img: img},
        success: function (response) {
            location.reload();
        }
    });

    alert(sessionValue);
}

function crear(usuario){
    var titulo = $('#titulo-input').val();
    var subtitulo = $('#subtitulo-input').val();
    var contenido = $('#RichText').val();
    var imagen = "Por ahora no hay.";

    if(titulo == ""|| subtitulo == "" || contenido == "<div><br></div>"){
        console.log("hola");
        $.ajax({
            type: "POST",
            url: "/cyberhydra/Modal/modal.php",
            data: { numero_mensaje: 18},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
        });
    }else{
        $.ajax({
            type: "POST",
            url: "/cyberhydra/Usuarios/Periodista/PHP/crear.php",
            data: {Usuario: usuario, Titulo: titulo, Descripcion: subtitulo, Informacion: contenido, img: imagen},
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


/*var fileobj;
function upload_file(e,tipo) {
    e.preventDefault();
    if(tipo==1 || tipo==2){

      fileobj = e.dataTransfer.files[0];
      ajax_file_upload(fileobj,tipo);

    }else{

      e.preventDefault();

      if (e.dataTransfer.items) {
        // Use DataTransferItemList interface to access the file(s)
        for (var i = 0; i < e.dataTransfer.items.length; i++) {
          // If dropped items aren't files, reject them
          if (e.dataTransfer.items[i].kind === 'file') {
            var file = e.dataTransfer.items[i].getAsFile();
            ajax_file_upload(file,tipo);
          }
        }
      } else {

        // Uso DataTransfer a los archivos 
        for (var i = 0; i < e.dataTransfer.files.length; i++) {
          var file = e.dataTransfer.items[i].getAsFile();
            ajax_file_upload(file,tipo);
        }

      } 
      
    }  
}

function ajax_file_upload(file_obj,tipo) {
    if(file_obj != undefined) {
        var form_data = new FormData(); 
        var idp = $("#user").data("idp");
        form_data.append('file', file_obj);
        form_data.append('id',idp);
        form_data.append('tipo',tipo);//tipo 1 es imagen principal, se graba en datosProyecto la url
        $.ajax({
            type: 'POST',
            url: '/cyberhydra/Usuarios/Periodista/imagenes_noticias/uploadIMG.php',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(msg) {
                $('#selectfile').val('');
                //TraigoFoto(idp,tipo);
            }
        });
    }
}

function TraigoFoto(idp, tipo){
 
    $.ajax({
        type: 'POST',
        url: '/cyberhydra/Usuarios/Periodista/imagenes_noticias/downloadIMG.php',
        data: {idp: idp, tipo: tipo},
        success:function(msg) {
          
          if(tipo==1){
            $('#fprincipal').html(msg);
          }
          if(tipo==2){
            $('#fbanner').html(msg);
          } 
          if(tipo==3){
            $('#fsecundarias').html("");
            $('#fsecundarias').append(msg);
          }
            
        }
    });
}*/
 