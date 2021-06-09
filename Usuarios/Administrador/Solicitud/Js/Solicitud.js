var len = 0;
var x = 0;
var ci, usr, nom, ape, ins, mai, tip, año, con, nac, pas;
$(document).ready(function () {
    $.ajax({
        type: "Post",
        url: "../Solicitud/PHP/Solicitud.php",
        success: function (response) {
            var solic = JSON.parse(response);
            while (x <= 0) {
                if (solic[len].ci == null) {
                    x = 1;
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
                    document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td>' + ci + '</td> <td id="user' + len + '">' + usr + '</td> <td>' + nom + '</td> <td>' + ape + '</td> <td>' + ins + '</td> <td>' + mai + '</td> <td>' + tip + '</td><td><button onclick="aprobar(' + len + ',' + "'" + ci + "'" + ',' + "'" + usr + "'" + ',' + "'" + nom + "'" + ',' + "'" + ape + "'" + ',' + "'" + ins + "'" + ',' + "'" + mai + "'" + ',' + "'" + tip + "'" + ',' + "'" + año + "'" + ',' + "'" + con + "'" + ',' + "'" + nac + "'" + ',' + "'" + pas + "'" + ');">✓</button><button onclick="rechazar(' + len + ',' + "'" + usr + "'" + ',' + "'" + nom + "'" +  ',' + "'" + mai + "'" +');">✖</button></td>';
                    len++;
                }
            }
        }
    });
});

function aprobar(data, ci, usr, nom, ape, ins, mai, tip, año, con, nac, pas) {
    $.ajax({
        type: "Post",
        url: "../Solicitud/PHP/Aprobar.php",
        data: { ci: ci, usuario: usr, nombre: nom, apellido: ape, institucion: ins, mail: mai, tipo: tip, año: año, contacto: con, nacimiento: nac, contraseña: pas },
        success: function (response) {
            console.log(response);
        }
    });
}
function rechazar(data, usr, nom,mai) {
    $.ajax({
        type: "Post",
        url: "../Solicitud/PHP/Rechazar.php",
        data: { usuario: usr, nombre: nom ,mail:mai},
        success: function (response) {
            console.log(response);
        }
    });
}