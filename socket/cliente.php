<?php

$i = 0;
$host = '127.0.0.1';
$port = '25003';

while($i<1){
    $message = 'PI';
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("no se pudo crear el socket");
    $result = socket_connect($socket, $host,$port) or die("no se pudo conectar con el server");
    socket_write($socket,$message,strlen($message)) or die("no se puede enviar los datos");

    $result = socket_write($socket, 1024) or die('no se puede leer la respuesta');
    echo $result. "\n";
    socket_close($socket);
    $i++;
}
?>