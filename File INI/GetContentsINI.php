<?php
// ----------------------------------------------------------------------------
// GetContents
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve el contenido del archivo o el de una sección determinada
         *
         * @param string_path_file $sPathFile
         * @param string $sSection
         * @return array
         */
        static function get_contents($sPathFile,$sSection='')
        {
            if(empty($sSection))
            {
                return parse_ini_file($sPathFile);
            }
            else
            {
                $arr = parse_ini_file($sPathFile,true);
                $aKeys = array_keys($arr);
                if(in_array($sSection,$aKeys))
                {
                    $p=array_search($sSection,$aKeys);
                    $n=0;
                    foreach ($arr as $sOneValue)
                    {
                        if($n==$p)
                        {
                            return $sOneValue;
                        }
                        $n++;
                    }
                }
                else
                {
                    return array();
                }
            }
        }
?>
