class Usuario{

    constructor(ci, nombre, apellido, usuario, pass, año, institucion, fecha_nacimiento, mail, contacto_institucion, foto, tipo ){
        this.ci=ci;
        this.nombre=nombre;
        this.apellido=apellido;
        this.usuario=usuario;
        this.pass=pass;
        this.año=año;
        this.institucion=institucion;
        this.fecha_nacimiento=fecha_nacimiento;
        this.mail=mail;
        this.contacto_institucion=contacto_institucion;
        this.foto=foto;
        this.tipo=tipo;
    }
    get cedula(){
        return this.ci;
    }
    set cedula(x){
        this.ci=x;
    }
    get nomb(){
        return this.nombre;
    }
    set nomb(x){
        this.nombre=x;
    }
    get ap(){
        return this.apellido;
    }
    set ape(x){
        this.apellido=x;
    }
    get user(){
        return this.usuario;
    }
    set user(x){
        this.usuario=x;
    }
    get passw(){
        return this.pass;
    }
    set passw(x){
        this.pass=x;
    }
    get year(){
        return this.año;
    }
    set year(x){
        this.año=x;
    }
    get inst(){
        return this.institucion;
    }
    set inst(x){
        this.institucion=x;
    }
    get f_nacimiento(){
        return this.fecha_nacimiento;
    }
    set f_nacimiento(x){
        this.fecha_nacimiento=x;
    }
    get email(){
        return this.mail;
    }
    set email(x){
        this.mail=x;
    }
    get c_institucion(){
        return this.contacto_institucion;
    }
    set c_institucion(x){
        this.contacto_institucion=x;
    }
    get ft(){
        return this.foto;
    }
    set ft(x){
        this.foto=x;
    }
    get type(){
        return this.tipo;
    }
    set type(x){
        this.tipo=x;
    }
    
    
    login(usuario, pass){ 
        var x= false;

        $.ajax({
            async: false,
            type: "POST",
            url: "../Usuarios/php/logearse.php",
            data: {usuario:usuario,pass:pass},
            success: function(log){
                var txt = log;
                var log2 = JSON.parse(txt);
                if(log2[0] == "asd"){
                    x = false;
                }else{
                    sessionStorage.setItem("usuario", log2.usuario);
                    sessionStorage.setItem("tipo", log2.tipo);
                    x = true;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }   
        });
        return x;
    }
}
