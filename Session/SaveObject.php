ç<?php
// ----------------------------------------------------------------------------
// SaveObject
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Guarda en contenido de un objeto en la sesion de forma encriptada y comprimida
         *
         * @param OBJECT $Obj
         * @param string $nombre
         * @return true
         *
         * @version     3.0        => 24-06-2008
         */
        static function save_object($Obj,$nombre)
        {
            if (is_object($Obj))
            {
                if( self::$_bCompressCrypt )
                {
                    $Obj=self::get_zip($Obj);
                }
                 $_SESSION[$nombre]=$Obj;
            }
            throw new Exception( 'No se puede guardar el valor "'.$nombre.'" a la session"');
        }
?>
         