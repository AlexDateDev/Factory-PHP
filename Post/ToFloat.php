<?php
// ----------------------------------------------------------------------------
// ToFloat
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un valor int del POST o nDefValue si no existe
         *
         * @param string $strName
         * @param int $nDefValue
         * @return float
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_float( $strName, $nDefValue=null )
        {
            $nPos = strpos( $strName, '.');
            if( $nPos !== false )
            {
                $strName = substr( $strName, $nPos+1, strlen($strName));
            }
            if( array_key_exists($strName, $_POST ))
            {
                $f = ''.$_POST[$strName];
                if(empty($f))
                {
                    return $nDefValue;
                }

                // -- 123
                // -- 123,45
                // -- 123.50
                // -- 1.234,50
                // -- 1,234.50

                $bOK = preg_match( "/^-?[0-9]+([,\.][0-9]*)?$/", $f );
                if( $bOK)
                {
                    $f = str_replace(',','.',$f);
                    $f = floatval($f);
                }
                return $f;
                /*

                // expresion   /^-?[0-9]+([,\.][0-9]*)?$/
                // expresion   /^-?[0-9]+([,\.][0-9]{1,2})?$/    dos decomales
                // -- 200,34
                // -- 1.200,34 => 1200,34

                $f = str_replace('.','',$f);
                $sFloat = str_replace(',','.',$f);
                $fFloat = floatval($sFloat);
                if( !is_float( $fFloat) && !is_int( $fFloat))
                {
                    alert( 'POST FLOAT: Valor POST no es un float o integer: ' . $strName  );
                    return $nDefValue;
                }
                return floatval( $fFloat); //$_POST[ $strName ]);
                */
            }
            else
            {
                return $nDefValue;
            }
        }
?>
