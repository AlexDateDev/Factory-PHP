<?php
// ----------------------------------------------------------------------------
// SqlSelect
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
* Manipluación de sentencias SQL SELECT
*
* @author         Alexandre Solé i Faura
* @filesource    SQL_SELECT.class.php
*
* @version         3.1b    => 09-06-2009    => is_where
* @version         3.1a    => 24-03-2009    => set_rows_offset, set_rows_limit
* @version         3.0        => 24-06-2008
*
*
*     function __construct( $sTable )
    function __toString()

    function add_select                    ( $sCondition, $sAlias='')
    function add_select_fld                ( $sField, $sAliasField='')
    function add_select_all                ( )
    function add_select_array            ( $arrField )
    function add_select_array_string    ($asFields)
    function add_where                    ( $val , $sANDOR='')
    function add_where_str                ( $sField, $sCond, $sStr, $sANDOR='')
    function add_where_int                ( $sField, $sCond, $nNum, $sANDOR='')
    function add_where_float            ( $sField, $sCond, $fFloat, $sANDOR='')
    function add_where_date                ( $sField, $sCond, $sDateSTD, $sANDOR='')
    function add_where_date_time        ( $sField, $sCond, $sDateTimeSTD, $sANDOR='')
    function add_where_bool                ( $sField, $sCond, $bBool, $sANDOR='')
    function add_order_by                ( $sFld, $bASC=true )
    function add_group_by                ( $sFld )
    function set_rows_offset            ($nRows)
    function set_rows_limit                ($nRows)
    function get_total_rows_found        ($hPortal='')
    function get_query                    ( )
    function is_where                     (  )

*
*/

if( !class_exists('SQL_SELECT',false))
{
    class SQL_SELECT
    {
        private $_sTable     = '';
        private $_sValues     = '';
        private $_sWhere     = '';
        private $_sOrderBy    = '';
        private $_sGroupBy    = '';
        private $_sHaving    = '';
        private $_nLimit    = '';

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
         * @return SQL_SELECT
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
         * @return SQL_SELECT
         */
        function &from( $sTable )
        {
            $this->_sTable = $sTable;
            return $this;
        }

        /**
         * Establece el límite de registros a devolver
         *
         * @param int $nLimit
         * @return SQL_SELECT
         */
        function &limit( $nLimit )
        {
            $this->_nLimit = $nLimit;
            return $this;
        }

        /**
         * Asigna una condición where
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_SELECT
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
         * @return SQL_SELECT
         */
        function &and_( $sCond1='', $sFunc='', $sCond2='' )
        {
            $this->_sWhere .= ' AND ' .$sCond1 . ' ' . $sFunc . ' '. $sCond2;
            return $this;
        }

        /**
         * Fechas entre un periodo inicial y final
         *
         * @param unknown_type $sFieldInicio
         * @param unknown_type $dInicio
         * @param unknown_type $sFieldFin
         * @param unknown_type $dFin
         * @return SQL_SELECT
         */

        function &between_dates( $sFieldInicio, $dInicio, $sFieldFin, $dFin )
        {
            $dInicio= SQL::to_date($dInicio);
            $dFin     = SQL::to_date($dFin);

            $this->_sWhere .=  '(('.$sFieldInicio. ' BETWEEN ' .$dInicio.' AND '.$dFin.') OR';
            $this->_sWhere .=  '('.$sFieldFin    . ' BETWEEN ' .$dInicio.' AND '.$dFin.') OR';
            $this->_sWhere .=  '('.$sFieldInicio. ' <= ' .$dInicio.' AND '.$sFieldFin .'>='. $dFin.') OR';
            $this->_sWhere .=  '('.$sFieldInicio. ' <= ' .$dInicio.' AND '.$sFieldFin .' IS NULL))';
            return $this;
        }

        /**
         * Periodo para una fecha
         *
         * @param unknown_type $sFieldInicio
         * @param unknown_type $sFieldFin
         * @param unknown_type $dFecha
         * @return SQL_SELECT
         */
        function &between_on_date( $sFieldInicio, $sFieldFin, $dFecha )
        {
            $dFecha= SQL::to_date($dFecha);

            $this->_sWhere .=  '(('.$sFieldInicio. ' <= ' .$dFecha.' AND '.$sFieldFin. '>='.$dFecha.') OR ';
            $this->_sWhere .=  '('.$sFieldInicio. ' <= ' .$dFecha.' AND '.$sFieldFin .' IS NULL ))';
            return $this;
        }

        /**
         * Asigna una condición OR
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_SELECT
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
         * @return SQL_SELECT
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
         * @return SQL_SELECT
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
         * @return SQL_SELECT
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
         * @return SQL_SELECT
         */
        function &alert( )
        {
            alert( $this->__toString() );
            return $this;
        }

        /**
         * Muestra el sql por una página web
         *
         * @return SQL_SELECT
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
//            $sTmp = 'SELECT SQL_CALC_FOUND_ROWS' .
            $sTmp = 'SELECT ' .
                    $this->_sValues .
                    ' FROM ' . $this->_sTable;
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
            if( !empty($this->_nLimit))
            {
                $sTmp .= ' LIMIT ' .$this->_nLimit;
            }
//            $sTmp .= ' LIMIT 80';
            return $sTmp;
        }

        /**
         * Ejecuta la consulta y devuelve el resultado como xml grid
         *
         * @param DB_CONNECTION $cnn
         * @return resource
         */
        function grid_execute( $oDB )
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
            for( $n=$p; $n>=0; $n--)
            {
                $aTmp = mysql_fetch_row( $rResource );
                echo '<row id="'.$aTmp[0].'"><cell style="color:#AAA;">'.$nRows++ . '</cell>';
                for( $nCol=0; $nCol <$nCols;$nCol++)
                {
                    echo '<cell>'.$aTmp[$nCol].'</cell>';
                }
                echo '</row>';
            }
            echo '</rows>';
            mysql_free_result ( $rResource);
        }

        /**
         * Ejecuta la consulta
         *
         * @param DB_CONNECTION $cnn
         * @return resource
         */
        function execute( $oDB )
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
    }

    ////////////////////////////////
//    class SQL_SELECT
//    {
//        private $_sTable;
//        private $_sWhere = '';
//        private $_sSelect = '';
//        private $_sOrderBy = '';
//        private $_sGroupBy = '';
//        private $_nRowsBegin=0;
//        private $_nRowsLimit=0; // -- Filas pro pgina
//        private $_sHaving = '';
//        private $_sCalcFoundRows='';
//
//
//        /**
//         * Constriuctir
//         *
//         * @param String $sTable
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function __construct( $sTable )
//        {
//            $this->_sTable = $sTable;
//        }
//
//        /**
//         * Devuelve el texto del SQL
//         *
//         * @return string
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function __toString()
//        {
//            return $this->get_query();
//        }
//
//        /**
//         * Añade una condición HAVING
//         *
//         * @param string $sCondition
//         */
//        function add_having( $sCondition )
//        {
//            $this->_sHaving .= $sCondition;
//        }
//
//        /**
//         * Indica si ya hay una condición where (true) o esta vacia (false)
//         *
//         * @return bool
//         */
//        function is_where()
//        {
//            return !empty($this->_sWhere);
//        }
//        /**
//         * Ordenació de la sortida
//         *
//         * @param string $sAlias Nom de la taula
//         * @param string $sFld Nom del camp
//         * @param string $sCond Tipus ordenacio ASC o DESC
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_order_by( $sFld, $bASC=true )
//        {
//            if(!empty($this->_sOrderBy))
//            {
//                $this->_sOrderBy .=',';
//            }
//            $this->_sOrderBy .= $sFld;
//            if( !$bASC )
//            {
//                $this->_sOrderBy .= ' DESC';
//            }
//        }
//
//        /**
//         * Agrupaci de la sortida
//         *
//         * @param string $sAlias
//         * @param string $sFld
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_group_by( $sFld )
//        {
//            if( !empty($this->_sGroupBy))
//            {
//                $this->_sGroupBy .= ',';
//            }
//            $this->_sGroupBy .= $sFld;
//        }
//
//        /**
//         * Retorna la consulta SQL montada
//         *
//         * @return string_sql
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function get_query( )
//        {
//            $str = 'SELECT '.$this->_sCalcFoundRows.$this->_sSelect;
//            $str .= ' FROM '.$this->_sTable;
//            if( $this->_sWhere != '')
//            {
//                $str .= ' WHERE('.$this->_sWhere.')';
//            }
//            if( $this->_sGroupBy != '')
//            {
//                $str .= ' GROUP BY '.$this->_sGroupBy;
//            }
//            if(!empty($this->_sHaving))
//            {
//                $str .= ' HAVING '.$this->_sHaving;
//            }
//            if( $this->_sOrderBy != '')
//            {
//                $str .= ' ORDER BY '.$this->_sOrderBy;
//            }
//            if(!empty($this->_nRowsLimit))
//            {
//                $str .= ' LIMIT '.$this->_nRowsBegin.','.$this->_nRowsLimit;
//            }
//    //        LIMIT 0,20 // -- 20 primeros
//    //        LIMIT 5,20 // -- del 5 al 25
//            return $str;
//        }
//
//        /**
//         * Offset de done empezar a buscar
//         *
//         * @param int $nRows
//         *
//         * @version     3.1a    => 24-03-2009
//         * @version     3.0        => 24-06-2008
//         */
//        function set_rows_offset($nRows)
//        {
//            $this->_nRowsBegin=$nRows;
//        }
//
//        /**
//         * Número de filas a mostrar
//         *
//         * @param int $nRows
//         *
//         * @version     3.1a    => 24-03-2009
//         * @version     3.0        => 24-06-2008
//         */
//        function set_rows_limit($nRows)
//        {
//            $this->_sCalcFoundRows = ' SQL_CALC_FOUND_ROWS ';
//            $this->_nRowsLimit=$nRows;
//        }
//
//        /**
//         * Número total de filas de la consulta (sin limit)
//         *
//         * @param resource $hPortal
//         * @return int
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function get_total_rows_found($hPortal='')
//        {
//            if(!empty($hPortal))
//            {
//                global $hPortal;
//            }
//            $rs = db_execute('SELECT FOUND_ROWS( )',$hPortal);
//            $row =  db_fetch_row($rs);
//            return $row[0];
//        }
//
//        /**
//         * Assignem un sentencia select
//         *
//         * @param array $arrField
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_select_array( $arrField )
//        {
//            $this->_sSelect .= implode( ',',$arrField);
//        }
//
//        /**
//         * Seleccionamos todos los campos de la tabla
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_select_all( )
//        {
//            $this->_sSelect .= '*';
//        }
//
//        /**
//         * Seleccionamos un campo
//         *
//         * @param string $sField
//         * @param string $sAliasField
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_select_fld( $sField, $sAliasField='')
//        {
//            if( !empty($this->_sSelect))
//            {
//                $this->_sSelect .= ',';
//            }
//            $this->_sSelect .= $sField;
//            if(!empty($sAliasField))
//            {
//                $this->_sSelect .= ' AS '. $sAliasField;
//            }
//        }
//        /**
//         * Seleccionamos una condicion
//         *
//         * @param string $sCondition
//         * @param string $sAlias
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_select( $sCondition, $sAlias='')
//        {
//            if( !empty($this->_sSelect))
//            {
//                $this->_sSelect .= ',';
//            }
//            $this->_sSelect .= $sCondition;
//            if(!empty($sAlias))
//            {
//                $this->_sSelect .= ' AS '. $sAlias;
//            }
//        }
//
//
//        /**
//         * Seleccionamos los campos pasadso como un string o un array ('*' = todos)
//         *
//         * @param array | string $asFields Campos a seleccionar (def '*')
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_select_array_string($asFields)
//        {
//            if( is_array($asFields))
//            {
//                $this->add_select_array($asFields);
//            }
//            else
//            {
//                if( $asFields != '*')
//                {
//                    $this->add_select_fld($asFields);
//                }
//                else
//                {
//                    $this->add_select_all();
//                }
//            }
//        }
//
//        /**
//         * Condición WHERE
//         *
//         * @param string $val
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where( $val , $sANDOR='')
//        {
//            $this->_sWhere .= ' ' . $val .' ';
//            if( !empty($sANDOR))
//            {
//                $this->_sWhere .= ' ' . $sANDOR .' ';
//            }
//
//        }
//
//        /**
//         * Condición where con string
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param string $sStr
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_str( $sField, $sCond, $sStr, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_str($sStr), $sANDOR);
//        }
//
//        /**
//         * Condición where con integers
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param int $nNum
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_int( $sField, $sCond, $nNum, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_int($nNum), $sANDOR);
//        }
//
//        /**
//         * Condición where con float
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param float $fFloat
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_float( $sField, $sCond, $fFloat, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_float($fFloat), $sANDOR);
//        }
//
//        /**
//         * Condición where con dates
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param string $sDateSTD
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_date( $sField, $sCond, $sDateSTD, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_date($sDateSTD), $sANDOR);
//        }
//
//        /**
//         * Condición where con date time
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param string $sDateTimeSTD
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_date_time( $sField, $sCond, $sDateTimeSTD, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_date_time($sDateTimeSTD), $sANDOR);
//        }
//
//        /**
//         * Condición where con bool
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param bool $bBool
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_bool( $sField, $sCond, $bBool, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_bool($bBool), $sANDOR);
//        }
//
//    }
}
?>
