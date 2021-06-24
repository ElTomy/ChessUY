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