<?php

if(isset($_POST['opt'])) {
    $opt = $_POST['opt'];
}

//Codigo de agenda
$agenHTML = '
<div style="width: 60%; height: 100%;">
    <div style="width: 98%; height: 78%; border: solid grey; border-width: 1px; border-radius: 20px; padding: 1%;">
        AGENDA
    </div>
    <div style="width: 98%; height: 16%; padding: 4% 0% 0% 0%; text-align: center;">
        <p>A que hora debe cambiar?</p>
        <input type="time">
    </div>
</div>
<div style="width: 38%; height: 100%; padding: 2%;">
    <div style="width: 100%; height: 26.6%; text-align: center;">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: red; margin: auto;"></div>
        Comienzo de las inscripciones
    </div>
    <div style="width: 100%; height: 26.6%; text-align: center;">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: orange; margin: auto;"></div>
        Fin de las inscripciones
    </div>
    <div style="width: 100%; height: 26.6%; text-align: center;">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: green; margin: auto;"></div>
        Comienzo del torneo
    </div>
</div>
';

//Codigo de los tiempos
$tiemHTML = '
<div>
    Tiempo para descalificar
    <input type="text" name="tempDesc" required>
</div>
<div>
    Tiempo total por jugador
    <input type="text" name="tempJug" required>
</div>
<div>
    Cantidad de partidas por dia
    <input type="number" name="partDia" required>
</div>
';

//Codigo de opciones avanzadas
$avanHTML = '

<p style="height: 10%; width: 100%;">Opciones avanzadas
<div style="display: flex; height: 90%; width: 100%;">
    <div style=" width: 50%; height: 100%;">
        <div style="margin-bottom: 5%;">
            <p style="width: 100%;">Cantidad de Jugadores</p>
            <input type="number" name="cantJug">
        </div>
        <div>
            <p style="width: 100%;">ELO maximo</p>
            <input type="number" name="eloMax">
        </div>
        <div>
            <p style="width: 100%;">ELO minimo</p>
            <input type="number" name="eloMin">
        </div>
        <div style="margin-top: 10%; width: 100%;">
            <p style="width: 100%; margin-bottom: 5%;">Que hacer cuando se llega al maximo de jugadores</p>
            <input type="radio" name="opcRes" value="listRes" onchange="opcReser(this)">
            <label for="listRes">Lista de reservas</label><br>
            <input type="radio" name="opcRes" value="termInsc" onchange="opcReser(this)">
            <label for="termInsc">Terminar inscripciones</label><br>
        </div>
    </div>

    <div style="width: 50%; height: 100%;">
        <div style="margin-bottom: 5%;">
        <p style="width: 100%;">Localidad</p>
            <select name="locTorn" id="locTorn">
                <option disabled selected>Selecciona una localidad</option>
                <option value="x">Cualquiera</option>
                <option value="mtv">Montevideo</option>
                <option value="can">Canelones</option>
                <option value="etc">etc.</option>
            </select>
        </div>
        <div>
            <p style="width: 100%;">Edad maxima</p>
            <input type="number" name="edaMax">
        </div>
        <div>
            <p style="width: 100%;">Edad minima</p>
            <input type="number" name="edaMin">
        </div>
        <div id="penultOpt" style="margin-top: 27%; width: 100%;">
        </div>
    </div>
</div>

';

//Codigo de premio
$premHTML = '
Premio
<input type="text" name="prem" required>
';

//Codigo para guardar y crear
$guCrHTML = '
<button>Guardar</button>
<input type="submit" value="Crear">
';

if($opt == 'norm') {

    echo '
    <div style="width: 50%; height: 100%;">
        <div style="height: 68%; border-radius: 20px; padding: 1%; display: flex;">'.
//          Aca va la agenda
            $agenHTML
      .'</div>
        <div style="height: 28%; border-radius: 20px; padding: 1%;">'.
//          temp
            $tiemHTML
      .'</div>
    </div>
    <div style="width: 50%; height: 100%;">
        <div style="height: 58%; background-color: rgba(255, 0, 0, 0.1); text-align: center; color: grey; border-radius: 20px; padding: 1%;">
            (deshabilitado)
        </div>
        <div style="height: 18%; border-radius: 20px; padding: 1%;">'.
//          Premio
            $premHTML
      .'</div>
        <div style="height: 18%; border-radius: 20px; padding: 1%;">'.
//          Guardar/Crear
            $guCrHTML
      .'</div>
    </div>

    ';

} elseif($opt == 'avan') {
    
    echo '
    <div style="width: 50%; height: 100%;">
        <div style="height: 68%; border-radius: 20px; padding: 1%; display: flex;">'.
//          Aca va la agenda
            $agenHTML
      .'</div>
        <div style="height: 28%; border-radius: 20px; padding: 1%;">'.
//          temp
            $tiemHTML
      .'</div>
    </div>
    <div style="width: 50%; height: 100%;">
        <div style="height: 58%; border-radius: 20px; padding: 1%;">'.
//          Aca va la parte avanzada
            $avanHTML
      .'</div>
        <div style="height: 18%; border-radius: 20px; padding: 1%;">'.
//          Premio
            $premHTML
      .'</div>
        <div style="height: 18%; border-radius: 20px; padding: 1%;">'.
//          Guardar/Crear
            $guCrHTML
      .'</div>
    </div>

    ';

} elseif($opt == 'pres') {
    echo 'Tendriamos que ver la BD';
} else {
    echo 'Hubo un error';
}

?>