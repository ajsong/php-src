--TEST--
Test file_put_contents() and file_get_contents() functions : basic functionality
--FILE--
<?php

$file_path = __DIR__;
include($file_path."/file.inc");

echo "*** Testing the basic functionality of file_put_contents() and file_get_contents() functions ***\n";

echo "-- Testing with simple valid data file --\n";

$file_name = "/file_put_contents_basic.tmp";
fill_buffer($text_buffer, "text", 100);
file_put_contents( $file_path.$file_name, $text_buffer );

var_dump( file_get_contents($file_path.$file_name) );

echo "\n-- Testing with empty file --\n";

$file_name = "/file_put_contents_basic1.tmp";
file_put_contents( $file_path.$file_name, "");
var_dump( file_get_contents( $file_path.$file_name ) );

echo "\n*** Done ***";
?>
--CLEAN--
<?php
$file_path = __DIR__;
unlink($file_path."/file_put_contents_basic.tmp");
unlink($file_path."/file_put_contents_basic1.tmp");
?>
--EXPECT--
*** Testing the basic functionality of file_put_contents() and file_get_contents() functions ***
-- Testing with simple valid data file --
string(100) "text text text text text text text text text text text text text text text text text text text text "

-- Testing with empty file --
string(0) ""

*** Done ***
