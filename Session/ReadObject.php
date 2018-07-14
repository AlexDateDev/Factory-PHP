<?php
// ----------------------------------------------------------------------------
// ReadObject
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Recupera un objeto encriptado y comprimido de la sessión
         *
         * @param string $nombre
         * @return OBJECT
         *
         * @version     3.0        => 24-06-2008
         */

        static function read_object($nombre)
        {
            if (isset($_SESSION[$nombre]))
               {
                   if(  self::$_bCompressCrypt )
                   {
                       $contenido=self::get_unzip($_SESSION[$nombre]);
                   }
                   else
                   {
                       $contenido=$_SESSION[$nombre];
                   }
                if (is_object($contenido))
                {
                       return $contenido;
                }
               }
               throw new Exception( 'No se puede recuperar el valor "'.$nombre.'" de la session"');
        }
?>
