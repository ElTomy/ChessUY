<?php
if(isset($_POST['ultopt'])) {
    $ultopt = $_POST['ultopt'];
}
if($ultopt == "canti") {
    echo '
    <input type="number" id="cantRes">
    ';
} elseif($ultopt == "fecha") {
    echo '
    <input type="date" id="fechRes">
    ';
} else {
    echo 'Hubo un error';
}
?>