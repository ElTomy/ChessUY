<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use \PDO;
class Ajedrez implements MessageComponentInterface {
    protected $clients;
    private $activeUsers;
    private $activeConnections;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->activeUsers = [];
        $this->activeConnections = [];
        echo "Servidor Ratchet iniciado...\n";
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";

    }


    public function onMessage(ConnectionInterface $from, $msg){
        $jsonMsg = json_decode($msg);

        if ($jsonMsg->type == "login") {
            $onlineUsers = [];
            $onlineUsers['type'] = "onlineUsers";
            $this->activeUsers[$from->resourceId] = $jsonMsg->name;
            $onlineUsers['onlineUsers'] = $this->activeUsers;
            $this->sendMessageToAll(json_encode($onlineUsers));
        } else

        if ($jsonMsg->type == "message") {
            $this->sendMessageToOthers($from, json_encode($jsonMsg));
        }
    }

    public function sendMessageToOthers($from, $msg){
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }

    //cuando te conectas mandas mensaje a todos
    public function sendMessageToAll($msg){
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }

    //----------------DESPUES PRUEBO ESTO----------------//
    public function sendMessageToOne($from, $msg, $to){
        foreach ($this->clients as $client) {
            if ($to == $client) {
                // enviar a un usuario solo
                $client->send($msg);
            }}}
    //---------------------------------------------------//

    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
        unset($this->activeUsers[$conn->resourceId]);
        $onlineUsers = [];
        $onlineUsers['type'] = "onlineUsers";
        $onlineUsers['onlineUsers'] = $this->activeUsers;
        $this->sendMessageToOthers($conn, json_encode($onlineUsers));

        //borro usuario de la bd conectado
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e){
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}