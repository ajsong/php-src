--TEST--
openssl_verify() tests
--EXTENSIONS--
openssl
--FILE--
<?php
$data = "Testing openssl_verify()";
$privkey = "file://" . __DIR__ . "/private_rsa_1024.key";
$pubkey = "file://" . __DIR__ . "/public.key";
$wrong = "wrong";

openssl_sign($data, $sign, $privkey, OPENSSL_ALGO_SHA256);
var_dump(openssl_verify($data, $sign, $pubkey, OPENSSL_ALGO_SHA256));
var_dump(openssl_verify($data, $sign, $privkey, OPENSSL_ALGO_SHA256));
var_dump(openssl_verify($data, $sign, $wrong, OPENSSL_ALGO_SHA256));
var_dump(openssl_verify($data, $wrong, $pubkey, OPENSSL_ALGO_SHA256));
var_dump(openssl_verify($wrong, $sign, $pubkey, OPENSSL_ALGO_SHA256));
?>
--EXPECTF--
int(1)

Warning: openssl_verify(): Supplied key param cannot be coerced into a public key in %s on line %d
bool(false)

Warning: openssl_verify(): Supplied key param cannot be coerced into a public key in %s on line %d
bool(false)
int(0)
int(0)
