
<?php
  
// need to be Encrypted
$encryption = "x/WT1Kxw";  
$ciphering = "AES-128-CTR";
$decryption_iv = '1234567891011121';
$decryption_key = "MySpecialKey@2022";
$options = 0;

// Use openssl_decrypt() function to decrypt the data
$decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
  
echo "Decrypted String: " . $decryption;

?>