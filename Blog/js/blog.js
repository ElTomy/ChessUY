$(document).ready(function () {
    $.ajax({
        url: "php/noticias.php",
        success: function (response) {
            $('#noticias').html(response);
        }
    });
});

function noticia(id){
    location.href = id;
}