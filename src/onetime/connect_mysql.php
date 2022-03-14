<?php // connect.php
//MySQL server name, username, password and database name is defined

$encryption = "x/WT1Kxw";  
$ciphering = "AES-128-CTR";
$decryption_iv = '1234567891011121';
$decryption_key = "MySpecialKey@2022";
$options = 0;

$decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

define ("HOST","localhost");
define ("USER","test");
define ("PASS",$decryption);
define ("DB","mysql");

?>