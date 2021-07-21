class Jugador{

    constructor(elo, victorias, derrotas, tablas, coronaciones, piezas_comidas, victoria_menor_tiempo, victoria_menos_movimientos ){
        this.elo=elo;
        this.victorias=victorias;
        this.derrotas=derrotas;
        this.tablas=tablas;
        this.coronaciones=coronaciones;
        this.piezas_comidas=piezas_comidas;
        this.victoria_menor_tiempo=victoria_menor_tiempo;
        this.cvictoria_menos_movimientosi=victoria_menos_movimientos;
    }
    get ptsELO(){
        return this.elo;
    }
    set ptsELO(x){
        this.elo=x;
    }
    get vic(){
        return this.victorias;
    }
    set vic(x){
        this.victorias=x;
    }
    get der(){
        return this.derrotas;
    }
    set der(x){
        this.derrotas=x;
    }
    get tab(){
        return this.tablas;
    }
    set tab(x){
        this.tablas=x;
    }
    get coro(){
        return this.coronaciones;
    }
    set coro(x){
        this.coronaciones=x;
    }
    get piezas_c(){
        return this.piezas_comidas;
    }
    set piezas_c(x){
        this.piezas_comidas=x;
    }
    get vmt(){
        return this.victoria_menor_tiempo;
    }
    set vmt(x){
        this.victoria_menor_tiempo=x;
    }
    get vmm(){
        return this.victoria_menos_movimientos;
    }
    set vmm(x){
        this.victoria_menos_movimientos=x;
    }
}