
<?php              
/**
* Manipluación de sentencias SQL INNER JOIN
*
* @author         Alexandre Solé i Faura
* @filesource    SQL_INNER_JOIN.class.php
*
* @version         3.1        => 29-10-2009    => add_having
*                                         => is_where
* @version         3.0        => 24-06-2008
*
*
    function __construct        (  )
    function __toString            ()
    function add_from            ( $sTable, $sTableAlias='' )
    function add_select            ( $sCondition, $sAlias='')
    function add_select_fld        ( $sTableAlias, $sField, $sAliasField=null)
    function add_select_array    ( $sTableAlias, $arrField )
    function add_where            ( $sAlias1, $sFld1='', $sCondicio='', $sAlias2='', $sFld2='')
    function add_where_int        ( $sAlias1, $sFld1, $sCondicio, $nNum)
    function add_where_str        ( $sAlias1, $sFld1, $sCondicio, $sStr)
    function add_where_date        ( $sAlias1, $sFld1, $sCondicio, $sDateSTD)
    function add_where_date_time( $sAlias1, $sFld1, $sCondicio, $sDateTimeSTD)
    function add_where_bool        ( $sAlias1, $sFld1, $sCondicio, $bBool)
    function add_order_by        ( $sTableAlias, $sFld, $bASC=true )
    function add_group_by        ( $sAlias, $sFld )
    function get_query            ( )
    function get_object            ( $alias, $arrObj )
    function add_having         ( $sCondition )
    function is_where             (  )
*
*/

if( !class_exists('SQL_INNER_JOIN',false))
{
    class SQL_JOIN
    {
        private $_sTable = '';
        private $_sValues = '';
        private $_sJoin = '';
        private $_sWhere ='';
        private $_sOrderBy='';
        private $_sGroupBy='';
        private $_sHaving='';

        /**
         * Constructor
         *
         */
        public function __construct( )
        {
        }

        /**
         * Selecciona uno o varios valores a devolver el select
         *
         * @param string | array $asValue
         * @param string $sAlias
         * @return SQL_JOIN
         */
        function &values( $asValue, $sAlias='')
        {
            if( !empty($this->_sValues))
            {
                $this->_sValues .= ',';
            }
            if( is_array($asValue))
            {
                // - Un array no puede llevar alias
                if( !empty($sAlias))
                {
                    alert( 'No puede haber una alias sobre un valor array');
                }
                $this->_sValues .= join( ',', $asValue);
            }
            else
            {
                // -- String
                $this->_sValues .= $asValue;
                if( !empty($sAlias))
                {
                    // -- Alias del string
                    $this->_sValues .= ' AS '.$sAlias;
                }
            }
            return $this;
        }

        /**
         * Asigna la tabla del select
         *
         * @param strng $sTable
         * @return SQL_JOIN
         */
        function &from( $sTable, $sAlias='' )
        {
            $this->_sTable = $sTable;
            if( !empty($sAlias))
            {
                $this->_sTable .= ' AS '.$sAlias;
            }
            return $this;
        }

        /**
         * Inserta una INNER JOIN en la sentencia SQL
         *
         * @param string $sTable
         * @param string $sAlias
         * @return SQL_JOIN
         */
        function &inner_join( $sTable, $sAlias='')
        {
            $this->_sJoin .= ' INNER JOIN '.$sTable;
            if( !empty($sAlias))
            {
                $this->_sJoin .= ' AS '.$sAlias;
            }
            return $this;
        }

        /**
         * Inserta una LEFT JOIN en la sentencia SQL
         *
         * @param string $sTable
         * @param string $sAlias
         * @return SQL_JOIN
         */
        function &left_join( $sTable, $sAlias='')
        {
            $this->_sJoin .= ' LEFT JOIN ('.$sTable.') ';
            if( !empty($sAlias))
            {
                $this->_sJoin .= ' AS '.$sAlias;
            }
            return $this;
        }
        /**
         * Asigna una condición where
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_JOIN
         */
        function &on( $sCond1, $sFunc='', $sCond2='' )
        {
            $this->_sJoin .= ' ON ' .$sCond1 . ' ' . $sFunc . ' '. $sCond2;
            return $this;
        }

        /**
         * Asigna una condición where
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_JOIN
         */
        function &where( $sCond1, $sFunc='', $sCond2='' )
        {
            $this->_sWhere .= ' ' .$sCond1 . ' ' . $sFunc . ' '. $sCond2;
            return $this;
        }

        /**
         * Asigna una condición AND
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_JOIN
         */
        function &and_( $sCond1, $sFunc='', $sCond2='' )
        {
            $this->_sWhere .= ' AND ' .$sCond1 . ' ' . $sFunc . ' '. $sCond2;
            return $this;
        }

        /**
         * Asigna una condición OR
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_JOIN
         */
        function &or_( $sCond1, $sFunc='', $sCond2='' )
        {
            $this->_sWhere .= ' OR ' .$sCond1 . ' ' . $sFunc . ' '. $sCond2;
            return $this;
        }


        /**
         * Ordenación del sql por uno o varios valores
         *
         * @param string | array $asValue
         * @param bool $sAsc
         * @return SQL_JOIN
         */
        function &order_by( $asValue, $sAsc=true)
        {
            if( !empty( $this->_sOrderBy))
            {
                $this->_sOrderBy .= ',';
            }
            if( is_array($asValue))
            {
                $this->_sOrderBy .= join( ',', $asValue);
            }
            else
            {
                $this->_sOrderBy .= $asValue;
                if( !$sAsc)
                {
                    $this->_sOrderBy .= ' DESC ';
                }
            }
            return $this;
        }

        /**
         * Agrupación del sql en función de uno o varios campos
         *
         * @param string | array $asValue
         * @return SQL_JOIN
         */
        function &group_by( $asValue )
        {
            if( !empty( $this->_sGroupBy))
            {
                $this->_sGroupBy .= ',';
            }
            if( is_array($asValue))
            {
                $this->_sGroupBy .= join( ',', $asValue);
            }
            else
            {
                $this->_sGroupBy .= $asValue;
            }
            return $this;
        }

        /**
         * Agrupación HAVING del sql en función de uno o varios campos
         *
         * @param string | array $asValue
         * @return SQL_JOIN
         */
        function &having( $asValue )
        {
            if( is_array($asValue))
            {
                $this->_sHaving .= join( ' ', $asValue);
            }
            else
            {
                $this->_sHaving .= $asValue;
            }
            return $this;
        }

        /**
         * Muestra el sql en un alert
         *
         * @return SQL_JOIN
         */
        function &alert( )
        {
            alert( $this->__toString() );
            return $this;
        }

        /**
         * Muestra el sql por una página web
         *
         * @return SQL_JOIN
         */
        function &pr( )
        {
            pr( $this->__toString() );
            return $this;
        }

        /**
         * Devuelve la sentencia sql como un string
         *
         * @return string
         */
        function __toString()
        {
            $sTmp = 'SELECT ' .
                    $this->_sValues .
                    ' FROM ' . $this->_sTable;
            if( !empty($this->_sJoin))
            {
                $sTmp .= $this->_sJoin;
            }
            if( !empty($this->_sWhere))
            {
                $sTmp .= ' WHERE ' . $this->_sWhere;
            }
            if( !empty($this->_sGroupBy))
            {
                $sTmp .= ' GROUP BY '.$this->_sGroupBy;
            }
            if( !empty($this->_sHaving))
            {
                $sTmp .= ' HAVING '. $this->_sHaving;
            }
            if( !empty($this->_sOrderBy))
            {
                $sTmp .= ' ORDER BY ' .$this->_sOrderBy;
            }
            return $sTmp;
        }

        /**
         * Ejecuta la consulta
         *
         * @param DB_CONNECTION $cnn
         * @return resource
         */
        function execute( DB $oDB )
        {
            return $oDB->execute($this->__toString());
        }

        /**
         * Indica si ya hay una condición where (true) o esta vacia (false)
         *
         * @return bool
         */
        function is_where()
        {
            return !empty($this->_sWhere);
        }


        /**
         * Ejecuta la consulta y devuelve el resultado como xml grid
         *
         * @param DB_CONNECTION $cnn
         * @return resource
         */
        function grid_execute( $oDB, $sControllerPage )
        {
            $hPortal = $oDB->get_handle();
            $rResource = mysql_query( $this->__toString(), $hPortal );
            if( !$rResource )
            {
                db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta xml [['.$sQuery.']] ' );
            }
            $nCols = mysql_num_fields( $rResource );
            $p = mysql_num_rows( $rResource );
            if( $p === false )
            {
                db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__. ' - Impossible retornar el número de files xml' );
            }

            header("Content-type:text/xml");
            echo '<?xml version="1.0" encoding="iso-8859-1"?><rows>';
            $nRows=1;
            for( $n=$p-1; $n>=0; $n--)
            {
                $aTmp = mysql_fetch_row( $rResource );
                echo '<row id="'.$aTmp[0].'"><cell style="color:#AAA;">'.$nRows++ . '</cell>';
                for( $nCol=0; $nCol <$nCols;$nCol++)
                {
                    if( $nCol==0)
                    {
                        $nId = $aTmp[$nCol];
                        continue;
                    }
                    if( $nCol == 1)
                    {
                        $sParamUrl = SYSTEM::mount_url_param( 0, 0, $nId, MENU_APP::POST_URL, MENU_APP::TARGET_NEW );
                        $sCell = $aTmp[$nCol] . '^'.HTTP_APP. $sControllerPage .'?'.$sParamUrl.'^_black';
                    }
                    else
                    {
                        $sCell = $aTmp[$nCol];
                    }
                    echo '<cell>'.htmlspecialchars($sCell).'</cell>';
                }
                echo '</row>';
            }
            echo '</rows>';
            mysql_free_result ( $rResource);
        }
    }
}
?>
