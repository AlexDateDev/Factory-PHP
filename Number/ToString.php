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
         * Devuelve un string en format decimal de un numero, Per defecto no muestra decimales, separador miles el punto
         *
         * @param int $nNum Numero a convertir
         * @param int $nDescimals Numero de decimales a mostrar
         * @param string $sSepDecimals Separador de decimales
         * @param string $sSepMiles Separador de milers
         * @return string
         * @package String
         *
         * @version         3.1        => 05-04-2009    => Error si nDecimales=0, se mostrava la coma
         * @version         3.0        => 24-06-2008
         */
        static function ToStr( $fNum, $nDescimals=0, $bRedondejar=true )
        {                                  
            $sSepDecimals='';
            if($nDescimals!=0)
            {
                $sSepDecimals=',';
            }
            $sSepMiles='.';
            if( empty($fNum))
            {
                return '0';
            }
            if( !$bRedondejar )
            {
                return number_format ( $fNum, $nDescimals, $sSepDecimals, $sSepMiles);
            }
            $str = number_format ( $fNum, $nDescimals+1, $sSepDecimals, $sSepMiles);
            return substr( $str, 0,  strlen( $str)-1);
        }
?>
