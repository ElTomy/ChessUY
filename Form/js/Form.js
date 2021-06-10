function TipoUsuario() {
    if (document.getElementById("option-1").checked == true) {
        tipo = 1;
    } else if (document.getElementById("option-2").checked == true) {
        tipo = 2;
    } else {
        tipo = 3;
    }
    location.href = "Register-Options";
    sessionStorage.setItem("tipo", tipo);
    alert(sessionStorage.getItem("tipo"));
}
    
function Register() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var institucion = $("#institucion").val();
    var año = $("#año").val();
    var nacimiento = $("#nacimiento").val();
    var cedula = $("#cedula").val();
    var celular = $("#celular").val();
    var usuario = $("#usuario").val();
    var email = $("#email").val();
    var contraseña = $("#contraseña").val();
    var tipousuario = sessionStorage.getItem("tipo");
    var numeros = /[0-9]/gi;
    var letras = /[A-Z]/gi;

    if(nombre == "" || apellido == "" || institucion == "" || año == "" || nacimiento == "" || cedula == "" || celular == "" || usuario == "" || email == "" || contraseña == ""){
        $.ajax({
            url: "/ChessUY/Modal/modal.php",
            type: "POST",
            data: { numero_mensaje: 7},
            success: function (data) {
                document.getElementById("modal").innerHTML = data;
            }
          });
    }else{
        if(contraseña.length > 8 && contraseña.match(numeros) && contraseña.match(letras)){            
            console.log(nombre);
            console.log(apellido);
            console.log(institucion);
            console.log(año);
            console.log(nacimiento);
            console.log(cedula);
            console.log(celular);
            console.log(usuario);
            console.log(email);
            console.log(contraseña);
            console.log(tipousuario);
        
            $.ajax({
                url: "PHP/Form.php",
                type: "POST",
                data: {
                tipo: tipousuario,
                nombre: nombre,
                apellido: apellido,
                institucion: institucion,
                año: año,
                nacimiento: nacimiento,
                cedula: cedula,
                celular: celular,
                usuario: usuario,
                email: email,
                contraseña: contraseña
                },
                success: function (data) {
                    var mensaje_modal;
        
                    if(data == 1){
                        mensaje_modal = 3;                
                    }
                    else if(data == 2){
                        mensaje_modal = 5; 
                    }
                    else if(data == 0){
                        mensaje_modal = 9;
                    }
                    $.ajax({
                        url: "/ChessUY/Modal/modal.php",
                        type: "POST",
                        data:{numero_mensaje: mensaje_modal},
                        success: function (modal){
                            document.getElementById("modal").innerHTML = modal;
                        }
                    });
                }
            });
        }
        else{
            $.ajax({
                url: "/ChessUY/Modal/modal.php",
                type: "POST",
                data: { numero_mensaje: 8},
                success: function (data) {
                    document.getElementById("modal").innerHTML = data;
                }
              });
        }
    
    }
}
function cerrar(){
    $("#modal").innerHTML = "";
}