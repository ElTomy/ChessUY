$(document).ready(function () {
    armoLogros();
});

function armoLogros(){
    $.ajax({
        url: "../PHP/armoLogros.php",
        success: function (data) {
            $('#logros').html(data);
        }
    });
}