<?php
/**       
 * Devuelve un string sin accents ni dieressis
 *
 * @param string $str
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
static function ElimianrAcentos($str)
{
    return str_replace( array('�','�','�','�','�', '�','�','�','�','�', '�','�'.'�','�','�',  '�','�'.'�','�','�', '�','�','�','�','�', '�','�','�','�','�', '�','�','�','�','�', '�','�','�','�','�'),
                        array('A','E','I','O','U', 'A','E','I','O','U', 'A','E','I','O','U',  'A','E','I','O','U', 'a','e','i','o','u', 'a','e','i','o','u', 'a','e','i','o','u', 'a','e','i','o','u'), $str );
}