<?php
/*
    Principiante -------------------->  600
    Aficionado ----------------------> 1500
    Semiprofecional -----------------> 1800
    Candidato a Maestro (CM) --------> 2200
    Maestro FIDE (MF) ---------------> 2300
    Maestro Internacional (MI) ------> 2400
    Gran Maestro (GM) ---------------> 2500
*/
    $modal = "  <div class='modal'>
                <div class='modal-wrapper'>
                    <div class='modal-logo'>
                        <img src='/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg' alt=''>
                    </div>
                    <div class='modal-content'>
                        <h1>Es tu primera vez por aquí</h1>
                        <hr>
                        <p>Que tan bueno te consideras?</p>
                        <div class='container'>
                        <div class='card'>
                            <button onclick='guardoESTI(1)'>Principiante</button> 
                            <button onclick='guardoESTI(2)'>Aficionado</button>
                            <button onclick='guardoESTI(3)'>Semiprofecional</button>
                            <button onclick='guardoESTI(4)'>Candidato a Maestro (CM)</button>
                            <button onclick='guardoESTI(5)'>Maestro FIDE (MF)</button>
                            <button onclick='guardoESTI(6)'>Maestro Internacional (MI)</button>
                            <button onclick='guardoESTI(7)'>Gran Maestro (GM)</button>
                        </div>
                        </div>

                    </div>
                </div>
            </div>";
echo $modal;
return $modal;

?>