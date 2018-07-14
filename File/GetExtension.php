<?php
// ----------------------------------------------------------------------------
// GetExtension
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
    /**
         * Retorna l'extensió de l'arxiu, no es necessari que estigui obert
         *
         * @return string
         */
        static function get_extension($sFileName )
        {
            $aTemp = pathinfo( $sFileName);
            return $aTemp['extension'];
            
            //$extension = pathinfo($nombreArchivo ,PATHINFO_EXTENSION);
        }
?>
                             