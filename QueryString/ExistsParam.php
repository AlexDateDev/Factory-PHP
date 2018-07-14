<?php
// ----------------------------------------------------------------------------
// ExistsParam
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Indica si existe un parámetro
         *
         * @param string_url $sUrl
         * @return bool
         *
         * @version     3.0        => 24-06-2008
         */
        static function is_exists_param( $sUrl,$sParam )
        {
            $q = substr( $sUrl,strpos( $sUrl,'?')+1, strlen($sUrl));
            $a = explode('&',$q); // -- 'a[0] => id=234
            foreach ($a as $key => $value)
            {
                $b = explode('=',$a[$key]);  // $b[0] = id, $b[1]=1234
                if($b[0]==$sParam)
                {
                    return true;
                }
            }
            return false;

        }

?>                              
