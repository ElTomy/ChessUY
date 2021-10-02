<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use \PDO;
class Ajedrez implements MessageComponentInterface {
    protected $clients;
    private $activeUsers;
    private $activeConnections;
    private $rooms;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->activeUsers = [];
        $this->activeConnections = [];
        $this->rooms = [];
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
//?-----------------------------------------------------------------------
            $this->rooms[$from->resourceId] = $jsonMsg->room; 
//?-----------------------------------------------------------------------
            $this->sendMessageToAll(json_encode($onlineUsers));
        } else if ($jsonMsg->type == "message") {
            $this->sendMessageToOthers($from, json_encode($jsonMsg));
        }
    }

//:==================MANDAR A OTROS===================://
    public function sendMessageToOthers($from, $msg){
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }
//:===================================================://

//:==================MANDAR A TODOS===================://
    public function sendMessageToAll($msg){
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }
//:===================================================://

//:==================MANDAR A ROOMS===================://
    public function sendMessageToOne($from, $msg){
        $roomID = $this->rooms[$from->resourceId];
        $arrayUs = array_keys($this->rooms, $roomID);

        foreach ($arrayUs as $us) {
            foreach ($this->clients as $client) {
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


    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
        unset($this->activeUsers[$conn->resourceId]);
        //?-----------------------------------------
        unset($this->rooms[$conn->resourceId]);
        //?-----------------------------------------
        $onlineUsers = [];
        $onlineUsers['type'] = "onlineUsers";
        $onlineUsers['onlineUsers'] = $this->activeUsers;
        $this->sendMessageToOthers($conn, json_encode($onlineUsers));
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e){
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}