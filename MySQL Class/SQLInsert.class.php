<?php
/**
* Manipluación de sentencias SQL INSERT
*
* @author         Alexandre Solé i Faura
* @filesource    SQL_INSERT.class.php
*
* @version         3.0        => 24-06-2008
*
    function __construct    ( $sTable )
    function __toString        ()
    function set_array_sql    ( $arrSql )
    function set_int        ( $sField, $nNum )
    function set_str        ( $sField, $sStr )
    function set_date        ( $sField, $sDateStd )
    function set_time        ( $sField, $sTime )
    function set_date_time    ( $sField, $sDateStd_sTimeHMS )
    function set_float        ( $sField, $fFloat )
    function set_bool        ( $sField, $bBool )
    function get_query        ()

    private function get_separator()


*/

if( !class_exists('SQL_INSERT',false))
{
    class SQL_INSERT
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
         * @return SQL_INSERT
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
         * @return SQL_INSERT
         */
        function &into( $sTable  )
        {
            $this->_sTable = $sTable;
            return $this;
        }


        /**
         * Muestra el sql en un alert
         *
         * @return SQL_INSERT
         */
        function &alert( )
        {
            alert( $this->__toString() );
            return $this;
        }

        /**
         * Muestra el sql por una página web
         *
         * @return SQL_INSERT
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
            $sTmp = 'INSERT INTO ' . $this->_sTable . ' SET '.$this->_sValues;
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

    }

//    class SQL_INSERT
//    {
//        private $_sQuery = '';
//        private $_nSet = 0;
//
//        /**
//         * Constructor
//         *
//         * @param _SQL_INSERT $sTable
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function __construct( $sTable )
//        {
//            $this->_sQuery = 'INSERT INTO '.$sTable .' SET ';
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
//         * Devuelve el separador
//         *
//         * @return string
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        private function get_separator()
//        {
//            $this->_nSet = $this->_nSet +1;
//            return ($this->_nSet == 1) ? '' : ',';
//        }
//
//        /**
//         * Prepara/asigna todos los campos enformato SQL para una sentencia insert
//         *
//         * @param unknown_type $arrSql
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function set_array_sql( $arrSql )
//        {
//            $n=0;
//            foreach ($arrSql as $fld => $val)
//            {
//                if( $n>0 )
//                {
//                    $this->_sQuery .= ',';
//                }
//                $this->_sQuery .= $fld .'='.$val;
//                $n++;
//            }
//        }
//
//        /**
//         * Asigna un campo integer
//         *
//         * @param string $sField
//         * @param int $nNum
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function set_int( $sField, $nNum )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_int($nNum);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Asigna un campo string
//         *
//         * @param string $sField
//         * @param string $sStr
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function set_str( $sField, $sStr )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_str($sStr);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Asigna un campo fecha
//         *
//         * @param string $sField
//         * @param string_date_std $sDateSTD
//         *
//         * @version     3.0        => 24-06-2008
//         */
//
//        function set_date( $sField, $sDateStd )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_date($sDateStd);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Asigna un campo time
//         *
//         * @param string $sField
//         * @param string_time $sTimeHHMMSS
//         *
//         * @version     3.0        => 24-06-2008
//         */
//
//        function set_time( $sField, $sTime )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_time($sTime);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Asigna un campo fecha y hora
//         *
//         * @param string $sField
//         * @param string_date_time $sDateTimeSTD
//         *
//         * @version     3.0        => 24-06-2008
//         */
//
//        function set_date_time( $sField, $sDateStd_sTimeHMS )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_date_time($sDateStd_sTimeHMS);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Asigna un campo float
//         *
//         * @param string $sField
//         * @param float $fFloat
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function set_float( $sField, $fFloat )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_float($fFloat);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Asigna un campo bool
//         *
//         * @param string $sField
//         * @param bool $bBool
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function set_bool( $sField, $bBool )
//        {
//            $sRet = $this->get_separator(). $sField .'='.SQL::to_bool($bBool);
//            $this->_sQuery .= $sRet;
//        }
//
//        /**
//         * Devuelve la query montada
//         *
//         * @return string
//         *
//         * @version     3.0        => 24-06-2008
//         */
//        function get_query()
//        {
//            return $this->_sQuery;
//        }
//    }
}
?>

