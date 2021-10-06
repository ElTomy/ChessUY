<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use \PDO;
    require "../../chessiep/juego/php/procedimientosJuego.php";
    require "../../chessiep/usuario/php/procedimientosUsuario.php";  

class online implements MessageComponentInterface {
//==========SASA===========
    protected $clients;
//==========CYBER==========
    protected $CYBERclients;
    private $CYBERactiveUsers;
    private $CYBERactiveConnections;
    private $CYBERrooms;
//========================

    public function __construct(){
            $this->clients = new \SplObjectStorage;
            $this->CYBERclients = new \SplObjectStorage;
            $this->CYBERactiveUsers = [];
            $this->CYBERactiveConnections = [];
            $this->CYBERrooms = [];
            echo "Servidor Ratchet iniciado...\n";
    }

    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
        $this->CYBERclients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg){
        $jsonMsg = json_decode($msg);

        if($jsonMsg->team == "SASA"){
            $informacion = json_decode($msg, true);
            $objJuego = new \Juego;
            switch ($informacion["accion"]) {
                case 1://carga el tablero
                    $data['tipo'] = "Tablero";
                    $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                    $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                    $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                    $from ->send(json_encode($data)); 
                    break;
                case 2://guarda el movimiento realizado
                    $objJuego->guardarMovimiento($informacion["ID"],$informacion["POSICIONANTERIOR"],$informacion["POSICIONNUEVA"],$informacion["USUARIO"],$informacion["TIEMPO"],$informacion["IDPARTIDA"]);
                    foreach ($this->clients as $clients) {
                            $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                            $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                            $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                            $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                            $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                            $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                            $data['tipo'] = "NuevoMovimientoComida";
                            $clients->send(json_encode($data));
                    }
                    break;
                case 3://guarda si se come una ficha en el movimeinto
                    $objJuego->fichaComida($informacion["ID"],$informacion["IDFICHA"],$informacion["POSICIONANTERIOR"],$informacion["POSICIONNUEVA"],$informacion["USUARIO"],$informacion["TIEMPO"],$informacion["IDPARTIDA"]);
                    foreach ($this->clients as $clients) {
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "NuevoMovimientoComida";
                        $clients->send(json_encode($data));
                    }
                    break;
                case 4:// empieza el partido - se fija si el usuario contrario ya esta conectado o no
                    $data['tipo'] = "EmpezarPartido";
                    $data['partido'] = json_encode($objJuego->empezarPartido($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                    $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                    $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                    $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                    $from ->send(json_encode($data)); 
                    break;
                case 5://si el usuario contrario no esta conectado se queda espearando
                    $data['tipo'] = "Esperar";
                    $data['esperar'] = json_encode($objJuego->esperar($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    $from ->send(json_encode($data)); 
                    break;
                case 6://guarda la finalizacion del partido
                    $data['tipo'] = "Turno";
                    $data['finalizacion'] = json_encode($objJuego->ganar($informacion["COLOR"],$informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    $data['turno'] = json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    foreach ($this->clients as $clients) {
                        //if($from =! $clients){
                            $clients->send(json_encode($data));
                        //}
                    }
                    break;
                case 7://trae todas las fichas comidas
                    $data['tipo'] = "Comidas";
                    $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                    $from->send(json_encode($data));
                    break;
                case 8:// trae todos los moviminetos realizados
                    $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                    $data['tipo'] = "Movimientos";
                    $from->send(json_encode($data));
                    break;
                case 9://trae el turno actual
                    $data['tipo'] = "Turno";
                    $data['finalizacion'] = json_encode('[null]');
                    $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    $from ->send(json_encode($data)); 
                    break;
                case 10://guarda si se realizo una coronacion
                    $objJuego->coronacion($informacion["IDPEON"],$informacion["IDCORONACION"],$informacion["USUARIO"],$informacion["IDPARTIDA"]);
                    foreach ($this->clients as $clients) {
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "NuevoMovimientoComida";
                        $clients->send(json_encode($data));
                    }
                    break;
                case 11://se encarga de los timers de los jugadores
                    if($informacion["JUGADOR"] == "Blanco" ){
                        $tiempoBlancas = $informacion["TIEMPO"];
                        $tiempoBlancas2 = $informacion["TIEMPO2"];
                        $tiempoBlancas3 =$informacion["TIEMPO3"];
                        $contadorBlancas = mktime((date("H") -  $tiempoBlancas3),($tiempoBlancas+ date("i")),  (date("s") - $tiempoBlancas2), date("n"),  date("j"), date("Y"));
            
                        $hoy = time () ;
                        
                        $diferenciaBlancas =($contadorBlancas-$hoy);
                        
                        if($tiempoBlancas3 >= 10){
                            $horaBlancas = $tiempoBlancas3;
                        }else{
                            $horaBlancas = "0".$tiempoBlancas3;
                        }
                        $minutosBlancas =date('i',$diferenciaBlancas);
                        $segundosBlancas =date('s',$diferenciaBlancas);
                
                        if( $tiempoBlancas2 == 60){
                            $tiempoBlancas2 = 1;
                            $tiempoBlancas--;
                            if($tiempoBlancas3 > 0){
                                if($tiempoBlancas % 60 == 0){
                                    $horaBlancas --;
                                    $tiempoBlancas3 --;
                                    $minutosBlancas = "59";
                                    $horaBlancas = "0". $tiempoBlancas3 ;
                                }
                            }
                            $segundosBlancas = "00";
                        }else if($tiempoBlancas2 == 1 && $tiempoBlancas == 60){
                            if($tiempoBlancas3 > 0){
                                if($tiempoBlancas % 60 == 0){
                                    $horaBlancas --;
                                    $tiempoBlancas3 --;
                                    $minutosBlancas = "59";
                                    $horaBlancas = "0".$tiempoBlancas3;
                                }
                            }
                        }
                        $tiempoBlancas2 ++;
                        $data['tiempo']= $horaBlancas.":".$minutosBlancas.":".$segundosBlancas.":".$tiempoBlancas.":".$tiempoBlancas2.":".$tiempoBlancas3."";
                    }else{
                        $tiempoNegras = $informacion["TIEMPO"];
                        $tiempoNegras2 = $informacion["TIEMPO2"];
                        $tiempoNegras3 =$informacion["TIEMPO3"];
                        $contadorNegras = mktime($tiempoNegras3+(date("H")),($tiempoNegras + date("i")),(date("s") - $tiempoNegras2), date("n"),  date("j"), date("Y"));
                
                        $hoy = time () ;
                     
                        $diferenciaNegras =($contadorNegras-$hoy) ;
                        
                        if($tiempoNegras3 >= 10){
                            $horaNegras = $tiempoNegras3;
                        }else{
                            $horaNegras = "0".$tiempoNegras3;
                        }
                        $minutosNegras =date('i',$diferenciaNegras);
                        $segundosNegras =date('s',$diferenciaNegras);
                    
                        if( $tiempoNegras2 == 60){
                            $tiempoNegras2 = 1;
                            $tiempoNegras --;
                            if($tiempoNegras3 > 0){
                                if($tiempoNegras % 60 == 0){
                                    $horaNegras --;
                                    $tiempoNegras3 --;
                                    $minutosNegras = "59";
                                    $horaNegras = "0".$tiempoNegras3;
                                }
                            }
                            $segundosNegras = "00";
                        }else if($tiempoNegras2 == 1 && $tiempoNegras == 60){
                            if($tiempoNegras3 > 0){
                                if($tiempoNegras % 60 == 0){
                                    $horaNegras --;
                                    $tiempoNegras3 --;
                                    $minutosNegras = "59";
                                    $horaNegras = "0".$tiempoNegras3;
                                }
                            }
                        }
                        $tiempoNegras2 ++;
                        $data['tiempo'] = $horaNegras.":".$minutosNegras.":".$segundosNegras.":".$tiempoNegras.":".$tiempoNegras2.":".$tiempoNegras3."";
                    }
                    $data['tipo'] = "Contador";
                    foreach ($this->clients as $clients) {
                        $clients->send(json_encode($data));
                    }
                    break;
                case 12://guarda si alguien se rinde
                    $objJuego->rendirse($informacion["IDPARTIDA"],$informacion["USUARIO"]);
                    $data['tipo'] = "Turno";
                    $data['finalizacion'] = json_encode('[null]');
                    $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    foreach ($this->clients as $clients) {
                        //if($from =! $clients){
                            $clients->send(json_encode($data));
                        //}
                    }
                    break;    
                case 13://guarda si alguien propone tablas al contrario
                    $objJuego->proponerAceptarTablas($informacion["IDPARTIDA"],$informacion["USUARIO"]);
                    $data['tipo'] = "Turno";
                    $data['finalizacion'] = json_encode('[null]');
                    $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    foreach ($this->clients as $clients) {
                        //if($from =! $clients){
                            $clients->send(json_encode($data));
                        //}
                    }
                    break;    
                case 14:// guarada si el usuario contrario rechaza las tablas 
                    $objJuego->rechazarTablas($informacion["IDPARTIDA"],$informacion["USUARIO"]);
                    $data['tipo'] = "Turno";
                    $data['finalizacion'] = json_encode('[null]');
                    $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    foreach ($this->clients as $clients) {
                        $clients->send(json_encode($data));
                    }
                    break;  
                case 15://guarad si se produce tablas
                    $objJuego->movimientosTablas($informacion["IDPARTIDA"],$informacion["USUARIO"]);
                    $data['tipo'] = "Turno";
                    $data['finalizacion'] = json_encode('[null]');
                    $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                    foreach ($this->clients as $clients) {
                        $clients->send(json_encode($data));
                    }
                    break;
                case 17://guarada si realiza enroque
                    $objJuego->enroque($informacion["IDREY"],$informacion["VIEJAREY"],$informacion["NUEVAREY"],$informacion["IDTORRE"],$informacion["NUEVATORRE"],$informacion["TIEMPO"],$informacion["IDPARTIDA"],$informacion["USUARIO"]);
                    foreach ($this->clients as $clients) {
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "NuevoMovimientoComida";
                        $clients->send(json_encode($data));
                    }
                    break;      
                case 19://guarda si realiza peon al paso 
                    $objJuego->guardarPeonAlPaso($informacion["IDPEON"],$informacion["VIEJAPEON"],$informacion["NUEVAPEON"],$informacion["IDPEON2"],$informacion["NUEVAPEON2"],$informacion["TIEMPO"],$informacion["IDPARTIDA"],$informacion["USUARIO"]);
                    foreach ($this->clients as $clients) {
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "NuevoMovimientoComida";
                        $clients->send(json_encode($data));
                    }
                    break;  
                case 21:// guarad si se realiza jaque 
                   $objJuego->guardarJaque($informacion["ID"],$informacion["IDREY"],$informacion["IDPARTIDA"],$informacion["USUARIO"]);
                   foreach ($this->clients as $clients) {
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "NuevoMovimiento";
                        $clients->send(json_encode($data));
                    }
                    break;
                case 22:
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['espectador'] = json_encode($objJuego->espectador($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "Espectador";
                        $from->send(json_encode($data));
                    break;
                case 24://
                    foreach ($this->clients as $clients) {
                        $data['partido'] = json_encode($objJuego->reinciar());
                        $data['esperar'] = json_encode($objJuego->esperar($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['tablero'] = json_encode($objJuego->cargarTablero($informacion["IDPARTIDA"]));
                        $data['movimientos'] = json_encode($objJuego->traerMovimienos($informacion["IDPARTIDA"]));
                        $data['fichasComidas'] = json_encode($objJuego->comidas($informacion["IDPARTIDA"]));
                        $data['turno']=json_encode($objJuego->turno($informacion["IDPARTIDA"],$informacion["USUARIO"]));
                        $data['jaqueNegro']=json_encode($objJuego->verificarJaque(1,$informacion["IDPARTIDA"]));
                        $data['jaqueBlanco']=json_encode($objJuego->verificarJaque(2,$informacion["IDPARTIDA"]));
                        $data['tipo'] = "Reinciar";
                        $clients->send(json_encode($data));
                    }
                    break;
                case 25://guarada el tiempo actual para que siempre este actualizado 
                    $objJuego->guardarTiempo($informacion["IDPARTIDA"],$informacion["COLOR"]);
                    break;
                case 26://manda los mensajes 
                    //se fija que el mensaje no cuente con codigo maligno
                    if(preg_match('/[^a-zA-Z0-9+.@,:¿><{}+_)(*&^%$#!? ]/i',$informacion["MSJ"])){
                        $data['tipo'] = "Mensajes";
                        $data['chat']=false;
                        $from->send(json_encode($data));
                    }else{
                        $objJuego->enviarMensaje($informacion["IDPARTIDA"],$informacion["USUARIO"],$informacion["MSJ"]);
                        foreach ($this->clients as $clients) {
                            //if($from =! $clients){
                                $data['tipo'] = "Mensajes";
                                $data['chat']=json_encode($objJuego->traerMensajes($informacion["IDPARTIDA"]));
                                $clients->send(json_encode($data));
                            //}
                        }
                    }
                    break;
                case 27://trae todos los mensajes en la bdd
                    $data['tipo'] = "Mensajes";
                    $data['chat']=json_encode($objJuego->traerMensajes($informacion["IDPARTIDA"]));
                    $from->send(json_encode($data));
                    break;
                case 28://cuadno se conecta un usuario 
                    foreach ($this->clients as $clients) {
                        $data['tipo'] = "__pong__";
                        $data['chat']=json_encode($objJuego->traerMensajes($informacion["IDPARTIDA"]));
                        $clients->send(json_encode($data));
                    }
                break;
                case 29://guarad cuando se produce empate 
                    $objJuego->empate($informacion["IDPARTIDA"]);
                break;
            }

        }else if($jsonMsg->team == "CYBER"){
            
        if ($jsonMsg->type == "login") {
            $onlineUsers = [];
            $onlineUsers['type'] = "onlineUsers";
            $this->CYBERactiveUsers[$from->resourceId] = $jsonMsg->name;
            $onlineUsers['onlineUsers'] = $this->CYBERactiveUsers;
//?-----------------------------------------------------------------------
            $this->CYBERrooms[$from->resourceId] = $jsonMsg->room; 
//?-----------------------------------------------------------------------
            $this->CYBERsendMessageToAll(json_encode($onlineUsers));
            } else if ($jsonMsg->type == "message") {
                $this->CYBERsendMessageToRoom($from, json_encode($jsonMsg));
            }
    }
}



//=================================================================CYBER================================================================
//:==================MANDAR A OTROS===================://
public function CYBERsendMessageToOthers($from, $msg){
    foreach ($this->CYBERclients as $client) {
        if ($from !== $client) {
            $client->send($msg);
        }
    }
}
//:===================================================://

//:==================MANDAR A TODOS===================://
public function CYBERsendMessageToAll($msg){
    foreach ($this->CYBERclients as $client) {
        $client->send($msg);
    }
}
//:===================================================://

//:==================MANDAR A ROOMS===================://
public function CYBERsendMessageToRoom($from, $msg){
    $roomID = $this->CYBERrooms[$from->resourceId];
    $arrayUs = array_keys($this->CYBERrooms, $roomID);

    foreach ($arrayUs as $us) {
        foreach ($this->CYBERclients as $client) {
            if ($client->resourceId == $us && $from !== $client) {
                $client->send($msg);
            }
        }
    } 
}
//:===================================================://

//?==================CHAT PRIVADO??===================?//
    // $key = array_search($to,$this->activeUsers);
    // foreach ($this->clients as $client) {
    //     if ($client->resourceId == $key) {
    //         $client->send($msg);
    //     }
    // }
//?===================================================?//


//======================================================================================================================================

    
    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        unset($this->activeUsers[$conn->resourceId]);
        //?-----------------------------------------
        unset($this->rooms[$conn->resourceId]);
        //?-----------------------------------------
        $onlineUsers = [];
        $onlineUsers['type'] = "onlineUsers";
        $onlineUsers['onlineUsers'] = $this->activeUsers;
        $this->CYBERsendMessageToOthers($conn, json_encode($onlineUsers));
        echo "Connection {$conn->resourceId} has disconnected\n";

 	//Borra la conexion y ya no puede mandar mas informacion -- SASA
            echo "Perdida conexion! ({$conn->resourceId})\n";
            $cookiesRaw = $conn->httpRequest->getHeader('Cookie');
            if(count($cookiesRaw)) {
                $cookiesArr = \GuzzleHttp\Psr7\parse_header($cookiesRaw)[0]; // Array of cookies
            }
            $this->clients->detach($conn);
            //le avisa al usuario contrario que el jugador ha perdidio la conexion
            if(isset($cookiesArr['tipo'])){
                foreach ($this->clients as $clients) {
                    $data['tipo'] = "__ping__";
                    $clients->send(json_encode($data));
                }
            }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
