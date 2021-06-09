function TipoUsuario() {
    if (document.getElementById("option-1").checked == true) {
        tipo = "1";
    } else if (document.getElementById("option-2").checked == true) {
        tipo = "2";
    } else {
        tipo = "3";
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
        location.href = "PHP/Form.php";
        }
    });
}