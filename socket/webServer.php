<?php

set_time_limit(0);
$host = '127.0.0.1';
$port = '25003';

$socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
socket_bind($socket,$host,$port) or die('error al vincular socket con ip');
echo socket_strerror(socket_last_error());
socket_listen($socket);
$i=0;
while(true){
    $cliente[++$i] = socket_accept($socket);
    $message = socket_read($cliente[$i], 1024);
    echo $message;
    $message = "Hola" .$message. "\n";
    socket_write($cliente[$i], $message. "\n\r", 1024);
    socket_close($cliente[$i]);
}
socket_close($socket);

?>