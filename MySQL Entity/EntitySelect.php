<?php
/**
     * Executem un select simple
     *
     * <code>
     * try
     * {
     *     $hDB = MYSQL::open( $cnn );
     *     $rResult = MYSQL::value_select( $hDB, 'personal',
     *                 array( 'nom', 'neixement'),                        // -- Select
     *                 array( 'edat', '>', 18, 'AND'),                    // -- Where
     *                 array( 'neixement', '=', SQL::to_date(02-12-2006)),    // -- Where
     *                 array( 'salari'));            // -- Order by
     *     MYSQL::result_close( $rResult);
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
     * @param array | string $arrSelectFields
     * @param array $arrWhere
     * @param array $arrOrderBy
     * @param array $arrGroupBy
     * @return resource
     */
    static function value_select( $hDB, $sTable, $asSelectFields, $arrWhere=false, $arrOrderBy=false, $arrGroupBy=false)
    {
        $sql = 'SELECT ';
        if( is_array($asSelectFields))
        {
            $sql .= implode(',',$asSelectFields);
        }
        else
        {
            $sql .= $asSelectFields ;
        }
        $sql .= ' FROM '.$sTable;
        if( $arrWhere )
        {
            $sql .= ' WHERE ' . implode(' ',$arrWhere);
        }
        if( $arrGroupBy )
        {
            $sql .= ' GROUP BY ' . implode(' ',$arrGroupBy);
        }
        if( $arrOrderBy )
        {
            $sql .= ' ORDER BY ' . implode(' ',$arrOrderBy);
        }
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
