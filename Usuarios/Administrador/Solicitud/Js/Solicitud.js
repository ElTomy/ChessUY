var len = 0;
var x = 0;
var y = true;
var ci, usr, nom, ape, ins, mai, tip, año, con, nac, pas;
$(document).ready(function () {
    $(".Solicitudes-wrapper").hide();
    $(".nohaysolicitudes-wrapper").hide();
    $.ajax({
        type: "Post",
        url: "/ChessUY/Usuarios/Administrador/Solicitud/PHP/Solicitud.php",
        success: function (response) {

            var solic = JSON.parse(response);
            while(y) {
                if (typeof solic[len] === 'undefined') {
                    y = false;
                } else {
                    ci = solic[len].ci;
                    usr = solic[len].usuario;
                    nom = solic[len].Nombre;
                    ape = solic[len].apellido;
                    ins = solic[len].Institucion;
                    mai = solic[len].Mail;
                    tip = solic[len].tipo;
                    año = solic[len].año;
                    con = solic[len].Contacto;
                    nac = solic[len].Nacimiento;
                    pas = solic[len].Contraseña;
                    if(tip==3){
                        tip = "Periodista";
                    }else{
                        tip = "Arbitro";
                    }
                    document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td>' + ci + '</td> <td id="user' + len + '">' + usr + '</td> <td>' + nom + '</td> <td>' + ape + '</td> <td>' + ins + '</td> <td>' + mai + '</td> <td>' + tip + '</td><td><div class="botones-solicitudes"><button id="aprobar" onclick="aprobar(' + len + ',' + "'" + ci + "'" + ',' + "'" + usr + "'" + ',' + "'" + nom + "'" + ',' + "'" + ape + "'" + ',' + "'" + ins + "'" + ',' + "'" + mai + "'" + ',' + "'" + tip + "'" + ',' + "'" + año + "'" + ',' + "'" + con + "'" + ',' + "'" + nac + "'" + ',' + "'" + pas + "'" + ');">✓</button><button id="rechazar" onclick="rechazar(' + len + ',' + "'" + usr + "'" + ',' + "'" + nom + "'" +  ',' + "'" + mai + "'" +');">✖</button></div></td>';
                    len++;
                    x = 1;
                }
            }
            if(x == 0){
                $(".Solicitudes-wrapper").hide();
                $(".nohaysolicitudes-wrapper").show();
                $("#nohaysolicitudes").show();
            }else{
                $(".Solicitudes-wrapper").css("display", "flex");
                $("#nohaysolicitudes").hide();
            }
        }
        
    });
});

function aprobar(data, ci, usr, nom, ape, ins, mai, tip, año, con, nac, pas) {
    if(tip == 'Periodista'){
        var tipp = 3;
    }else if(tip == 'Arbitro'){
        var tipp = 2
    }
    $.ajax({
        type: "Post",
        url: "Usuarios/Administrador/Solicitud/PHP/Aprobar.php",
        data: { ci: ci, usuario: usr, nombre: nom, apellido: ape, institucion: ins, mail: mai, tipo: tipp, año: año, contacto: con, nacimiento: nac, contraseña: pas },
        success: function (response) {
        }
    });
}
function rechazar(data, usr, nom,mai) {
    $.ajax({
        type: "Post",
        url: "Usuarios/Administrador/Solicitud/PHP/Rechazar.php",
        data: { usuario: usr, nombre: nom ,mail:mai},
        success: function (response) {
        }
    });
}