<?php
// ----------------------------------------------------------------------------
// GetDateLastAccess
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retoprna la data STD de l'últim access a l'arxiu
         *
         * @return string_date_std
         */
        static function get_date_las_access( $sFileName)
        {
            $ret = fileatime( $sFileName );
            if( $ret === false )
            {
                throw new Exception('No es pot obtenir la data de l\'últim acces de l\'arxiu: '.$sFileName);
            }
            return date( 'd-m-Y', $ret);
        }
?>
