function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contraseña').val();
    
    if(usuario == "" || contra == ""){
      $.ajax({
        url: "/ChessUY/Modal/modal.php",
        type: "POST",
        data: { numero_mensaje: 6},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
      });
    }else{
      let user = new Usuario();
      var log = user.login(usuario, contra);
      
        if(log == true){
          var tipo = sessionStorage.getItem("tipo");
          var mensaje;
          switch (tipo) {
            case "0": //admin
              console.log('logeado admin');
              mensaje = 4;
              //location.href ="";
              
              break;
            case "1": //jugador
              console.log('logeado jugador');
              mensaje = 4;
              
              //location.href ="";
              break;
            case "2": //arbitro
              console.log('logeado arbitro');
              mensaje = 4;
              //location.href ="";
              break;
            case "3": //periodista
              console.log('logeado periodista');
              mensaje = 4;
              //location.href ="";
              break;
              default:
                console.log('error');
          }
          location.href = "/ChessUY/Index";
      }else{
        var numero_mensaje = 1;

        $.ajax({
          url: "/ChessUY/Modal/modal.php",
          type: "POST",
          data: { numero_mensaje: numero_mensaje},
          success: function (data) {
              document.getElementById("modal").innerHTML = data;
          }
      });
      }
    }
}
function cerrar(){
  document.getElementById("modal").innerHTML = "";
}
function cerrarSesion(){
  $.ajax({
      url: "/ChessUY/Form/PHP/cerrarSesion.php",
      type: "POST",
      success: function (data) {
        location.href = "/ChessUY/Index";
      }
  });
}