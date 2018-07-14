<?php
// ----------------------------------------------------------------------------
// GetdateModified
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna la dataSTD (dd-mm-yyyy) de l'última modificació sempre i quan s'haigi guardat a axriu,
         * no es necessari que esitgui obert
         *
         * @return dateSTD (dd-mm-yyyy)
         */
        static function get_date_last_modified( $sFileName )
        {
            $ret = filemtime( $sFileName );
            if( $ret === false )
            {
                throw new Exception('No es pot obtenir la data de l\'última modificació de l\'arxiu');
            }
            return date( 'd-m-Y', $ret);
        }
?>
            