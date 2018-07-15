<?php
/**
* Factory
*
* @author         Alexandre Solé i Faura
* @filesource    DB.class.php
*
* @version     3.5    => 17-12-2009
*/


require_once( PATH_SYS_FACTORY .'db/DB_MYSQL.class.php');
require_once( PATH_SYS_FACTORY .'db/DB_SIMPLE.class.php');

abstract class FACTORY_DB
{
    private static $_oCnn;

    /**
     * Crea un objeto determinado
     *
     * @param string $sObjectType
     * @param mixed $id
     * @return unknown
     */
    static function create( $sObjectType, $midex_id='')
    {
        return new $sObjectType($midex_id);
    }

    /**
     * Devuelve una instancia de la base de datos
     *
     * @return DB
     */
    static function get_instance()
    {
        return self::$_oCnn;
    }

    /**
     * Debuelve un objeto manipulador de una base de datos
     *
     * @param string $sUrlDsn
     * @param bool $bPersisten
     * @return DB
     */
    static function open_db( $sUrlDsn, $bPersisten=false )
    {
        $url = parse_url($sUrlDsn);
        switch( strtolower($url['scheme']))
        {
            case 'mysql':
                self::$_oCnn = new MYSQL();
                self::$_oCnn->open($sUrlDsn, $bPersisten);
                return self::$_oCnn;

            case 'sqlsrv':
                self::$_oCnn= new MSSQL();
                self::$_oCnn->open($sUrlDsn, $bPersisten);
                return self::$_oCnn;

            case 'odbc':
                self::$_oCnn = new ODBC();
                self::$_oCnn->open($sUrlDsn, $bPersisten);
                return self::$_oCnn;

        }
        return null;
    }
}

?>

?>
