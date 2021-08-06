$(document).ready(function () {
    armoLogros();
});

function armoLogros(){
    $.ajax({
        method: "POST",
        data: {Usuario: usuario},
        url: "PHP/armarLogrosPerfil.php",
        success: function (data) {
            $('#logros').html(data);
        }
    });
}