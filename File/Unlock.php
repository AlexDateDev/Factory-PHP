<?php
// ----------------------------------------------------------------------------
// Unlock
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Desbloqueja un arxiu bloquejat<br>
         * Al fer un close( ) també es desbloqueja
         *
         */
        static function unlock( $hFile)
        {
            $ret = flock( $hFile, LOCK_UN  );
            if( $ret === false )
            {
                throw new Exception('No es pot desbloquejar l\'arxiu');
            }
        }

?>
        