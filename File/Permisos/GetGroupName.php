<?php
// ----------------------------------------------------------------------------
// GetGroupName
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna el nom del grup de l'arxiu
         *
         * @return string
         */
        static function get_group_name( $sFileName)
        {
            $nId = filegroup( $sFileName  );
            if( $nId === false)
            {
                throw new Exception('No es pot obtenit el nom del grup de l\'arxiu: '.$sFileName);
            }
            $arr = posix_getgrgid( $nId );
            if( is_null($arr) || count($arr)==0 )
            {
                throw new Exception('No es pot obtenit el nom posix del grup de l\'arxiu: '.$sFileName);
            }
            return $arr['name'];
        }
?>
