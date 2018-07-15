<?php
/**                      
     * Insertem un registre en una
     *
     * <code>
     * try
     * {
     *     $hDB = MYSQL::open( $cnn );
     *    MYSQL::value_insert( $hDB, 'tb_name',
     *            array(     'nom'             => SQL::to_str('Joan'),
     *                    'edat'            => SQL::to_int( 19 ),
     *                    'neixement'     => SQL::to_date('02-11-2002' ),
     *                    'creacio'        => SQL::to_date_time( '25-05-2007 16:36:07'),
     *                    'preu'            => SQL::to_float( 12.34),
     *                    'salari'        => SQL::to_int( 1233 ),
     *                    'descripcio'    => SQL::to_str('Descripcio del registre'),
     *                    'hora'            => SQL::to_time( '23:55:02'),
     *                    'disponible'    => SQL::to_bool( true ) ));
     *    MYSQL::close( $hDB );
     * }
     * catch( Exception $e )
     * {
     *     echo $e->getMessage();
     * }
     * </code>
     *
     * @param resource $hDB
     * @param string $sTable
     * @param array $arrSetFields
     */
    static function value_insert( $hDB, $sTable, $arrSetFields )
    {
        $sql = 'INSERT INTO '.$sTable .' SET ';
        $n=0;
        foreach ( $arrSetFields as $fld => $val )
        {
            $sql .= ($n==0) ?  $fld .'='.$val : ','.$fld .'='.$val;$n++;
        }
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
