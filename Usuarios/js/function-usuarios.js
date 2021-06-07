function log(){
    var usuario=$('#usuario').val();
    var contra=$('#Contraseña').val();
    if(usuario == "" || contra == ""){
      alert("Debe completar todos los campos");
    }else{
      let user = new Usuario();
      var log = user.login(usuario, contra);
      if(log == 1){
        //location.href ="";
        console.log("logeado");
      }else{
          alert("El usuario o contraseña que ingreso es incorrecto");
      }
    }
}