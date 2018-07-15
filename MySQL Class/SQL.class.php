<?php
// ----------------------------------------------------------------------------
// Sql_php
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
* Manipluación de sentencias SQL
*
* @author         Alexandre Solé i Faura
* @filesource    SQL.class.php
*
* @version     3.3        => 19-03-2009    => truncate_decimals
*                                     => convert_to_str
                                    => replace
* @version     3.2        => 29-10-2009    => coalesce
* @version     3.1c    => 09-06-2009    => like: Incluir array como condición y el campo
* @version     3.1b    => 02-06-2009    => left_num_max
* @version     3.1b    => 02-06-2009    => Elimiando función COALESCE en concat
* @version     3.1b    => 02-06-2009    => Añadidos la función length
* @version     3.1a    => 24-03-2009    => Añadirdo la función COALESCE en concat
* @version     3.0        => 24-06-2008
*
*
*         static function convert_to_str    ($sField  )
        static function replace            ( $sField, $sOrigen, $sDesti )
        static function left_num_max($sField, $nNum, $sEnd='...' )
        statig function length            ( $sField )
        static function left_num        ( $sField,$nNum)
        static function clear_zero        ( $sCond )
        static function nombre_apellidos( $sFieldNom, $sFieldCognoms )
        static function lcase            ( $sField )
        static function less_equal_than    ( $sFieldValor1, $sFieldValor2)
        static function less_than        ( $sFieldValor1, $sFieldValor2 )
        static function like            ( $sCond )
        static function max                ( $sField )
        static function min                ( $sField )
        static function more_equal_than    ( $sFieldValor1, $sFieldValor2 )
        static function more_than        ( $sFieldValor1, $sFieldValor2 )
        static function not                ( $sField  )
        static function order_asc        ( $sField )
        static function order_desc        ( $sField )
        static function round            ( $sField, $nDecimals  )
        static function sum                ( $sField )
        static function trim            ( $sField)
        static function ucase            ( $sField )
        static function is_null            ( $sField )
        static function is_not_null        ( $sField  )
        static function in_int            ( $arr )
        static function in_str            ( $arr )
        static function as_                ( $sField, $sAs)
        static function if_                ( $sCond, $sRet, $sRetElse )
        static function floor            ( $sField )
        static function equal            ( $sFieldValor1, $sFieldValor2 )
        static function div_to_float    ( $sFieldDiv1, $sFieldDiv2 )
        static function div_to_int        ( $sFieldDiv1, $sFieldDiv2 )
        static function distinct        ( $sField )
        static function different        ( $sFieldValor1, $sFieldValor2 )
        static function get_date_format    ( $sField, $sFormat='%d-%m-%Y' )
        static function concat            ( $arr )
        static function count            ( $sField )
        static function compute            ( $sField, $sOperand, $nNum )
//        static function between_date_time    ( $sField, $sDateTimeSTD1, $sDateTimeSTD2 )
//        static function between_date    ( $sField, $sDateSTD1, $sDateSTD2 )
        static function avg                ( $sField )
        static function to_bool            ( $bBool)
        static function to_date_time    ( $sDateSTD_sTimeHMS)
        static function to_float        ( $fFloat)
        static function to_str            ( $str )
        static function to_time            ( $sTimeHMS)
        static function to_date            ( $sDateStd)
        static function to_int            ( $val)
        static function fld                ( $sField, $sTable)
        static function sanizite        ( $sql_item)

*/


if( !class_exists('SQL',false))
{

    abstract class SQL
    {

        /**
         * Convierte el valor d eun campo a string
         *
         * @param string $sField
         * @return string
         */
        static function convert_to_str($sField  )
        {
            return ' CONVERT('.$sField.', BINARY)';
        }

        /**
         * Reemplace un string por otro dentro de uns tring
         *
         * @param string $sField
         * @param string $sOrigen
         * @param string $sDesti
         * @return string
         */
        static function replace( $sField, $sOrigen, $sDesti )
        {
            return ' REPLACE('.$sField.',"' . $sOrigen.'","'.$sDesti.'")';
        }

        /**
         * Trunca a un número determinado de decimales
         *
         * @param string $sField
         * @param int $nNumDecimals
         * @return string
         */
        static function truncate_decimals( $sField, $nNumDecimals=2 )
        {
            return ' TRUNCATE(' . $sField .','.$nNumDecimals.')';
        }

        /**
         * Devuelve un número máximo de caracteres, si tiene mas se añade '...'
         *
         * @param string $sField
         * @param int $nNum
         * @param string $sEnd
         * @return string
         *
         * @version     3.1b        => 2-06-2009
         */
        static function left_num_max($sField, $nNum, $sEnd='...' )
        {
            return 'IF(LENGTH('.$sField.')>'.$nNum.',CONCAT( LEFT('.$sField.','.$nNum.'),"'.$sEnd.'"),'.$sField.')';
        }
        /**
         * Devuelve la longitud del valor del campo
         *
         * @param string $sField
         * @return string
         *
         * @version     3.1b        => 2-06-2009
         */
        static function length($sField)
        {
            return '(LENGTH('.$sField.'))';
        }
        /**
         * Devuelve los n caracteres de la izquierda
         *
         * @param strng $sField
         * @param int $nNum
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function left_num($sField,$nNum)
        {
            return '(LEFT('.$sField.','.$nNum.'))';
        }

        /**
         * Devuelve la condición que elimina el zero y muestra ""
         *
         * @param string $nVal
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function clear_zero( $sCond )
        {
            return self::if_( self::equal($sCond,0),'""',$sCond );
        }

        /**
         * Devuelve la concatenación de un campo nombre y apellido
         *
         * @param string $sNom
         * @param string $sCognoms
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function nombre_apellidos( $sFieldNom, $sFieldCognoms )
        {
            return self::trim(
                    self::concat(
                                array(
                                    self::coalesce(array($sFieldNom,'""')),
                                    '" "',
                                    self::coalesce(array($sFieldCognoms. '""'))
                                    )
                                ));
        }

        /**
         * Devuelve la sentencia de transformar a minúscula: LCASE( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function lcase( $sField )
        {
            return ' LCASE(' . $sField .')';
        }

        /**
         * Devuelve la concatenación MENOR O IGUAL QUE ( sField1 <= sField2 )
         *
         * @param string $sFieldValor1
         * @param string $sFieldValor2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function less_equal_than( $sFieldValor1, $sFieldValor2)
        {
            return '('.$sFieldValor1 . '<='. $sFieldValor2 .')';
        }

        /**
         * Devuelve la concatenación MENOR QUE ( sField1 < sField2 )
         *
         * @param string $sFieldValor1
         * @param string $sFieldValor2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function less_than( $sFieldValor1, $sFieldValor2 )
        {
            return '('.$sFieldValor1 . '<'. $sFieldValor2 .')';
        }

        /**
         * Devuelve la condición like: LIKE, la condición NO incluye %_
         *
         * @param string $sCond
         * @return string
         *
         * @version     3.1c        => 09-06-2009    => Incluir array como condición
         * @version     3.0        => 24-06-2008
         */

        static function like( $asField, $sCond )
        {
            if(is_array($asField))
            {
                $s='';
                foreach( $asField as $sField )
                {
                    if(!empty($s))
                    {
                        $s.=' OR ';
                    }
                    $s .= ' '.$sField.' LIKE "'.$sCond.'" ';
                }
                return $s;
            }
            return ' '.$asField .' LIKE "'.$sCond.'"';
        }

        /**
         * Devuelve el valor máximo de un campo: MAX( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function max( $sField )
        {
            return ' MAX('.$sField.')';
        }

        /**
         * Devuelve el valor máximo de un campo: MIN( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function min( $sField )
        {
            return ' MIN('.$sField.')';
        }

        /**
         * Devuelve la concatenación MAYOR O IGUAL QUE ( sField1 >= sField2 )
         *
         * @param string $sFieldValor1
         * @param string $sFieldValor2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function more_equal_than( $sFieldValor1, $sFieldValor2 )
        {
            return '('.$sFieldValor1 . '>='. $sFieldValor2 .')';
        }

        /**
         * Devuelve la concatenación MAYOR QUE ( sField1 > sField2 )
         *
         * @param string $sFieldValor1
         * @param string $sFieldValor2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function more_than( $sFieldValor1, $sFieldValor2 )
        {
            return '('.$sFieldValor1 . '>'. $sFieldValor2 .')';
        }

        /**
         * Devuelve la condición de negación: NOT sField
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function not( $sField  )
        {
            return ' NOT '.$sField .' ';
        }

        /**
         * Devuelve la sentencia de ordenacion ascendente: ASC
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function order_asc( $sField )
        {
            return $sField . ' ASC ';
        }

        /**
         * Devuelve la sentencia de ordenacion descendente: DESC
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function order_desc( $sField )
        {
            return $sField . ' DESC ';
        }

        /**
         * Redondeja un valor a un número determinbat de decimals
         *
         * @param string $sField
         * @param int $nDecimals
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function round( $sField, $nDecimals=2  )
        {
            return ' ROUND('.$sField.', '.$nDecimals.')';
        }

        /**
         * Devuelve el sumatorio de un campo
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function sum( $sField )
        {
            return ' SUM('.$sField.')';
        }

        /**
         * Devuelve la sentencia TRIM( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function trim( $sField)
        {
            return ' TRIM('.$sField.')';;
        }

        /**
         * Devuelve la sentencia de transformar a mayúsculas: UCASE( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function ucase( $sField )
        {
            return ' UCASE(' . $sField .')';
        }

        /**
         * Develve la sentencia que detecta si un campo es nulo: sField IS NULL
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function is_null( $sField )
        {
            return '('.$sField .' IS NULL)';
        }

        /**
         * Develve la sentencia que detecta si un campo NO es nulo: sField IS NOT NULL
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function is_not_null( $sField  )
        {
            return '('.$sField .' IS NOT NULL)';
        }

        /**
         * Devuelva la sentencia IN (sVal1,sVal2,,,sValN) con enteros
         *
         * @param array $arr
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */

        static function in_int( $arr )
        {
            return ' IN('.join( ',', $arr).')';
        }

        /**
         * Devuelva la sentencia IN (sVal1,sVal2,,,sValN) con strings
         *
         * @param array $arr
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function in_str( $arr )
        {
            return ' IN("'.join( '","', $arr).'")';
        }

        /**
         * Devuelve la sentencia alias: sField AS sAlias
         *
         * @param string $sField
         * @param string $sAs
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function as_( $sField, $sAs)
        {
            return $sField . ' AS ' . $sAs;
        }

        /**
         * Devuelve la sentencia IF( sCond, $sRet, $sRetElse )
         *
         * @param string $sConf
         * @param string $sRet
         * @param string $sRetElse
         * @return string
         *
         * @version     3.0        => 24-06-2008
         *
         */
        static function if_( $sCond, $sRet, $sRetElse )
        {
            if( empty($sRet))
            {
                $sRet = '""';
            }
            if( empty($sRetElse))
            {
                $sRetElse = '""';
            }
            return ' IF('.$sCond.','.$sRet.','.$sRetElse.')';
        }

        /**
         * Devuelve una condición de redondeo a enteros: FLOOR( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function floor( $sField )
        {
            return ' FLOOR( '.$sField .')';
        }

        /**
         * Devuelve la concatenación de comparación SQL, IGUAL QUE ( sField1 = sField2 )
         *
         * @param string $sFieldValor1
         * @param string $sFieldValor2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function equal( $sFieldValor1, $sFieldValor2 )
        {
            return '('.$sFieldValor1 . '='. $sFieldValor2 .')';
        }


        /**
         * Devuelve la concatenación de una división en coma flotante ( sField1 / sField2 )
         *
         * @param string $sFieldDiv1
         * @param string $sFieldDiv2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function div_to_float( $sFieldDiv1, $sFieldDiv2 )
        {
            return '('.$sFieldDiv1.')/('.$sFieldDiv2.')';
        }

        /**
         * Devuelve la concatenación de una división en enteros, FLOOR( sField1 / sField2 )
         *
         * @param string $sFieldDiv1
         * @param string $sFieldDiv2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function div_to_int( $sFieldDiv1, $sFieldDiv2 )
        {
            return ' FLOOR(('.$sFieldDiv1.')/('.$sFieldDiv2.'))';
        }

        /**
         * Devuelve una sentecia DISTINCT( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function distinct( $sField )
        {
            return ' DISTINCT ('.$sField .') ';
        }

        /**
         * Devuelve la concatenación DIFERENTE QUE ( sField1 <> sField2 )
         *
         * @param string $sFieldValor1
         * @param string $sFieldValor2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function different( $sFieldValor1, $sFieldValor2 )
        {
            return '('.$sFieldValor1 . '<>'. $sFieldValor2 .')';
        }

        /**
         * Devuelve una fecha STD de un campo fecha sql
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function get_date_format( $sField, $sFormat='%d-%m-%Y' )
        {
            return ' DATE_FORMAT('.$sField.',\''.$sFormat.'\')';
        }

        /**
         * Devuelve una setencia de concatenación CONCAT( sVal1, sVal1,,,sValN )
         *
         * @param array $arr
         * @return string
         *
         * @version     3.1b    => 02-06-2009    => Elimiando función COALESCE
         * @version     3.1a    => 24-03-2009    => Añadirdo la función COALESCE
         * @version     3.0        => 24-06-2008
         */
        static function concat( $arr )
        {
//            return ' CONCAT( COALESCE('.join( ',',$arr).'))';
            return ' CONCAT( '.join( ',',$arr).')';
        }

        /**
         * Devuelve el primer valor no null
         *
         * @param array $arr
         * @return coalesce
         * @version     3.2        => 29-10-2009
         */
        static function coalesce( $arr )
        {
            return ' COALESCE('.join( ',',$arr).')';
        }


        /**
         * Devuelve una setnecia COUNT
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function count( $sField )
        {
            return ' COUNT('.$sField.') ';
        }

        /**
         * Realitza operacions amb camps
         *
         * @param string $sField
         * @param string $sOperand
         * @param int $nNum
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function compute( $sField, $sOperand, $nNum )
        {
            return strval( $sField.$sOperand.$nNum );
        }

        /**
         * Devuelve una sentencia BETWEEN sField1 AND sField2
         *
         * @param string $sField1
         * @param string $sField2
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
//        static function between_date_time( $sField, $sDateTimeSTD1, $sDateTimeSTD2 )
//        {
//            if( empty($sDateTimeSTD1) || trim(strtoupper($sDateTimeSTD1))=='NULL')
//            {
//                alert('SQL between sin fecha1');
//            }
//            if( empty($sDateTimeSTD2) || trim(strtoupper($sDateTimeSTD2))=='NULL')
//            {
//                alert('SQL between sin fecha2');
//            }
//            list( $diaStd, $hora) = split( ' ', $sDateTimeSTD1);
//            list($dia,$mes,$any) = split('-', $diaStd);
//            $d1 = '"'.$any.'-'.$mes.'-'.$dia.' '.$hora.'"';
//
//            list( $diaStd, $hora) = split( ' ', $sDateTimeSTD2);
//            list($dia,$mes,$any) = split('-', $diaStd);
//            $d2 = '"'.$any.'-'.$mes.'-'.$dia.' '.$hora.'"';
//            return '('.$sField.' BETWEEN '.$d1 . ' AND '. $d2 .')';
//        }


        /**
         * Devuelve una sentencia BETWEEN sField1 AND sField2
         *
         * @param string $sField1
         * @param string $sField2
         * @return string
         *
         * @version     3.0        => 24-06-2008
//         */
//        static function between_date( $sField, $sDateSTD1, $sDateSTD2 )
//        {
//            if( empty($sDateSTD1) || trim(strtoupper($sDateSTD1))=='NULL')
//            {
//                alert('SQL between date sin fecha1');
//            }
//            if( empty($sDateSTD2) || trim(strtoupper($sDateSTD2))=='NULL')
//            {
//                alert('SQL between date sin fecha2');
//            }
//            list($dia,$mes,$any) = split('-', $sDateSTD1);
//            $d1 = '"'.$any.'-'.$mes.'-'.$dia.'"';
//
//            list($dia,$mes,$any) = split('-', $sDateSTD2);
//            $d2 = '"'.$any.'-'.$mes.'-'.$dia.'"';
//            return '('.$sField.' BETWEEN '.$d1 . ' AND '. $d2 .')';
//        }

        /**
         * Devuelve una sentencia BETWEEN.
         *
         * @param string $sField
         * @param mixed $value1
         * @param mixed $value2
         * @return string
         */
        static function between( $sField, $value1, $value2 )
        {
            return '('.$sField.' BETWEEN '.$value1 . ' AND '. $value2 .')';
        }

        /**
         * Devuelve la condición de media de un campo: AVG( sField )
         *
         * @param string $sField
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function avg( $sField )
        {
            return ' AVG('. $sField .')';
        }

        /**
         * Transforma un valor true/false a in int para sql
         * Devuelve "NULL" si es nulo
         *
         * @param bool $nBool
         * @return int
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_bool( $bBool)
        {
            if( empty($bBool) || trim(strtoupper($bBool))=='NULL')
            {
                return 'NULL';
            }
            return intval($bBool);
        }

        /**
         * Transforma un valor fecha STD y hora (dd-mm-yyyy hh:mm:ss) a un string sql.
         * Devuelve "" si el valor esta vacio o null si no tiene valor
         *
         * @param string $sDateSTD_sTimeHMS
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_date_time( $sDateSTD_sTimeHMS)
        {
            if( empty($sDateSTD_sTimeHMS) || trim(strtoupper($sDateSTD_sTimeHMS))=='NULL')
            {
                return '""';
            }
                // -- Convertir el dia std a dia mysql
            list( $diaStd, $hora) = split( ' ', $sDateSTD_sTimeHMS);
            list($dia,$mes,$any) = split('-', $diaStd);
            return '"'.$any.'-'.$mes.'-'.$dia.' '.$hora.'"';
        }

        /**
         * Transforma un valor string o float a un float sql,
         * Devuelve 0 si es NULL o esta vacio
         *
         * @param float $val
         * @return float
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_float( $fFloat)
        {
            if( empty($fFloat) || trim(strtoupper($fFloat))=='NULL')
            {
                return 0.0;
            }
            else
            {
                return  floatval($fFloat);
            }
        }

        /**
         * Devuelve un string entre comillas para sql
         * Devuelve "" si es nullo o no hay valor
         *
         * @param string $str
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_str( $str )
        {
            if( empty($str)  || trim(strtoupper($str))=='NULL')
            {
                return '""';
            }
            if (get_magic_quotes_gpc())
            {
                $str = stripslashes($str);
            }
            // Quote if not integer
               $str = mysql_real_escape_string($str);
            return '"'.$str.'"';
        }


        /**
         * Transforma un valor hora (hh:mm:ss) a un string sql,
         * Devuelve "" si el valor esta vacio o null si no tiene valor
         *
         * @param string $sTimeHMS
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_time( $sTimeHMS)
        {
            if( empty($sTimeHMS) || trim(strtoupper($sTimeHMS))=='NULL')
            {
                return '""';
            }
            return '"'.$sTimeHMS.'"';
        }


        /**
         * Transforma una fecha STD a una fecha MYSQL,
         * Si el valor es ta vacio o null, devuelve ""
         *
         * @param string $sDateStd
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_date($sDateStd)
        {
            if( empty($sDateStd) || trim(strtoupper($sDateStd))=='NULL')
            {
                return '""';
            }
            list($dia,$mes,$any) = split('-', $sDateStd);
            return '"'.$any.'-'.$mes.'-'.$dia.'"';
        }

        /**
         * Transforma un valor int o string a int o 'NULL' si esta vacio.
         * Un valor 0 devuelve 'NULL
         *
         * @param int $val
         * @return int
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_int( $val)
        {
            if( empty($val) ||
                trim(strtoupper($val))=='NULL' )
            {
                return 'NULL';
            }
            else
            {
                return  intval($val);
            }
        }

        /**
         * Devuelve la tabla.campo
         *
         * @param string $sField
         * @param string $sTable
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function fld( $sTable, $sField)
        {
            return $sTable.'.'.$sField;
        }


        /**
         * Elimina caracteres que podrian ayudar a ejecutar
         * un ataque de Inyeccion SQL
         *
         * @param     string $sql_item
         * @return     string
         *
         * @version     3.0        => 24-06-2008
         */
        public static function sanizite($sql_item)
        {
            $sql_item = trim($sql_item);
            if($sql_item!==''&&$sql_item!==null)
            {
                $sql_item = ereg_replace("[ ]+", "", $sql_item);
                if(!ereg("^[a-zA-Z_0-9\,\(\)\.]+$", $sql_item))
                {
                    alert("Se esta tratando de ejecutar una operacion maliciosa! _SQL");
                }
            }
            return $sql_item;
        }

    }
}
?>
