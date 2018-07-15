
<?php
static function IsDate( $sDateSTD )
{
    if( !@preg_match("/^\d{2}-\d{2}-\d{4}$/", $sDateSTD)){
        return false;
    }
    list($nDia,$nMes,$nAny) = split('-', $sDateSTD);
    $d = date( 'd-m-Y', mktime( 0,0,0,$nMes, $nDia, $nAny));
    return ( $d== $sDateSTD );

}

/**
     * Comprueba si una fecha STD (dd-mm-yyyy) es corecta.
     * Devuelve false si esta vacia
     * Error si fecha < 1978 and > 2038
     *
     * @param string $sDateSTD
     * @return bool
     *
     * @version     3.0        => 12-4-2008
     */
    static function is_date( $sDateSTD )
    {
        if( self::is_empty($sDateSTD))
        {
            return false;
        }
        list($nDia,$nMes,$nAny) = split('-', $sDateSTD);
        $d = date( 'd-m-Y', mktime( 0,0,0,$nMes, $nDia, $nAny));
        return ( $d== $sDateSTD );
    }
?>
