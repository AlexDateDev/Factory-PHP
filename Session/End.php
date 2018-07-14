<?php
// ----------------------------------------------------------------------------
// End
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Finaliza la sessión
         *
         * @version     3.0        => 24-06-2008
         */
        static function end()
        {
            session_destroy();
            $_SESSION = null;
        }

?>
                          