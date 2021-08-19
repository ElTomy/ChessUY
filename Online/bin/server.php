<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Ajedrez;

    require dirname(__DIR__) . '/vendor/autoload.php';
    require "../src/Online.php";
    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Ajedrez()
            )
        ),
        8080
    );
    
    $server->run();