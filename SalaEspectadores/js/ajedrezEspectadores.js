/**
 * Con la ID traigo la info de la bd y armo:
 * 
 * tablero
 * jugadores
 * movimientos
 * turno
 * tiempo
 * 
 * y hago el INIT
 * 
 */
 $( document ).ready(function(){
   console.log(sessionStorage.getItem('id_partido'))
   //traigo la info de un partido
   $.ajax({
    async: false,
    url:  "/ChessUY/SalaEspectadores/php/cargoPartido.php",
    type: "POST",
    data: {},
    success: function (data) {
        
        //:Veo si habian quedado en jaque
        $.ajax({
            url:  "/ChessUY/SalaEspectadores/php/traigoJaque.php",
            type: "POST",
            data: {numJugador:numJugador},
            success: function (data) {
                tjaque = JSON.parse(data);
                jaque = tjaque;
            }
          });
    }
  });
});

function traigoTableroEspectadores(){
    $.ajax({
        url:  "/ChessUY/Ajedrez/php/traigoTablero.php",
        type: "POST",
        data: {},
        success: function (data) {
           var dat = JSON.parse(data);

           var jug2 = JSON.parse(dat[0]['movimientos'])
           for(var p = 1; p <= jug2.length; p++){
               Jugadas[p] = jug2[p];
           }

           
           if(numJugador == 1){
            if(dat[0]['turno'] == 1){
                inviertoTablero(dat[0]['tablero']);
            }else if(dat[0]['turno']%2 == 0){
                var tab = JSON.parse(dat[0]['tablero']);
                for(var p = 1; p <= 8; p++){
                    for(var q = 1; q <= 8; q++){
                        Tablero[p][q] = tab[p][q];
                    }
                }
    
            }else{
                inviertoTablero(dat[0]['tablero']);
                
            }
    }else{
            if(dat[0]['turno']%2 == 0){
                inviertoTablero(dat[0]['tablero']);
                
            }else{
                var tab = JSON.parse(dat[0]['tablero']);
                for(var p = 1; p <= 8; p++){
                    for(var q = 1; q <= 8; q++){
                        Tablero[p][q] = tab[p][q];
                    }
                }
            }
    }
         
            armoAjedrez();
        }
      });
}