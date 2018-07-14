<?php
// ----------------------------------------------------------------------------
// ToString
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve una variable STRING del post o un valor por defecto si no existe o no es un string
 * Elimina " y escapa las comillas simples
 *
 * @param string $strName
 * @param string $sDefvalue
 * @return string
 *
 * @version     3.0        => 24-06-2008
 */
function post_to_str( $strName, $sDefValue=null )
{
    if( !array_key_exists($strName, $_POST )){
        return $sDefValue;
    }
    $str = $_POST[ $strName];
    if ( !get_magic_quotes_gpc() ){
        $str = addslashes($str);
    }
    return str_replace( '"',"'",$str);
}
                    
?>
