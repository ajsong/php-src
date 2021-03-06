--TEST--
void socket_clear_error ([ resource $socket ] ) ;
--CREDITS--
marcosptf - <marcosptf@yahoo.com.br> - #phparty7 - @phpsp - novatec/2015 - sao paulo - br
--EXTENSIONS--
sockets
--SKIPIF--
<?php

if(substr(PHP_OS, 0, 3) != 'WIN' ) {
    die('skip windows only test');
}
?>
--FILE--
<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$socketConn = socket_connect($socket, "127.0.0.1", 21248);
var_dump(socket_last_error($socket));
socket_clear_error($socket);
var_dump(socket_last_error($socket));
?>
--EXPECTF--
Warning: socket_connect(): unable to connect [%d]: No connection could be made because the target machine actively refused it in %s on line %d
int(%d)
int(%d)
