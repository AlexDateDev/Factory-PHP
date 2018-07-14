<?php
// ----------------------------------------------------------------------------
// Exists
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Detecta si l'arxiu existeix
         * Retorna true si existeix o false si no existeix, nNo es necessari que estigui obert
         *
         * <b>Exemple</b>
         * <code>
         * $file = new FILE( 'name.txt');
         * ...
         * if( $file->exists( ) )
         * {
         *     ...
         * }              
         * </code>
         *
         * @return bool
         */
        static function exists( $sFileName )
        {
            return file_exists( $sFileName );
        }

?>
