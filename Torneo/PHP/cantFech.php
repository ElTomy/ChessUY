<?php

if(isset($_POST['ultopt'])) {
    $ultopt = $_POST['ultopt'];
}

if($ultopt == "canti") {
    echo '

    <input type="number">

    ';
} elseif($ultopt == "fecha") {
    echo '
    
    <input type="date">
    
    ';
} else {
    echo 'Hubo un error';
}


?>