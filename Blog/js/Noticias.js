class Noticias{
    constructor(titulo, descripcion, informacion, podcast, imagen){
    this.titulo=titulo;
    this.descripcion=descripcion;
    this.informacion=informacion;
    this.podcast=podcast;
    this.imagen=imagen;
}
get title(){
    return this.titulo;
}
set title(x){
    this.titulo=x;
}
get desc(){
    return this.descripcion;
}
set desc(x){
    this.usuario1=x;
}
get info(){
    return this.informacion;
}
set info(x){
    this.informacion=x;
}
get pod(){
    return this.podcast;
}
set pod(x){
    this.podcast=x;
}
get img(){
    return this.imagen;
}
set img(x){
    this.imagen=x;
}
}
