<?php
// ----------------------------------------------------------------------------
// Url
//
//
//
// Date : 02/02/2014
// By   : Alex
// ----------------------------------------------------------------------------
?>

<?php
/**
* Manipulacio d'URLS
*
* @version         3.0
* @since         Mon Jul 16 10:07:56 CEST 2007
* @author         Alexandre Sole i Faura  
* @copyright    BTCelular.com
* @filesource    url.class.php
* @package         Utils
*
*/


/**
 * URL
 *
 * @author         Alexandre Sole i Faura
 * @copyright     BTCelular.com
 * @version     3.0
 * @since        Mon Jul 16 10:08:07 CEST 2007
 * @name        URL
 * @package     Utils
 */

if( !class_exists( 'URL' ))
{
    class URL
    {
        /**
        * Url
        *
        * @var string
        */
        private $_sUrl;

        /**
        * Query_String
        *
        * @var string
        */
        private $_sQuery_string;

        /**
         * Array de parametres amb els seus valors procedents de la query string
         * 1234&accio=12$vel=2
         *
         * _arrparam[ 1234 ] = null;
         * _arrparam[ accio ] = 12;
         * _arrparam[ vel ] = 2;
         *
         * @var array
         */
        private $_arrParam = array();

        /**
         * Constructor
         *
         * @return URL
         *
         */
        function __construct( $url = null)
        {
            if( !is_null( $url))
            {
                $this->_sUrl = str_left_str( $url, '?');
                $this->setQueryString( str_right_str( $url, '?'));
            }
        }

        /**
         * Assigna la URL desde la query string. Separador &
         *
         * @param string $sQueryString
         */
        function set_query_string( $sQueryString)
        {
            $this->_sQuery_string = trim( $sQueryString );
            if( $this->_sQuery_string != '' )
            {
                $arrParam =explode( '&', $this->_sQuery_string);

                for( $n=0; $n<count($arrParam); $n++)
                {
                    list( $k, $v ) = explode( '=', $arrParam[ $n ] );
                    $this->_arrParam[ $k ] = $v;
                }
            }
        }

        /**
         * Retorna la url complerta en format string
         *
         * @return string
         */
        function get_str( )
        {
            $str = $this->_sUrl;
            $nParam = count($this->_arrParam);

            $inici = '?';
            $strp='';
            if( $nParam > 0 )
            {
                $sSep = str_random(2).'&';
                foreach ($this->_arrParam as $key => $value)
                {
                    if( trim( $value) != '')
                    {
                        $strp .= $sSep . $key . '='. $value;
                    }
                    else
                    {
                        $strp .= $sSep . $key;
                    }
                    $sSep = '&';
                }
                if( CRYPT_URL)
                {
                    $str .= $inici. base64_encode($strp);
                }
                else
                {
                    $str .= $inici. $strp;
                }
            }
            return $str;
        }

        /**
         * Insertem un nou parametre i valor al final de la url
         *
         * @param string $sParam
         * @param string $sValue
         */
        function add_param( $sParam, $sValue=null)
        {
            $this->_arrParam[ $sParam ] = $sValue;
        }

        /**
         * Assigna la url desde un string
         *
         * @param string $sUrl
         */
        function set_url( $sUrl )
        {
            $this->_sUrl = $sUrl;
        }

        /**
         * Retorna un valor d'un parametre de la url o null si no hi ha el parametre
         *
         * @param string $sParam
         * @return string
         */
        function get_param_value( $sParam )
        {
            if( array_key_exists(  $sParam, $this->_arrParam))
            {
                return $this->_arrParam[$sParam];
            }
            return null;
        }

    }
}


?>
