<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\online;

    require dirname(__DIR__) . '/vendor/autoload.php';
    require "online.php";

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new online()
            )
        ),
        8080
    );
    $server->run();