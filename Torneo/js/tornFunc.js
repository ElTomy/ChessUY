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