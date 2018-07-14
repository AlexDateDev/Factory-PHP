<?php

/**
 * Desencripta un valor por trasposición de valores
 *
 * @param string $str_message
 * @return string
 */
function DecryptByTrasposition($str_message)
{
    $str_message = base64_decode($str_message);
    $len_str_message=strlen($str_message);
    $str_encrypted_message="";
    for ($position = 0;$position<$len_str_message;$position++){
        $key_to_use = (($len_str_message+$position)+1);
        $key_to_use = (255+$key_to_use) % 255;
        $byte_to_be_encrypted = substr($str_message, $position, 1);
        $ascii_num_byte_to_encrypt = ord($byte_to_be_encrypted);
        $xored_byte = $ascii_num_byte_to_encrypt ^ $key_to_use;
        $encrypted_byte = chr($xored_byte);
        $str_encrypted_message .= $encrypted_byte;
    }
    return $str_encrypted_message;
}
/**
 * Encripta un valor por trasposición de valores
 *
 * @param string $str_message
 * @return string
 */
function CryptByTrasposition($str_message)
{
    $len_str_message=strlen($str_message);
    $str_encrypted_message="";
    for ($position = 0;$position<$len_str_message;$position++){

        $key_to_use = (($len_str_message+$position)+1);
        $key_to_use = (255+$key_to_use) % 255;
        $byte_to_be_encrypted = substr($str_message, $position, 1);
        $ascii_num_byte_to_encrypt = ord($byte_to_be_encrypted);
        $xored_byte = $ascii_num_byte_to_encrypt ^ $key_to_use;
        $encrypted_byte = chr($xored_byte);
        $str_encrypted_message .= $encrypted_byte;
    }
    return base64_encode($str_encrypted_message);
}

$a = CryptByTrasposition("abcdef 12345" ); // $a = (string:16) bGxsdHR0MyUnJSMt
$b=  DecryptByTrasposition($a);	// $b = (string:12) abcdef 12345

// CUIDADO CON \\
$a = CryptByTrasposition("  abcdefghjklm123456\\7890\"'¿=)(&%$!!{}M#OK" );
// $a = (string:56) CwxMTExUVFRUXF9dW1UICAgICAhjd3l7c2Zi+XphYWxuaGxvNC0ccRwf

$b=  DecryptByTrasposition($a);
// $b = (string:42)   abcdefghjklm123456\7890"'¿=)(&%$!!{}M#OK