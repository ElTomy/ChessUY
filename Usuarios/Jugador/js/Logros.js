class Logros{

    constructor(usuario, descripcion, img, procentaje){
        this.usuario=usuario;
        this.descripcion=descripcion;
        this.img=img;
        this.procentaje=procentaje;
    }
    get usu(){
        return this.usuario;
    }
    set usu(x){
        this.usuario=x;
    }
    get desc(){
        return this.descripcion;
    }
    set desc(x){
        this.descripcion=x;
    }
    get imagen(){
        return this.img;
    }
    set imagen(x){
        this.img=x;
    }
    get porc(){
        return this.procentaje;
    }
    set porc(x){
        this.procentaje=x;
    }
}

function traigoLogros(usuario){

}

function guardoLogros(usuario){
    
}