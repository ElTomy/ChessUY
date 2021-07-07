function confTipo(opt) {
    opt = opt.value;
    $.ajax({
        type: "POST",
        url: "../PHP/tipoTorn.php",
        data: { opt:opt },
        success: function (html) {
            document.getElementById("hola").innerHTML = html;
        }
    });
}

function opcReser(reser) {
    reser = reser.value;
    $.ajax({
        type: "POST",
        url: "../PHP/resoNo.php",
        data: { reser:reser },
        success: function (html) {
            document.getElementById("penultOpt").innerHTML = html;
        }
    });
}


function cantFech(ultopt) {
    ultopt = ultopt.value;
    $.ajax({
        type: "POST",
        url: "../PHP/cantFech.php",
        data: { ultopt:ultopt },
        success: function (html) {
            document.getElementById("ultOpt").innerHTML = html;
        }
    });
}

function quehacerRes() {
    if(document.getElementById('siLim').checked) {
        $.ajax({
            url: "../PHP/quehacerRes.php",
            success: function (html) {
                $("#quehacerRes").html(html);
            }
        })
    }
}

function cargAgen() {
    $.ajax({
        url: "../PHP/agenTorn.php",
        success: function (html) {
            $("#agenTorn").html(html);
        }
    })
}

var date = new Date();
var month = date.getMonth();
var year = date.getFullYear();
var reserv = [];
var num = 0;

function resMes() {
    if (month > 0) {
        month = month - 1;
    } else {
        year = year -1;
        month = 11;
    }
    $.ajax({
        url: "../PHP/agenTorn.php",
        type: "post",
        data: {_month:month,_year:year},
        success: function (html) {
            $("#agenTorn").html(html);
        }
    })
}

function sumMes() {
    if (month < 11) {
        month = month + 1;
    } else {
        year = year + 1;
        month = 0;
    }
    $.ajax({
        url: "../PHP/agenTorn.php",
        type: "post",
        data: {_month:month,_year:year},
        success: function (html) {
            $("#agenTorn").html(html);
        }
    })
}

function guarFech(clicked_id) {
    var repe = false;
    for(var i=0;i<reserv.length;i++) {
            if(clicked_id == reserv[i]) {
                reserv.splice(i, 1);
                repe = true;
                num--;
            }
        }
    if(repe == false && num < 3) {
        reserv.push(clicked_id);
        num++;
    } else if(num == 3) {
        alert("Solo puede seleccionar 3 fechas");
    }
    if(num <= 3) {
        $.ajax({
            url: "../PHP/marcFech.php",
            type: "post",
            data: {reserv:reserv, num:num},
            success: function (styles) {
                $(".style").html(styles);
            }
        })
    }
}

function envaPHP() {
    opt = document.getElementById("tipTorn").value;
    if(opt == 'norm' || opt == 'avan') {
        var tempDesc = setVar('tempDesc', 'oblig');
        var tempJug = setVar('tempJug', 'oblig');
        var partDia = setVar('partDia', 'oblig');
        var prem = setVar('prem', 'oblig');
    }
    if(opt == 'avan') {
        var eloMax = setVar('eloMax', 'simple');
        var eloMin = setVar('eloMin', 'simple');
        var edaMax = setVar('edaMax', 'simple');
        var edaMin = setVar('edaMin', 'simple');
        var locTorn = setVar('locTorn', 'oblig')
        if(document.getElementById('siLim').checked) {
            var cantJug = setVar('cantJug', 'oblig');
            if($("#opcResList").prop("checked")) {
                if($("#limResCanti").prop("checked")) {
                    var cantRes = setVar('cantRes', 'oblig');
                    var fechRes = setVar('fechRes', 'def');
                } else if($("#limResFecha").prop("checked")) {
                    var fechRes = setVar('fechRes', 'oblig');
                    var cantRes = setVar('cantRes', 'def');
                } else {
                    alert("transf == false");
                }
            } else if($("#opcResTerm").prop("checked")) {
                var fechRes = setVar('fechRes', 'def');
                var cantRes = setVar('cantRes', 'def');
            } else {
                alert("manco 2");
            }
        } else {
            var cantJug = setVar('cantJug', 'def');
            var cantRes = setVar('cantRes', 'def');
            var fechRes = setVar('fechRes', 'def');
        }
    }

    console.log("Tiempo para descalificar: "+tempDesc);
    console.log("Tiempo total por jugador: "+tempJug);
    console.log("Cantidad de partidas por dia: "+partDia);
    console.log("ELO Maximo: "+eloMax);
    console.log("ELO Minimo: "+eloMin);
    console.log("Edad Maxima: "+edaMax);
    console.log("Edad Minima: "+edaMin);
    console.log("Cantidad de Jugadores: "+cantJug);
    console.log("Cantidad de reservas: "+cantRes);
    console.log("Premio: "+prem);
    console.log("Localidad: "+locTorn);
    console.log("Fecha de fin de reservas: "+fechRes);
}

function setVar(vari, modo) {
    if(modo == 'simple') {
        if(document.getElementById(vari).value == "") {
            vari = null;
        } else {
            vari = document.getElementById(vari).value;
        }
    }
    if(modo == 'oblig') {
        if(document.getElementById(vari).value == "") {
            alert("Faltan campos para " + vari);
            vari = null;
        } else {
            vari = document.getElementById(vari).value;
        }
    }
    if(modo == "def") {
        vari = null;
    }
    return (vari);
}