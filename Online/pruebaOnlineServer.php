<?php
require_once('websockets.php');

class Ajedrez extends WebSocketServer {

    protected function process ($user, $message) {
        //echo 'user sent: '.$message.PHP_EOL;
        foreach ($this->users as $currentUser) {
            if($currentUser !== $user){
                $this->send($currentUser,$message);
            }
        }
    }

    protected function connected($user){
    echo 'user connected'.PHP_EOL;
    }

    protected function closed($user){
    echo 'user disconnected'.PHP_EOL;
    }
}
    //$chatServer = new Ajedrez("192.168.4.66","8080");
    //$chatServer = new Ajedrez("192.168.0.118","25005");
echo "antes";
    $chatServer = new Ajedrez("179.27.156.47",":8080");
echo "después";
    try {
        echo "try";
    $chatServer->run();
    }
    catch (Exception $e) {
        echo "catch";
    $chatServer->stdout($e->getMessage());
    }   

?>