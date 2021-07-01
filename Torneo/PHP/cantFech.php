<?php

if(isset($_POST['ultopt'])) {
    $ultopt = $_POST['ultopt'];
}

if($ultopt == "canti") {
    echo '

    <input type="number" name="cantRes">

    ';
} elseif($ultopt == "fecha") {
    echo '
    
    <input type="date" name="fechRes">
    
    ';
} else {
    echo 'Hubo un error';
}


?>