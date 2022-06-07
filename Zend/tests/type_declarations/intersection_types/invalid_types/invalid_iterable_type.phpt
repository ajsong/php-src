--TEST--
iterable type cannot take part in an intersection type
--FILE--
<?php

function foo(): iterable&Iterator {}

?>
--EXPECTF--
Fatal error: Type Traversable|array cannot be part of an intersection type in %s on line %d
