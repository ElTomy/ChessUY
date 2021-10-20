<?php
include '../../../servidor.php';
$servidor = new servidor();

if(isset($_POST['Autor'], $_POST['Titulo'], $_POST['Subtitulo'], $_POST['Contenido'])){

    $Titulo = $_POST['Titulo'];
    $Subtitulo = $_POST['Subtitulo'];
    $Contenido = $_POST['Contenido'];
    $Autor = $_POST['Autor'];

}

if(isset($_FILES['file']['name'])){

    $Imagen = '/cyberhydra/Usuarios/Periodista/imagenes_noticias/' . $_FILES['file']['name'];

    if ( $_FILES['file']['error'] > 0 ){
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../imagenes_noticias/' . $_FILES['file']['name']))
        {
            $funciona = true;
        }
    }
}else{
    echo "No Funca che.";
}

if($funciona == true){
    $noticia = $servidor->CrearNoticia($Autor, $Titulo, $Subtitulo, $Contenido, $Imagen);

    echo "Noticia: " . $noticia;
}
?>