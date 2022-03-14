<?php
  

$mystring = "Passwd";
  

echo "Original String: " . $mystring."<br>";
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "MySpecialKey@2022";
$encryption = openssl_encrypt($mystring, $ciphering,
            $encryption_key, $options, $encryption_iv);
echo "Encrypted String: " . $encryption . "\n";
  
?>