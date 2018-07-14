<?php
// ----------------------------------------------------------------------------
// Open
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/*
     *
     * r
     *     Només permet llegir. No es pot escriure mentres esta obert.
     *     Punter a l'inici de l'arxiu a l'obrir.
     *     Falla si l'arxiu no existeix.
     *
     * r+
     *     Es pot llegir i escriure.
     *     Punter a l'inici de l'arxiu a l'obrir.
     *     Falla si l'arxiu no existeix.
     *
     * w
     *     Només permet escriure. No llegir.
     *     Punter a l'inici de l'arxiu a l'obrir.
     *     Si l'arxiu no existeix, es crea. Si esta creat el trunca.
     *                               
     * w+
     *     Permet escriure i llegir.
     *     Punter a l'inici de l'arxiu a l'obrir.
     *     Si l'arxiu no existeix, es crea. Si esta creat el trunca.
     *
     * a
     *     Només permet escriure. No llegir.
     *     Punter al final de l'arxiu a l'obrir.
     *     Si l'arxiu no existeix, es crea.
     *
     * a+
     *     Permet escriure i llegir.
     *     Punter al final de l'arxiu a l'obrir.
     *     Si l'arxiu no existeix, es crea.
     *
     * TypeMode
     * t = ''
     *     text
     * b
     *     bin
     */

        static function open( $sPathFileName, $openMode, $typeMode='' )
        {
            $handle = @fopen( $sPathFileName, $openMode . $typeMode );
            if( ! $handle )
            {
                throw new Exception('No es pot obrir l\'arxiu: ' . $sPathFileName . ', mode: ' . $openMode);
            }
            return $handle;
        }

?>
