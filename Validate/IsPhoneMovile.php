
<?php
/**
         * Número de telefono móbil
         *
         * @param string $sPhone
         * @return bool
         */
        static function is_phone_movile( $sPhone6 )
        {
            $sPhone6 = trim($sPhone6);
            $bOk = ( eregi( "^[0-9]+$", $sPhone6 ) && strlen(trim($sPhone6)) == 9 );
            $nIdCodigo = intval(substr( $sPhone6,0,1));
            return ($nIdCodigo == 6 && $bOk);
        }
?>
