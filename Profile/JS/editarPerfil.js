function guardar(usuario_actual){

    var Usuario = $('#Usuario').val();
    var Nombre = $('#Nombre').val();
    var Apellido = $('#Apellido').val();
    var Email = $('#Email').val();
    var Institucion = $('#Institucion').val();
    var Año = $('#Año').val();
    var Documento = $('#Documento').val();
    var Celular = $('#Celular').val();

    var numeros = /[0-9]/gi;
    var letras = /[A-Z]/gi;

    if(Nombre == "" || Apellido == "" || Institucion == "" || Año == "" || Documento == "" || Celular == "" || Usuario == "" || Email == ""){
        $.ajax({
            url: "/ChessUY/Modal/modal.php",
            type: "POST",
            data: { numero_mensaje: 7},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
          });
    }else if(Usuario.includes(".") || Usuario.includes("<") || Usuario.includes(">") || Usuario.includes("'") || Usuario.includes("(") || Usuario.includes(")")){
        $.ajax({
            url: "/ChessUY/Modal/modal.php",
            type: "POST",
            data: { numero_mensaje: 13},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
        });
    }else if(!Año.match(numeros) || Año > 6 || Año < 1){
        $.ajax({
            url: "/ChessUY/Modal/modal.php",
            type: "POST",
            data: { numero_mensaje: 10},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
          });
    }else if(!Documento.match(numeros) || Documento.match(letras) || !Celular.match(numeros) || Celular.match(letras)){
        $.ajax({
            url: "/ChessUY/Modal/modal.php",
            type: "POST",
            data: { numero_mensaje: 11},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
          });
    }else if(Documento.length != 8){
        $.ajax({
            url: "/ChessUY/Modal/modal.php",
            type: "POST",
            data: { numero_mensaje: 12},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
          });
    }else{
        $.ajax({
            type: "POST",
            url: "/ChessUY/Profile/PHP/guardar.php",
            data: {Usuario_Actual: usuario_actual, usuario: Usuario, nombre: Nombre, apellido: Apellido, email: Email, institucion: Institucion, año: Año, documento: Documento, celular: Celular},
            success: function (data) {
                console.log(data);
                if(data == 0){
                    location.href = "/ChessUY/Profile/Editar/" + Usuario;
                }else{
                    $.ajax({
                        url: "/ChessUY/Modal/modal.php",
                        type: "POST",
                        data: { numero_mensaje: 14},
                        success: function (data) {
                            document.getElementById("modal").innerHTML = data;
                        }
                      });
                }
                
            }
        });
    }
}

function contraseña(usuario){
    var contraActual = $('#ContraActual').val();
    var contraNueva = $('#ContraNueva').val();

    if(ContraActual == "" || ContraNueva == ""){
        $.ajax({
          url: "/ChessUY/Modal/modal.php",
          type: "POST",
          data: { numero_mensaje: 15},
          success: function (data) {
              document.getElementById("modal").innerHTML = data;
          }
        });
    }else{
        $.ajax({
            url: "/ChessUY/Profile/PHP/contraseña.php",
            type: "POST",
            data: { Usuario: usuario, ContraActual: contraActual, Contra: contraNueva},
            success: function (data) {
                if(data == 1){
                    $.ajax({
                        url: "/ChessUY/Modal/modal.php",
                        type: "POST",
                        data: { numero_mensaje: 16},
                        success: function (data) {
                            document.getElementById("modal").innerHTML = data;
                        }
                      });
                }else if(data == 0){
                    $.ajax({
                        url: "/ChessUY/Modal/modal.php",
                        type: "POST",
                        data: { numero_mensaje: 17},
                        success: function (data) {
                            document.getElementById("modal").innerHTML = data;
                        }
                      });
                }
            }
          });
    }
}

function eliminar(usuario){
    $('#modal').show();
    $.ajax({
        type: "POST",
        url: "/ChessUY/Modal/modalEliminarUsuario.php",
        data: {Usuario: usuario},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
    });
}

function borrar(usuario){
    $.ajax({
        type: "POST",
        url: "/ChessUY/Profile/PHP/borrar.php",
        data: {Usuario: usuario},
        success: function (response) {   
            $('#modal').hide();
            cargarJugadores();
        }
    });
}