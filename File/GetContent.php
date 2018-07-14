<?php
// ----------------------------------------------------------------------------
// GetContent
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna tot el contingut de l'arxiu en un string
         *
         * @param int $nOffset
         * @param int $nMaxBytes
         * @return string
         */
        function get_contents( $sPathFile, $nOffset=null, $nMaxBytes=null)
        {
            if( is_null( $nOffset ))
            {
                $ret = file_get_contents($sPathFile );
            }
            else
            {
                $ret = file_get_contents( $sPathFile, null, null, $nOffset, $nMaxBytes );
            }
            if( $ret === false )
            {
                throw new Exception('No es pot llegir el contingut de l\'arxiu: '.$sPathFile);
            }
            return $ret;
        }
?>
