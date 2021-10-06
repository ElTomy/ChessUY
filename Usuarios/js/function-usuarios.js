function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contraseña').val();
    
    if(usuario == "" || contra == ""){
      $.ajax({
        url: "/cyberhydra/Modal/modal.php",
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
          location.href = "/cyberhydra/Index2.php";
      }else{
        var numero_mensaje = 1;

        $.ajax({
          url: "/cyberhydra/Modal/modal.php",
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
      url: "/cyberhydra/Form/PHP/cerrarSesion.php",
      type: "POST",
      success: function (data) {
        location.href = "/cyberhydra/index.php";
      }
  });
}
function enterLogin(){
  var inputU = document.getElementById("usuario");
      inputU.onkeypress = function(event){
          checkEnterPressedUser(this,event);
          event.cancelBubble = true;
          if(event.stopPropagation) event.stopPropagation();
       };

       function checkEnterPressedUser(obj, event){
        if(event.keyCode === 13){
         document.getElementById("contraseña").select();
        }
       }

       var inputC = document.getElementById("contraseña");
       inputC.onkeypress = function(event){
           checkEnterPressed(this,event);
           event.cancelBubble = true;
           if (event.stopPropagation) event.stopPropagation();
          };
   
          function checkEnterPressed(obj, event){
           if(event.keyCode === 13){
            log();
           }
          }
}
function estadisticasInicial(){
    let us = sessionStorage.getItem('usuario');
    let user = new Usuario();
    var est = user.comprueboEstadisticas(us);

    if(est == true){
      $.ajax({
        url: "/cyberhydra/Modal/modalELO.php",
        type: "POST",
        data: {},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
    });
    }else{
      $(".loader-wrapper").fadeOut("slow");
      $("#header").load("/cyberhydra/Page/header.php");
      $("#footer").load("/cyberhydra/Page/footer.html");
    }
}

function guardoESTI(x){
  let us = sessionStorage.getItem('usuario');
  let user = new Usuario();
  var guardo = user.guardoEST_I(us, x);
  //modal avisando que se guardo
  if(guardo == true){
    $(".modal").hide();
    $(".loader-wrapper").fadeOut("slow");
    $("#header").load("/cyberhydra/Page/header.php");
    $("#footer").load("/cyberhydra/Page/footer.html");
  }
}