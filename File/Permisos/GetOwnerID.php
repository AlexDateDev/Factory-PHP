<?php
// ----------------------------------------------------------------------------
// GetOwnerId
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
         * Retorna l'identificador del propietari de l'arxiu
         *
         * @return int
         */
        static function get_owner_id( $sFileName)
        {
            $nId = fileowner( $sFileName  );
            if( $nId === false)
            {
                throw new Exception('No es pot obtenit l\'identificador del propietari de l\'arxiu: '.$sFileName);
            }
            return $nId;
        }
?>
         