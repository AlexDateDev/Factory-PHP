<?php
// ----------------------------------------------------------------------------
// ToEuro
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un valor en formato monetario +/- 1.234,00 €
         *
         * @param float |int $value
         * @param bool $bSimbol
         * @return string
         *
         * @version     3.1d    => 17-07-2009    // Si value esta vacio, devuelve vacio
         * @version     3.0        => 19-06-2008
         */
        static function ToEuro($value, $bSimbol=true)
        {
            if( $value === '' || is_null($value))
            {
                return '';
            }
            $f = floatval($value);
            $sSimbol = $bSimbol ? ' €':'';
            if(empty($f))
            {
                return '0,00'.$sSimbol;
            }
            if( $f >= 0 )
            {
                $sSigno = '';
            }
            else
            {
                $f *= (-1);
                $sSigno ='- ';
            }
            $t = number_format($f,2,',','.');
            return $sSigno.$t.$sSimbol;
        }
?>
