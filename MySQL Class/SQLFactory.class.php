<?php              
/**
* factoria SQL
*
* @author         Alexandre Solé i Faura
* @filesource    SQL_UPDATE.class.php
*
* @version         3.1        => 19-03-2010
*
*/

/**
 * FACTORY_SQL
 *
 */
if( !class_exists('FACTORY_SQL',false))
{
    require_once( PATH_SYS_FACTORY .'sql/SQL.class.php');
    require_once( PATH_SYS_FACTORY .'sql/SQL_DELETE.class.php');
    require_once( PATH_SYS_FACTORY .'sql/SQL_JOIN.class.php');
    require_once( PATH_SYS_FACTORY .'sql/SQL_INSERT.class.php');
    require_once( PATH_SYS_FACTORY .'sql/SQL_SELECT.class.php');
    require_once( PATH_SYS_FACTORY .'sql/SQL_UPDATE.class.php');

    class FACTORY_SQL
    {
        public static $_oSQL;

                /**
         * Sentencia SELECT
         *
         * @return SQL_SELECT
         */
        static static function &select( )
        {
            self::$_oSQL = new SQL_SELECT();
            return self::$_oSQL;
        }

        /**
         * Sentencia JOIN
         *
         * @return SQL_JOIN
         */
        static static function &select_join( )
        {
            self::$_oSQL = new SQL_JOIN();
            return self::$_oSQL;
        }

        /**
         * Sentencia UPDATE
         *
         * @return SQL_UPDATE
         */
        static static function &update( )
        {
            self::$_oSQL = new SQL_UPDATE();
            return self::$_oSQL;
        }

        /**
         * Sentencia INSERT
         *
         * @return SQL_INSERT
         */
        static static function &insert( )
        {
            self::$_oSQL = new SQL_INSERT();
            return self::$_oSQL;
        }
        /**
         * Sentencia DELETE
         *
         * @return SQL_DELETE
         */
        static static function &delete( )
        {
            self::$_oSQL = new SQL_DELETE();
            return self::$_oSQL;
        }
    }
}

/**
 *
$rs = FACTORY_SQL::delete()
        ->from( 'table', 't')
        ->where( 'aa = 1')
            ->and_( 'bb', '=', '"asdasd"')
            ->and_( 'cc', '=', '"2-3-2009"');

$s = $rs . '';


$rs = FACTORY_SQL::insert()
        ->into( 'table', 't')
        ->set( 'field', 'sadas');

$s = $rs . '';


$rs = FACTORY_SQL::update()
        ->table( 'table', 't')
        ->set( 'field', 'sadas')
        ->where( 'aa = 1')
            ->and_( 'bb', '=', '"asdasd"')
            ->and_( 'cc', '=', '"2-3-2009"');

$s = $rs . '';

$rs = FACTORY_SQL::select_join()
        ->values( 'field', 'sadas')
        ->from( 'table', 't')
        ->inner_join( 'table1', 't')
            ->on( 'cond', '=', '2343')
            ->and_( 'asdsd="ee"')

        ->left_join( 'table1')
            ->on( 'fld', '=', '"2343"')
            ->and_( 'asdsd="ee"')
        ->where( 'aa = 1')
        ->group_by( array( 'cc', 'ff'))
        ->having( array( 'asda > 2 AND', 'sds = 0'))
        ->order_by(array('dd', 'ff'));

$s = $rs . '';

$rs = FACTORY_SQL::select()
        //->values( '*')
            ->values( 'fld1', 'f1')
            ->values( array( 'f2', 'f3'))
        ->from( 'cartera')
        ->where( 'aa = 1')
//            ->and_( 'bb', '=', SQL::to_str('asdasd'))
//            ->and_( 'cc', '=', SQL::to_date('2-3-2009'))
//            ->or_( '( asdasd > 0)')
        ->group_by( array( 'cc', 'ff'))
        ->having( array( 'asda > 2 AND', 'sds = 0'))
        ->order_by(array('dd', 'ff'));


$s = $rs . '';

 */
?>

