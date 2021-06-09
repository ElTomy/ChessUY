function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contraseña').val();
    
    if(usuario == "" || contra == ""){
      alert("Debe completar todos los campos");
    }else{
      let user = new Usuario();
      var log = user.login(usuario, contra);
      
        if(log == true){
          var tipo = sessionStorage.getItem("tipo");
          switch (tipo) {
            case "0": //admin
              console.log('logeado admin');
              //location.href ="";
              break;
            case "1": //jugador
              console.log('logeado jugador');
              //location.href ="";
              break;
            case "2": //arbitro
              console.log('logeado arbitro');
              //location.href ="";
              break;
            case "3": //periodista
              console.log('logeado periodista');
              //location.href ="";
              break;
              default:
                console.log('error');
          }
      }else{
          alert("El usuario o contraseña que ingreso es incorrecto");
      }
    }
}