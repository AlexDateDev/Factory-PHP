<?php
// ----------------------------------------------------------------------------
// ToStd
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Convierte una feche formato MYSQL (yyy-mm-dd) a formato STD (dd-mm-yyyy)
 *
 * @param string $sDateMYSQL
 * @return string o vacio si no hay fecha
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 12-04-2008
 */
static function ToSTD( $fechaMYSQL, $sep='-')
{
    if( empty($fechaMYSQL)){
        return '';
    }
    if(!@preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $fechaMYSQL) && !@preg_match("/^\d{4}-\d{2}-\d{2}$/", $fechaMYSQL)){
      return '';
    }
    list($any,$mes,$dia) = split('[/.-]', $fechaMYSQL);
    return $dia.$sep.$mes.$sep.$any;
}
?>
                            