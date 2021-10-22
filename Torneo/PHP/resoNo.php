<?php

if(isset($_POST['reser'])) {
    $reser = $_POST['reser'];
}

if($reser == "listRes") {
    echo '
    <form>
        <input type="radio" name="rad2res" id="limResCanti" value="canti" onchange="cantFech(this)">
        <label for="html" data-lang="amount-reserves">Cantidad de reservas</label><br>
        <input type="radio" name="rad2res" id="limResFecha" value="fecha" onchange="cantFech(this)">
        <label for="css" data-lang="end-date-reserves">Fecha de fin de reservas</label><br>
    </form>
<div id="ultOpt" style="width: 100%; margin-top: 5%;">
</div>
';
} elseif($reser == "termInsc") {

} else {
    echo 'Hubo un error';
}

?>