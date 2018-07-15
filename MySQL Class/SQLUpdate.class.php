<?php
/**
* Manipluación de sentencias SQL UPDATE
*   
* @author         Alexandre Solé i Faura
* @filesource    SQL_UPDATE.class.php
*
* @version         3.1        => 29-10-2009    => is_where
* @version         3.0        => 24-06-2008
*
*     function __construct            ( $sTable )
    function __toString                ()
    function set                    ( $sField, $sCondition )
    function set_int                ( $sField, $nNum )
    function set_str                ( $sField, $sStr )
    function set_date                ( $sField, $sDateStd )
    function set_time                ( $sField, $sTime )
    function set_date_time            ( $sField, $sDateStd_sTimeHMS )
    function set_float                ( $sField, $fFloat )
    function set_bool                ( $sField, $bBool )
    function set_array_sql            ( $arrSql )
    function get_query                ()
    function add_where                ( $val, $sANDOR='')
    function add_where_str            ( $sField, $sCond, $sStr, $sANDOR='')
    function add_where_int            ( $sField, $sCond, $nNum, $sANDOR='')
    function add_where_float        ( $sField, $sCond, $fFloat, $sANDOR='')
    function add_where_date            ( $sField, $sCond, $sDateSTD, $sANDOR='')
    function add_where_date_time    ( $sField, $sCond, $sDateTimeSTD, $sANDOR='')
    function add_where_bool            ( $sField, $sCond, $bBool, $sANDOR='')
    function is_where                 (  )
    private function get_separator()

*
*/

if( !class_exists('SQL_UPDATE',false))
{
    class SQL_UPDATE
    {
        private $_sTable = '';
        private $_sValues = '';
        private $_sWhere ='';

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
         * @param string $sField
         * @param mixed $value
         * @return SQL_UPDATE
         */
        function &set( $sField, $value )
        {
            if( !empty($this->_sValues))
            {
                $this->_sValues .= ',';
            }
            $this->_sValues .=  $sField .'='.$value;
            return $this;
        }

        /**
         * Asigna la tabla del select
         *
         * @param strng $sTable
         * @return SQL_UPDATE
         */
        function &table( $sTable, $sAlias='' )
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
         * @return SQL_UPDATE
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
         * @return SQL_UPDATE
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
         * @return SQL_UPDATE
         */
        function &alert( )
        {
            alert( $this->__toString() );
            return $this;
        }

        /**
         * Muestra el sql por una página web
         *
         * @return SQL_UPDATE
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
            $sTmp = 'UPDATE ' .
                    $this->_sValues .
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
         * Indica si ya hay una condición where (true) o esta vacia (false)
         *
         * @return bool
         */
        function is_where()
        {
            return !empty($this->_sWhere);
        }

    }


?>
