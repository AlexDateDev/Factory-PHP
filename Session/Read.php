<?php
// ----------------------------------------------------------------------------
// Read
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
        * Retorna un objecte guardat en un paràmetre de la sessió.
        * Retorna null si no existeix o redirecciona ala url de login
        *
        * @param string     Nom del variable a recuperar de la sessió
        * @param bool Indica si s'ha de demanar login si la variable no existeix
        * @return Objecte  Variable u objecte guardat o null si no existeix
        *
        * @version     3.0        => 24-06-2008
        */

        static function Read( $sLiteral, $bLogin=false)
        {
            if( isset($_SESSION[ $sLiteral ]))
            {
                   if(  self::$_bCompressCrypt )
                   {
                    return self::get_unzip($_SESSION[ $sLiteral]);
                   }
                   else
                   {
                       return $_SESSION[ $sLiteral ];
                   }
            }
            if( $bLogin )
            {
                // -- Usuari no autenticat
                header( 'location: ' . URL_HTTP_LOGIN);
                exit(0);
            }                 
            return null;
        }
?>
