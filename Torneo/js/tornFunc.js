var opt;

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

function cargAgen() {
    alert("Buenas");
    $("#agenTorn").load("../PHP/agenTorn.php");
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