<?php
// ----------------------------------------------------------------------------
// ToText
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un texto del post
         *
         * @param string $strName
         * @param mixed $sDefValue
         * @return string
         */
        static function to_text( $strName, $sDefValue=null )
        {
            //return nl2br(htmlspecialchars(self::to_str(  $strName, $sDefValue )));
            return self::to_str(  $strName, $sDefValue );
        }

?>
                      