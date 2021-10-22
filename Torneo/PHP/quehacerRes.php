<?php

echo '
<div style="margin-bottom: 5%;">
    <p style="width: 100%;" data-lang="amount-of-players">Cantidad de Jugadores</p>
    <input type="number" id="cantJug">
</div>
<p style="width: 100%; margin-bottom: 5%;" data-lang="what-to-do-max-players">Que hacer cuando se llega al maximo de jugadores:</p>
<div class="option-wrapper">
    <input type="radio" name="radRes" id="opcResList" value="listRes" onchange="opcReser(this)">
    <label for="listRes" data-lang="reserve-list">Lista de reservas</label><br>
    <input type="radio" name="radRes" id="opcResTerm" value="termInsc" onchange="opcReser(this)">
    <label for="termInsc" data-lang="finish-insc">Terminar inscripciones</label><br>
</div>
';

?>