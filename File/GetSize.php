<?php
// ----------------------------------------------------------------------------
// GetSize
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
    /**
         * Retorna el tamany de l'arxiu, no es necessari que estigui obert
         *
         * @return int
         */
        static function get_size( $sFileName )
        {
            $ret = filesize( $sFileName );
            if( $ret === false )
            {
                throw new Exception('No es pot obtenir el tamany de l\'arxiu: '.$sFileName);
            }
            return $ret;
        }
?>
             