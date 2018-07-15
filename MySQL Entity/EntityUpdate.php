<?php
/**
     * Realiza un update de los registros de una tabla
     *
     * </code>
     * try
     * {
     *     $hDB = MYSQL::open( $cnn );
     *     $nRows = MYSQL::value_update( $hDB, 'personal',
     *                     array(     'nom'    => SQL::to_str('Pere'),    // -- Set
     *                             'preu'    => SQL::to_float( 12 )),
     *                     array(    'id', '=', SQL::to_int( 1 ) ));    // -- Where
     *     MYSQL::close( $hDB );
     * }
     * catch( Exception $e)
     * {
     *     echo $e->getMessage();
     * }
     * </code>
     *
     * @param resource $hDB
     * @param string $sTable
     * @param array $arrSetFields
     * @param array $arrWhere
     * @return int Número de registros actualizados
     */
    static function value_update( $hDB, $sTable, $arrSetFields, $arrWhere=false )
    {
        $sql = 'UPDATE '.$sTable . ' SET ';
        $n=0;
        foreach ( $arrSetFields as $fld => $val )
        {
            $sql .= ($n==0) ?  $fld .'='.$val : ','.$fld .'='.$val;$n++;
        }
        if($arrWhere)
        {
            $sql .= ' WHERE ' . implode(' ',$arrWhere);
        }
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
