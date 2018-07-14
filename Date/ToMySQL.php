<?php
// ----------------------------------------------------------------------------
// ToMysql
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Convierte una feche formato STD (dd-mm-yyyy) a formato MYSQL (yyy-mm-dd)
 *
 * @param string $sDateSTD
 * @return string_date_mysql o vacio si no hay fecha
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 12-04-2008
 */
static function ToMYSQL( $fechaSTD, $sep='-')
{
    if( empty($fechaSTD)){
        return '';        
    }
    
    $pattern = '/^\d{2}\\'.$sep.'\d{2}\\'.$sep.'\d{4}$/';    
    if(!@preg_match($patteern, $fechaSTD)){
      return '';
    }
    list($dia,$mes,$any) = split('[/.-]', $fechaSTD);
    return $any.$sep.$mes.$sep.$dia;
}
?>
                  