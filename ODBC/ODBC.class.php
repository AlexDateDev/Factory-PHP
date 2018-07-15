                   
<?php
/**
* Connexió a una base de dades via ODBS
*
* @author         Alexandre Solé i Faura
* @filesource    DB.class.php
*
* @version     3.5    => 17-12-2009
*
    function open                    ( $sUrl, $bPersisten=false )
    function is_open                ( )
    function result_close            ( $rResource )
    function num_rows                ( $rResource )
    function fetch_row                ( $rResource )
    function fetch_array            ( $rResource )
    function execute                ( $qry )
    function affected_rows            ( )
    function affected_rows_resource    ( $rResource )
    function last_id                ( )
    function close                    ( )
    function transaction_start        ( )
    function transaction_commit        ( )
    function transaction_rollback    ( )
    function fetch_var                ( $rResource, $asField='*' )
    function bind_array_obj            ( $rResource, $oObj )
    function bind_array                ( $rResource, $sFieldKey, $sFieldValue )
    function fetch_result            ( $rResource, $nRow=0 )
*
*/


require_once( 'DB.class.php');

class ODBC implements DB
{
    /**
     * Handle de la connexión con la base de datos
     *
     * @var resource
     */
    private $_hDb;

    /**
     * Constructor
     *
     */
    function __construct()
    {
    }

    /**
     * Connexió amb una base de dades
     *
     * @param string $sUrl
     * @return resource
     */
    function open( $sUrl, $bPersisten=false )
    {
        $url = parse_url($sUrl);
        $_server = $url['host'];
        $_login = $url['user'];
        $_password = $url['pass'];
        if( isset($url['port']))
        {
            $_server .= ':'.$url['port'];
        }
//        if( isset($url['path']))
//        {
            // -- No tiene sentido el nombre de la base de datos en ODBC
            //$_database = substr( $url['path'], 1, strlen($url['path'])-1);
//        }
        if( strtolower($url['scheme'])!='odbc')
        {
            $this->throw_exception(null,  __CLASS__.'::'.__FUNCTION__. ' - la url de connexión no es de MySQL');
        }
        try
        {
            if($bPersisten)
            {
                $this->_hDb = odbc_pconnect( $_server,$_login,$_password,SQL_CUR_USE_ODBC );
            }
            else
            {
                $this->_hDb = odbc_connect( $_server,$_login,$_password,SQL_CUR_USE_ODBC );
            }
        }
        catch( Exception $e )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Fallo autenticación. Usuari o password incorrecta:'. $e->getMessage() );
        }

        // -- connexió oberta correctament
        if( !$this->_hDb )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible connectar amb el servidor' );
        }

        //  -- ODB ya contiene la base de datos
        odbc_autocommit($this->_hDb, false);
        return $this->_hDb;
    }

    /**
     * Llança una exepció database amb un text determinat
     *
     * @param string $str
     */
    function throw_exception( $hDb, $str )
    {
        $str_error = '';
        if(!empty($hDb))
        {
            $str_error = '<hr />'.odbc_error ($hDb ). ' - '. odbc_errormsg($hDb);
        }
        throw new Exception( $str . $str_error);
    }

    /**
     * Indica si la base de dades esta oberta o no
     *
     * @return bool true si esta oberta o false si esta tancada
     */
    function is_open( )
    {
        return is_resource($this->_hDb );
    }

    /**
     * Tanquem el resultat d'una consulta sql
     *
     * @param resource $rResource
     */
    function result_close( $rResource )
    {
        if( ! odbc_free_result ( $rResource) )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible alliverar memòria de la connexió' );
        }
    }

    /**
     * Retorna el número de files del resultat d'una consulta
     *
     * @param resource $rResource
     * @return int
     */
    function num_rows( $rResource )
    {
        ob_start(); // block printing table with results
        $number=intval(odbc_result_all($rResource));
        ob_clean(); // block printing table with results
        return $number;
    }

    /**
     * Retorna una array d'una consulta SQL on els indexs són les posicions de les columnes.
     *
     * @param resource $rResource
     * @return array
     */
    function fetch_row( $rResource )
    {
        $ret = odbc_fetch_row( $rResource, 1 );
        if( $ret )
        {
            $p = odbc_num_fields($rResource);
            $a = array();
            for( $n=1; $n<=$p; $n++ )
            {
                $a[] = odbc_result($rResource, $n);
            }
            return $a;
        }
        return false;
    }

    /**
     * Retorna una array d'una consulta SQL on els indexs són els noms dels camps.
     *
     * @param resource $rResource
     * @return array
     */
    function fetch_array( $rResource )
    {
        // -- Retorna la matriu associada pel nom de columna
        // -- o false si no hi ha més files
         $ret = odbc_fetch_row( $rResource);
         $ar=array();
         if ($ret)
         {
             $p =  odbc_num_fields($rResource);
               for ($i = 1; $i <=$p; $i++)
               {
                $field_name = odbc_field_name($rResource, $i);
                 $ar[$field_name] = odbc_result($rResource, $field_name);
               }
               return $ar;
         }
         else
         {
               return false;
         }
    }

    /**
     * Executa una sentencia SQL i retorna el resultat de la consulta
     *
     * @param string | object $qry
     * @return resource
     */
    function execute( $qry  )
    {
        // -- Montem la query. Pot ser un objecte o un string SELECT
        if( is_object( $qry ))
        {
            if( in_array( 'get_query', get_class_methods( $qry ) ))
            {
                $sQuery = $qry->get_query();
            }
            else
            {
                $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - Objeto sin función get_query' );
            }
        }
        else
        {
            $sQuery = $qry;
        }
        if( empty( $sQuery ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - No existeix consulta' );
        }
        $result = odbc_exec( $sQuery, $this->_hDb );
        if( !$result )
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sQuery.']] ' );
        }
        return $result;
    }

    function affected_rows( )
    {
        echo 'NO APLICA PARA ODBC';
    }
    /**
     * Retorna el número de files que s'han modificat en l'última execució sql
     *
     * @return int
     */

    function affected_rows_resource( $rResource )
    {
        return  odbc_num_rows($rResource);
    }

    /**
     * Retorna l´ultim identificador autoincrment creat a la taula
     *
     * @return int
     */
    function last_id( )
    {
        $result_id = odbc_exec($this->_hDb,  "SELECT @@IDENTITY");
        if( $result_id )
        {
            if( odbc_fetch_row($result_id) )
            {
                return odbc_result($result_id,  1);
            }
        }
        return null;
    }

    /**
     * Tanquem la comunicació amb una base de dades.
     *
     */
    function close( )
    {
        if( is_resource($this->_hDb ))
        {
            if( ! odbc_close($this->_hDb) )
            {
                $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible tancar connexió' );
            }
        }
        $this->_hDb = null;
    }

    /**
     * Iniciem una transacció
     *
     */
    function transaction_start( )
    {
        odbc_autocommit($this->_hDb,false);
    }

    /**
     * Tanquem correctement una transacció
     *
     */
    function transaction_commit()
    {
        if( !odbc_commit( $this->_hDb ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__ );
        }
    }

    /**
     * Cancel·lem una transaccio en curs
     *
     */
    function transaction_rollback()
    {
        if( !odbc_rollback( $this->_hDb ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__ );
        }
    }

    /**
     * Devuelve un array de un fetch con todos los valores del registro buscados
     *
     * @param resource $rResource
     * @param array | string $asField
     * @return array
     */
    function fetch_var( $rResource, $asField='*' )
    {
        if( '*' == $asField )
        {
            return  $this->fetch_row( $rResource );
        }
        else if( is_array($asField))
        {
            $a = array();
            $rw = $this->fetch_array($rResource );
            foreach ($asField as $sValue)
            {
                $a[] = $rw[$sValue];
            }
            return $a;
        }
        else
        {
            $a = array();
            $rw = $this->fetch_array($rResource);
            $a[] = $rw[$asField];
            return $a;
        }
    }

    /**
     * Devuelve un array de objetos con todo el recorrido del ResultSet
     *
     * @param resource $rResource
     * @param object Nombre del objeto a crear para el array
     * @return array OBJECT | array vacio
     */
    function bind_array_obj( $rResource, $oObj)
    {
        $p = odbc_num_rows($rResource );
        $o = array();
        $sObj = get_class($oObj);
        for( $n=0; $n<$p; $n++ )
        {
            $o[] = new $sObj(  $this->fetch_array( $rResource));
        }
        odbc_free_result( $rResource );
        return $o;
    }

    /**
     * Devuelve un array con todo el recorrido del ResultSet
     *
     * @param resource $rResource
     * @param string $sFieldValue    Nombre del campo a devolver su valor
     * @param string $sFieldKey Nombre del campo donde su valor sera el índice
     * @return array
     */
    function bind_array( $rResource, $sFieldKey, $sFieldValue)
    {
        $p = odbc_num_rows( $rResource );
        $a = array();
        if( empty( $sFieldValue))
        {
            for( $n=$p-1; $n>=0; $n-- )
            {
                $rw = $this->fetch_row( $rResource );
                $a[] = $rw[0];
            }
        }
        else if(empty($sFieldKey))
        {
            for( $n=$p-1; $n>=0; $n-- )
            {
                $rw =  $this->fetch_array( $rResource);
                $a[] = $rw[$sFieldValue];
            }
        }
        else
        {
            for( $n=$p-1; $n>=0; $n-- )
            {
                $rw = $this->fetch_array( $rResource);
                $a[$rw[$sFieldKey]] = $rw[$sFieldValue];
            }
        }
        odbc_free_result( $rResource );
        return $a;
    }

    /**
     * Devuelve un único valor como resultado de un registro de una consulta
     *
     * @param resource $rResource
     * @param int $nRow
     * @return mixed
     */
    function fetch_result( $rResource, $nRow=0 )
    {
        return odbc_result($rResource, $nRow);
    }
}

?>

?>
