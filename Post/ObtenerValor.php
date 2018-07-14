<?php
// ----------------------------------------------------------------------------
// Value
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
* Devuelve un valor del POST
*
* @param string $strName
* @param mixed $sDefValue
* @return mixed
*/
static function obtenerValor( $clave, $valorDefecto=null)
{
	if( !array_key_exists($clave, $_POST )){
    	return $valorDefecto;
	}
	return ''.$_POST[$clave];
}
?>
                    