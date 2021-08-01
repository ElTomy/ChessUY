class Torneo{
        constructor(Fecha_inicio, Fecha_fin, eloMin, eloMax, cantJug, tiempo, tempDesc, partDia, cantRes, locTorn, edaMin, edaMax, comTorn, finInsc, comInsc, hrCom){
        this.Fecha_inicio=Fecha_inicio;
        this.Fecha_fin=Fecha_fin;
        this.eloMin=eloMin;
        this.eloMax=eloMax;
        this.cantJug=cantJug;
        this.tiempo=tiempo;
        this.tempDesc=tempDesc;
        this.partDia=partDia;
        this.cantRes=cantRes;
        this.locTorn=locTorn;
        this.edaMin=edaMin;
        this.edaMax=edaMax;
        this.comTorn=comTorn;
        this.finInsc=finInsc;
        this.comInsc=comInsc;
        this.hrCom=hrCom;
    }
    get Fi(){
        return this.Fecha_inicio;
    }
    set Fi(x){
        this.Fecha_inicio=x;
    }
    get Ff(){
        return this.Fecha_fin;
    }
    set Ff(x){
        this.Fecha_fin=x;
    }
    get ELOminimo(){
        return this.eloMin;
    }
    set ELOminimo(x){
        this.eloMin=x;
    }
    get ELOmaximo(){
        return this.eloMax;
    }
    set ELOmaximo(x){
        this.eloMax=x;
    }
    get cantidadJugadores(){
        return this.cantJug;
    }
    set cantidadJugadores(x){
        this.cantJug=x;
    }
    get time(){
        return this.tiempo;
    }
    set time(x){
        this.tiempo=x;
    }
    get tiempoDesc(){
        return this.tempDesc;
    }
    set tiempoDesc(x){
        this.tempDesc=x;
    }
    get partidasDia(){
        return this.partDia;
    }
    set partidasDia(x){
        this.partDia=x;
    }
    get cantidadRes(){
        return this.cantRes;
    }
    set cantidadRes(x){
        this.cantRes=x;
    }
    get locali(){
        return this.locTorn;
    }
    set locali(x){
        this.locTorn=x;
    }
    get edadmin(){
        return this.edaMin;
    }
    set edadmin(x){
        this.edaMin=x;
    }
    get edadmax(){
        return this.edaMax;
    }
    set edadmax(x){
        this.edaMax=x;
    }
    get comienzoTorneo(){
        return this.comTorn;
    }
    set comienzoTorneo(x){
        this.comTorn=x;
    }
    get finInscripciones(){
        return this.finInsc;
    }
    set finInscripciones(x){
        this.finInsc=x;
    }
    get comienzoInscripciones(){
        return this.comInsc;
    }
    set comienzoInscripciones(x){
        this.comInsc=x;
    }
    get horacomienzo(){
        return this.hrCom;
    }
    set horacomienzo(x){
        this.hrCom=x;
    }
}
//---------------------------------
function confTipo(opt) {
    opt = opt.value;
    $.ajax({
        type: "POST",
        url: "/ChessUY/Torneo/PHP/tipoTorn.php",
        data: { opt:opt },
        success: function (html) {
            document.getElementById("hola").innerHTML = html;
        }
    });
}

function opcReser(reser) {
    reser = reser.value;
    $.ajax({
        type: "POST",
        url: "/ChessUY/Torneo/PHP/resoNo.php",
        data: { reser:reser },
        success: function (html) {
            document.getElementById("penultOpt").innerHTML = html;
        }
    });
}


function cantFech(ultopt) {
ultopt = ultopt.value;
$.ajax({
    type: "POST",
    url: "/cyberhydra/Torneo/PHP/cantFech.php",
    data: { ultopt:ultopt },
    success: function (html) {
        document.getElementById("ultOpt").innerHTML = html;
    }
});
}

function quehacerRes() {
if(document.getElementById('siLim').checked) {
    $.ajax({
        type: "POST",
        url: "/ChessUY/Torneo/PHP/cantFech.php",
        data: { ultopt:ultopt },
        success: function (html) {
            $("#quehacerRes").html(html);
        }
    })
} else {
    document.getElementById("quehacerRes").innerHTML = '';
    document.getElementById("penultOpt").innerHTML = '';
}
}

function quehacerRes() {
    if(document.getElementById('siLim').checked) {
        $.ajax({
            url: "/ChessUY/Torneo/PHP/quehacerRes.php",
            success: function (html) {
                $("#quehacerRes").html(html);
            }
        })
    } else {
        document.getElementById("quehacerRes").innerHTML = '';
        document.getElementById("penultOpt").innerHTML = '';
    }
}

function cargAgen() {
    $.ajax({
        url: "/ChessUY/Torneo/PHP/agenTorn.php",
        success: function (html) {
            $("#agenTorn").html(html);
        }
    })
}

var date = new Date();
var month = date.getMonth();
var year = date.getFullYear();
var reserv = [];
var num = 0;

function resMes() {
if (month > 0) {
    month = month - 1;
} else {
    year = year -1;
    month = 11;
}
$.ajax({
    url: "/cyberhydra/Torneo/PHP/agenTorn.php",
    type: "post",
    data: {_month:month,_year:year},
    success: function (html) {
        $("#agenTorn").html(html);
    }
})
}

function sumMes() {
if (month < 11) {
    month = month + 1;
} else {
    year = year + 1;
    month = 0;
}
$.ajax({
    url: "/cyberhydra/Torneo/PHP/agenTorn.php",
    type: "post",
    data: {_month:month,_year:year},
    success: function (html) {
        $("#agenTorn").html(html);
    }
})
}

function guarFech(clicked_id) {
var repe = false;
for(var i=0;i<reserv.length;i++) {
        if(clicked_id == reserv[i]) {
            reserv.splice(i, 1);
            repe = true;
            num--;
        }
    }
if(repe == false && num < 3) {
    reserv.push(clicked_id);
    num++;
} else if(num == 3) {
    alert("Solo puede seleccionar 3 fechas");
}
if(num <= 3) {
    $.ajax({
        url: "/ChessUY/Torneo/PHP/agenTorn.php",
        type: "post",
        data: {reserv:reserv, num:num},
        success: function (styles) {
            $(".style").html(styles);
        }
    })
}
}

var transf = true;

function envaPHP() {
transf = true;
opt = document.getElementById("tipTorn").value;
reserv.sort();
if(opt == 'norm' || opt == 'avan') {
    var tempDesc = setVar('tempDesc', 'oblig');
    var tempJug = setVar('tempJug', 'oblig');
    var partDia = setVar('partDia', 'oblig');
    var prem = setVar('prem', 'oblig');
    var hrCom = setVar('hrCom', 'oblig');
    if(reserv.length < 3) {
        alert("Asegurese de que las fechas estan seleccionadas");
        transf = false;
    } else {
        var comInsc = reserv[0].slice(4);
        var finInsc = reserv[1].slice(4);
        var comTorn = reserv[2].slice(4);
    }
    var eloMax = setVar('eloMax', 'def');
    var eloMin = setVar('eloMin', 'def');
    var edaMax = setVar('edaMax', 'def');
    var edaMin = setVar('edaMin', 'def');
    var locTorn = setVar('locTorn', 'def')
    var cantJug = setVar('cantJug', 'def');
    var cantRes = setVar('cantRes', 'def');
    var fechRes = setVar('fechRes', 'def');
}
if(opt == 'avan') {
    var eloMax = setVar('eloMax', 'simple');
    var eloMin = setVar('eloMin', 'simple');
    var edaMax = setVar('edaMax', 'simple');
    var edaMin = setVar('edaMin', 'simple');
    var locTorn = setVar('locTorn', 'oblig')
    if(document.getElementById('siLim').checked) {
        var cantJug = setVar('cantJug', 'oblig');
        if($("#opcResList").prop("checked")) {
            if($("#limResCanti").prop("checked")) {
                var cantRes = setVar('cantRes', 'oblig');
                var fechRes = setVar('fechRes', 'def');
            } else if($("#limResFecha").prop("checked")) {
                var fechRes = setVar('fechRes', 'oblig');
                var cantRes = setVar('cantRes', 'def');
            } else {
                alert('Porfavor, eliga entre cantidad de reservas o fecha limite de reservas');
                transf = false;
            }
        } else if($("#opcResTerm").prop("checked")) {
            var fechRes = setVar('fechRes', 'def');
            var cantRes = setVar('cantRes', 'def');
        } else {
            alert('Porfavor, eliga entre crear una lista de reservas o terminar las inscripciones');
            transf = false;
        }
    } else {
        var cantJug = setVar('cantJug', 'def');
        var cantRes = setVar('cantRes', 'def');
        var fechRes = setVar('fechRes', 'def');
    }
}

if(transf) {
    $.ajax({
        url: "/ChessUY/Torneo/PHP/agenTorn.php",
        type: "post",
        data: { tiempo : tempJug, 
                ELO_Min : eloMin,
                ELO_Max : eloMax,
                Fecha_inicio : comInsc,
                Fecha_fin : finInsc,
                Numero_Participantes : cantJug,
                TiempoDescalificar : tempDesc,
                PartidasxDia : partDia,
                CantidaddeReservas : cantRes,
                Localidad : locTorn,
                EdadMinima : edaMin,
                EdadMaxima : edaMax,
                InicioTorneo : comTorn,
                hrCom : hrCom
              },
        success: function (exec) {
            $.ajax({
                url: "/cyberhydra/Modal/modalCrTorn.php",
                type: "POST",
                data: {exec:exec},
                success: function (data) {
                    document.getElementById("modal").innerHTML = data;
                }
              });
        }
    })
}

console.log("Tiempo para descalificar: "+tempDesc);
console.log("Tiempo total por jugador: "+tempJug);
console.log("Cantidad de partidas por dia: "+partDia);
console.log("ELO Maximo: "+eloMax);
console.log("ELO Minimo: "+eloMin);
console.log("Edad Maxima: "+edaMax);
console.log("Edad Minima: "+edaMin);
console.log("Cantidad de Jugadores: "+cantJug);
console.log("Cantidad de reservas: "+cantRes);
console.log("Premio: "+prem);
console.log("Localidad: "+locTorn);
console.log("Comienzo de inscripciones: "+comInsc);
console.log("Fecha de fin de reservas (deprecated): "+fechRes);
console.log("Fin de inscripciones: "+finInsc);
console.log("Comienzo del torneo: "+comTorn+" "+hrCom);
console.log("--------------------------------------------");
console.log("Es transferible?: "+transf); 
}

function setVar(vari, modo) {
if(modo == 'simple') {
    if(document.getElementById(vari).value == "") {
        vari = null;
    } else {
        vari = document.getElementById(vari).value;
    }
    if(num <= 3) {
        $.ajax({
            url: "/ChessUY/Torneo/PHP/marcFech.php",
            type: "post",
            data: {reserv:reserv, num:num},
            success: function (styles) {
                $(".style").html(styles);
            }
        })
    }
}

var transf = true;

function envaPHP() {
    transf = true;
    opt = document.getElementById("tipTorn").value;
    reserv.sort();
    if(opt == 'norm' || opt == 'avan') {
        var tempDesc = setVar('tempDesc', 'oblig');
        var tempJug = setVar('tempJug', 'oblig');
        var partDia = setVar('partDia', 'oblig');
        var prem = setVar('prem', 'oblig');
        var hrCom = setVar('hrCom', 'oblig');
        if(reserv.length < 3) {
            alert("Asegurese de que las fechas estan seleccionadas");
            transf = false;
        } else {
            var comInsc = reserv[0].slice(4);
            var finInsc = reserv[1].slice(4);
            var comTorn = reserv[2].slice(4);
        }
        var eloMax = setVar('eloMax', 'def');
        var eloMin = setVar('eloMin', 'def');
        var edaMax = setVar('edaMax', 'def');
        var edaMin = setVar('edaMin', 'def');
        var locTorn = setVar('locTorn', 'def')
        var cantJug = setVar('cantJug', 'def');
        var cantRes = setVar('cantRes', 'def');
        var fechRes = setVar('fechRes', 'def');
    }
    if(opt == 'avan') {
        var eloMax = setVar('eloMax', 'simple');
        var eloMin = setVar('eloMin', 'simple');
        var edaMax = setVar('edaMax', 'simple');
        var edaMin = setVar('edaMin', 'simple');
        var locTorn = setVar('locTorn', 'oblig')
        if(document.getElementById('siLim').checked) {
            var cantJug = setVar('cantJug', 'oblig');
            if($("#opcResList").prop("checked")) {
                if($("#limResCanti").prop("checked")) {
                    var cantRes = setVar('cantRes', 'oblig');
                    var fechRes = setVar('fechRes', 'def');
                } else if($("#limResFecha").prop("checked")) {
                    var fechRes = setVar('fechRes', 'oblig');
                    var cantRes = setVar('cantRes', 'def');
                } else {
                    alert('Porfavor, eliga entre cantidad de reservas o fecha limite de reservas');
                    transf = false;
                }
            } else if($("#opcResTerm").prop("checked")) {
                var fechRes = setVar('fechRes', 'def');
                var cantRes = setVar('cantRes', 'def');
            } else {
                alert('Porfavor, eliga entre crear una lista de reservas o terminar las inscripciones');
                transf = false;
            }
        } else {
            var cantJug = setVar('cantJug', 'def');
            var cantRes = setVar('cantRes', 'def');
            var fechRes = setVar('fechRes', 'def');
        }
    }
    
    if(transf) {
        $.ajax({
            url: "/ChessUY/Torneo/PHP/tornaBD.php",
            type: "post",
            data: { tiempo : tempJug, 
                    ELO_Min : eloMin,
                    ELO_Max : eloMax,
                    Fecha_inicio : comInsc,
                    Fecha_fin : finInsc,
                    Numero_Participantes : cantJug,
                    TiempoDescalificar : tempDesc,
                    PartidasxDia : partDia,
                    CantidaddeReservas : cantRes,
                    Localidad : locTorn,
                    EdadMinima : edaMin,
                    EdadMaxima : edaMax,
                    InicioTorneo : comTorn,
                    hrCom : hrCom
                  },
            success: function (exec) {
                $.ajax({
                    url: "/ChessUY/Modal/modalCrTorn.php",
                    type: "POST",
                    data: {exec:exec},
                    success: function (data) {
                        document.getElementById("modal").innerHTML = data;
                    }
                  });
            }
        })
    }
    
    console.log("Tiempo para descalificar: "+tempDesc);
    console.log("Tiempo total por jugador: "+tempJug);
    console.log("Cantidad de partidas por dia: "+partDia);
    console.log("ELO Maximo: "+eloMax);
    console.log("ELO Minimo: "+eloMin);
    console.log("Edad Maxima: "+edaMax);
    console.log("Edad Minima: "+edaMin);
    console.log("Cantidad de Jugadores: "+cantJug);
    console.log("Cantidad de reservas: "+cantRes);
    console.log("Premio: "+prem);
    console.log("Localidad: "+locTorn);
    console.log("Comienzo de inscripciones: "+comInsc);
    console.log("Fecha de fin de reservas (deprecated): "+fechRes);
    console.log("Fin de inscripciones: "+finInsc);
    console.log("Comienzo del torneo: "+comTorn+" "+hrCom);
    console.log("--------------------------------------------");
    console.log("Es transferible?: "+transf); 
}

function setVar(vari, modo) {
    if(modo == 'simple') {
        if(document.getElementById(vari).value == "") {
            vari = null;
        } else {
            vari = document.getElementById(vari).value;
        }
    }
    if(modo == 'oblig') {
        if(document.getElementById(vari).value == "") {
            alert("Faltan campos para " + vari);
            vari = null;
            transf = false;
        } else {
            vari = document.getElementById(vari).value;
        }
    }
    if(modo == "def") {
        vari = null;
    }
    return (vari);
}

function cerrar(){
    document.getElementById("modal").innerHTML = "";
  }
