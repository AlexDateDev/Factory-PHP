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
         * Indica si existe un parametro en el post
         *
         * @param string $sName
         * @return bool
         *
         * @version     3.0        => 24-06-2008
         */
        static function Exists( $sLiteral )
        {
            return isset($_SESSION[$sLiteral]);
        }
?>
        