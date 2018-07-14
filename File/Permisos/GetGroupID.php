<?php
// ----------------------------------------------------------------------------
// GetGroupId
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna l'identificador del grup de l'arxiu
         *
         * @return int
         */
        static function get_group_id($sFileName )
        {
            $nId = filegroup( $sFileName );
            if( $nId === false)
            {
                throw new Exception('No es pot obtenit l\'identificador del grup de l\'arxiu: '.$sFileName);
            }
            return $nId;
        }
?>
        