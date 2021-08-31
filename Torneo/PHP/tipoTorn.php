<?php
if(isset($_POST['opt'])) {
    $opt = $_POST['opt'];
}
//Codigo del Nombre
$nomTorn = '
<div class="nombreTorn">
    <p>Nombre del Torneo</p>
    <input type="text" id="nomDesc">
</div>
';

//Codigo de agenda
$agenHTML = '
<div class="calendar-wrapper">
    <div id="agenTorn" class="calendar">
    </div>
</div>
<div class="calendar-references">
    <div class="reference">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: red; margin: auto;"></div>
        Comienzo de las inscripciones
    </div>
    <div class="reference">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: orange; margin: auto;"></div>
        Fin de las inscripciones
    </div>
    <div class="reference">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: green; margin: auto;"></div>
        Comienzo del torneo
    </div>
</div>
';

//Codigo de los tiempos
$tiemHTML = '
<div class="tiempo">
    <p>Tiempo para descalificar</p>
    <input type="text" id="tempDesc">
</div>
<div class="tiempo">
    <p>Tiempo total por jugador</p>
    <input type="text" id="tempJug" required>
</div>
<div class="tiempo">
    <p>Cantidad de partidas por día</p>
    <input type="number" id="partDia" required>
</div>
';

//Codigo de opciones avanzadas
$avanHTML = '

<h1>Opciones avanzadas</h1>
<hr>
<div class="avanzada-wrapper">
    <div class="avanzada-left">
        <div class="limitar">
            <p style="width: 100%;">Limitar Jugadores</p>
            <input type="checkbox" id="siLim" value="siLim" onclick="quehacerRes()">
        </div>
        <div>
            <p style="width: 100%;">ELO maximo</p>
            <input type="number" id="eloMax">
        </div>
        <div>
            <p style="width: 100%;">ELO minimo</p>
            <input type="number" id="eloMin">
        </div>
        <div id="quehacerRes">
            
        </div>
    </div>

    <div class="avanzada-right">
        <div>
        <p style="width: 100%;">Localidad</p>
            <select id="locTorn">
                <option disabled selected>Selecciona una localidad</option>
                <option value="x">Cualquiera</option>
                <option value="mtv">Montevideo</option>
                <option value="can">Canelones</option>
                <option value="etc">etc.</option>
            </select>
        </div>
        <div>
            <p style="width: 100%;">Edad maxima</p>
            <input type="number" id="edaMax">
        </div>
        <div>
            <p style="width: 100%;">Edad minima</p>
            <input type="number" id="edaMin">
        </div>
    </div>
</div>

';
/*
    <div id="penultOpt" style="margin-top: 44%; width: 100%;">
    </div>
*/

//Codigo de premio
$premHTML = '
<p><i class="fas fa-gift"></i> Premio</p>
<input type="text" id="prem" required>
';

//Codigo para guardar y crear
$guCrHTML = '
<div class="torneo-buttons">
    <button onclick="envaPHP(1)"><i class="fas fa-save"></i> Guardar como preset</button>
    <button style="background-color: green" onclick="envaPHP(0)"><i class="fas fa-calendar-plus"></i> Crear</button>
</div>
';

if($opt == 'norm') {

    echo 
    '<div class="config-left">'
    .$nomTorn.'
        <div class="calendar-config">'.
//          Aca va la agenda
            $agenHTML
      .'</div>
        <div class="hora">
            <p><i class="fas fa-clock"></i> ¿A que hora debe cambiar?</p>
            <input id="hrCom" type="time">
        </div>
        <div class="tiempo-wrapper">'.
//          temp
            $tiemHTML
      .'</div>
    </div>
    <div class="config-right">
        <div class="advanced-wrapper">
            <p><i class="fas fa-ban"></i> Deshabilitado</p>
        </div>
        <div class="premio">'.
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
    
    echo 
    '<div class="config-left">'
    .$nomTorn.'
        <div class="calendar-config">'.
//          Aca va la agenda
            $agenHTML
      .'</div>
        <div class="tiempo-wrapper">'.
//          temp
            $tiemHTML
      .'</div>
    </div>
    <div class="config-right">
        <div class="config-avanzada">'.
//          Aca va la parte avanzada
            $avanHTML
      .'</div>
        <div class="premio">'.
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