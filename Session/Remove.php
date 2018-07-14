<?php
// ----------------------------------------------------------------------------
// Remove
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         *    Eliminem de la sesió una variable
         *
         * @param String     Nom de la variable a eliminar
         *
         * @version     3.0        => 24-06-2008
         */
        static function remove($sLiteral )
        {
            unset( $_SESSION[ $sLiteral ] );
        }
?>
          