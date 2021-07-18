class Problemas{
    constructor(tiempo, nivel, cantMovimientos){
    this.tiempo=tiempo;
    this.nivel=nivel;
    this.cantMovimientos=cantMovimientos;

}
get time(){
    return this.tiempo;
}
set time(x){
    this.tiempo=x;
}
get lvl(){
    return this.nivel;
}
set lvl(x){
    this.nivel=x;
}
get cantmoves(){
    return this.cantMovimientos;
}
set cantmoves(x){
    this.cantMovimientos=x;
}
}