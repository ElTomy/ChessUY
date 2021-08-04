$(document).ready(function () {
    armoLogros();
});

function armoLogros(){
    $.ajax({
        url: "PHP/armarLogrosPerfil.php",
        success: function (data) {
            $('#logros').html(data);
        }
    });
}