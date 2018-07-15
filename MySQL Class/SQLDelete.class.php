<?php       
/**
* Manipluación de sentencias SQL DELETE
*
* @author         Alexandre Solé i Faura
* @filesource    SQL_DELETE.class.php
*
* @version     3.1        => 29-10-2009    => is_where
* @version     3.0        => 24-06-2008
*
    function __construct        ( $sTable )
    function __toString            ()
    function get_query            ()
    function add_where            ( $val, $sANDOR=null)
    function add_where_str        ( $sField, $sCond, $sStr, $sANDOR='')
    function add_where_int        ( $sField, $sCond, $nNum, $sANDOR='')
    function add_where_float    ( $sField, $sCond, $fFloat, $sANDOR='')
    function add_where_date        ( $sField, $sCond, $sDateSTD, $sANDOR='')
    function add_where_date_time( $sField, $sCond, $sDateTimeSTD, $sANDOR='')
    function add_where_bool        ( $sField, $sCond, $bBool, $sANDOR='')
*
*/

if( !class_exists('SQL_DELETE',false))
{
    class SQL_DELETE
    {
        private $_sTable = '';
        private $_sWhere ='';

        /**
         * Constructor
         *
         */
        public function __construct( )
        {
        }

        /**
         * Asigna la tabla del select
         *
         * @param strng $sTable
         * @return SQL_DELETE
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
         * Asigna una condición where
         *
         * @param string $sCond1
         * @param string $sFunc
         * @param string $sCond2
         * @return SQL_DELETE
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
         * @return SQL_DELETE
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
         * @return SQL_UPDATE
         */
        function &or_( $sCond1, $sFunc='', $sCond2='' )
        {
            $this->_sWhere .= ' OR ' .$sCond1 . ' ' . $sFunc . ' '. $sCond2;
            return $this;
        }

        /**
         * Muestra el sql en un alert
         *
         * @return SQL_DELETE
         */
        function &alert( )
        {
            alert( $this->__toString() );
            return $this;
        }

        /**
         * Muestra el sql por una página web
         *
         * @return SQL_DELETE
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
            $sTmp = 'DELETE ' .
                    ' FROM ' . $this->_sTable;
            if( !empty($this->_sWhere))
            {
                $sTmp .= ' WHERE ' . $this->_sWhere;
            }
            return $sTmp;
        }

        /**
         * Ejecuta la consulta
         *
         * @param DB_CONNECTION $cnn
         * @return resource
         */
        function execute( $hPortal='' )
        {
            return db_execute($this->__toString(),$hPortal);
        }

        /**
         * Indica si ya tengo algo en la sentencia Where
         *
         * @return bool
         *
         * @version     3.1        => 29-10-2009
         */
        function is_where( )
        {
            return !empty($this->_sWhere);
        }
    }

//    class SQL_DELETE
//    {
//        private $_bWhere = false;
//        private $_sQuery = '';
//
//        /**
//         * _SQL_DELETE
//         *
//         * @param _SQL_DELETE $sTable
//         *
//         * @version         3.0        => 24-06-2008
//         */
//        function __construct( $sTable )
//        {
//            $this->_sQuery = 'DELETE FROM '.$sTable;
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
//         * Devielve la sentencia sql montada
//         *
//         * @return strng
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function get_query()
//        {
//            return $this->_sQuery;
//        }
//
//        /**
//         * Indica si ya tengo algo en la sentencia Where
//         *
//         * @return bool
//         *
//         * @version     3.1        => 29-10-2009
//         */
//        function is_where( )
//        {
//            return $this->_bWhere;
//        }
//        /**
//         * Sentencia WHERE
//         *
//         * @param string $val
//         * @param string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where( $val, $sANDOR='')
//        {
//            if( !$this->_bWhere)
//            {
//                $sRet = ' WHERE ' .$val;
//            }
//            else
//            {
//                $sRet = ' '.$val.' ';
//            }
//            if( !empty($sANDOR))
//            {
//                $sRet .= ' '.$sANDOR.' ';;
//            }
//
//            $this->_bWhere = true;
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Sentencia where con strings
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param string $sStr
//         * @param  string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_str( $sField, $sCond, $sStr, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_str($sStr), $sANDOR);
//        }
//
//        /**
//         * Sentencia where con integers
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param int $nNum
//         * @param  string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_int( $sField, $sCond, $nNum, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_int($nNum), $sANDOR);
//        }
//
//        /**
//         * Sentencia where con floats
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param float $fFloat
//         * @param  string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_float( $sField, $sCond, $fFloat, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_float($fFloat), $sANDOR);
//        }
//
//        /**
//         * Sentencia where con fechas
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param date $sDateSTD
//         * @param  string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//
//        function add_where_date( $sField, $sCond, $sDateSTD, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_date($sDateSTD), $sANDOR);
//        }
//
//        /**
//         * Sentencia where con fechas con horas
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param date_time $sDateTimeSTD
//         * @param  string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_date_time( $sField, $sCond, $sDateTimeSTD, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_date_time($sDateTimeSTD), $sANDOR);
//        }
//
//        /**
//         * Sentencia where con booleanos
//         *
//         * @param string $sField
//         * @param string $sCond
//         * @param bool $bBool
//         * @param  string $sANDOR
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function add_where_bool( $sField, $sCond, $bBool, $sANDOR='')
//        {
//            $this->add_where($sField.$sCond.SQL::to_bool($bBool), $sANDOR);
//        }
//    }
}

?>
