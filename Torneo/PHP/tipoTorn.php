<?php

if(isset($_POST['opt'])) {
    $opt = $_POST['opt'];
}

if($opt == 'norm') {
    echo 'Esta seria la configuracion normal';
} elseif($opt == 'avan') {
    echo 'Esta seria la configuracion avanzada';
} elseif($opt == 'pres') {
    echo 'Tendriamos que ver la BD';
}

?>