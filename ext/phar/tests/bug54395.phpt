--TEST--
Bug #54395 (Phar::mount() crashes when calling with wrong parameters)
--EXTENSIONS--
phar
--FILE--
<?php

try {
    phar::mount(1,1);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

?>
--EXPECT--
string(25) "Mounting of 1 to 1 failed"
