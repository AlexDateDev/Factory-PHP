  
<?php
/**
     * Eliminem un registre d'una taula, o tot el contigut de la taula
     *
     * <code>
     * try
     * {
     *    $hDB = MYSQLL::open( $cnn );
     *     // -- Eliminem tot el contingut
     *    $nRewsDeleted = MYSQL::value_delete( $hDB, 'tb_name');
     *     ...
     *     // -- Eliminem rel registres que cumpleixen una certa condició
     *     $nRowsdeleted = MYSQL::value_delete( $hDB, 'tb_name2',
     *                         array(    'id', '=', SQL::to_int( 123 ),
     *                                 'AND',
     *                                 'creacio', '>', SQL::to_date( '10-04-2007')));
     *
     *    MYSQL::close( $hDB );
     * }
     * catch( Exception $e)
     * {
     *     echo $e->getMessage();
     * }
     * </code>
     *
     * @param resource $rHandle
     * @param string $sTable
     * @param array $arrWhere
     */
    static function value_delete( $hDB, $sTable, $arrWhere=false )
    {
        $sql = 'DELETE FROM '.$sTable;
        if( $arrWhere )
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
