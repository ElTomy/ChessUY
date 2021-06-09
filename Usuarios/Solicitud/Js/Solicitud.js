var len = 0;
var x = 0;
var ci, usr, nom, ape, ins, mai, tip;
$(document).ready(function () {
    $.ajax({
        type: "Post",
        url: "../Solicitud/PHP/Solicitud.php",
        success: function (response) {
            var solic = JSON.parse(response);
            while (x == 0) {
                if (solic[len].ci == null) {
                    x = 1;
                }
                ci = solic[len].ci;
                usr = solic[len].usuario;
                nom = solic[len].Nombre;
                ape = solic[len].apellido;
                ins = solic[len].Institucion;
                mai = solic[len].Mail;
                tip = solic[len].tipo;
                console.log(usr);
                document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr id="' + len + '"><td>' + ci + '</td> <td id="user' + len + '">' + usr + '</td> <td>' + nom + '</td> <td>' + ape + '</td> <td>' + ins + '</td> <td>' + mai + '</td> <td>' + tip + '</td><td><button onclick="aprobar(' + len + ',' + usr + ');">✓</button><button onclick="rechazar(' + len + ',' + "'" + usr + "'" + ');">✖</button></td></tr>';
                len++;
            }
        }
    });
});

function aprobar(data, usr) {
    console.log(data);
    alert("Usuario aprobado : " + usr);
}
function rechazar(data, usr) {
    console.log(data);
    alert("Usuario rechazado : " + usr);
    $.ajax({
        type: "Post",
        url: "../Solicitud/PHP/Rechazar.php",
        data: { usuario: usr },
        success: function (response) {
            console.log(response);
        }
    });
}