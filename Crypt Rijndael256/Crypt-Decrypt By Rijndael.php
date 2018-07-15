<?php
/**
 * Desencripta un valor encriptado mediante una clave secreta
 * Hay que tener cargado el módulo php_mcrypt.dll
 *
 * @param string $sValue
 * @param string $sSecretKey
 * @return string
 */
function DecryptByModule($sValue, $sSecretKey)
{
    if (extension_loaded('mcrypt') === true){
        return trim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256,
                                 $sSecretKey,
                                 base64_decode($sValue),
                                 MCRYPT_MODE_ECB,
                                 mcrypt_create_iv( mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256,
                                                                        MCRYPT_MODE_ECB),
                                                    MCRYPT_RAND)));
    }
    else {
        alert('Libreria mcrypt no cargada');
        throw new Exception( 'Libreria mcrypt no cargada');

    }
}

 /**
 * Encripta un valor respecto una clave secreta,
 * Hay que tener cargado el módulo php_mcrypt.dll
 *
 * @param string $sValue
 * @param string $sSecretKey
 * @return string
 */
function CryptByModule($sValue, $sSecretKey)
{
    if (extension_loaded('mcrypt') === true){
        return trim( base64_encode(    mcrypt_encrypt( MCRYPT_RIJNDAEL_256,
                                                    $sSecretKey,
                                                    $sValue,
                                                    MCRYPT_MODE_ECB,
                                                    mcrypt_create_iv( mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256,
                                                                                            MCRYPT_MODE_ECB),
                                                                      MCRYPT_RAND))));
    }
    else {
        alert('Libreria mcrypt no cargada');
        throw new Exception( 'Libreria mcrypt no cargada');
    }
}
