
<?php
/**
 * Devuelve un string unico formado los fecha unix en microsegundos, formato 223482559348
 *
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */

static function is_dni($str )
{
  //normalizamos el formato
    $str = preg_replace( '/[^0-9A-Z]/i', '', $str );

    // El formato es de un NIF o un NIE
    if (preg_match('/X?[0-9]{8}[A-Z]/i', $str))
    {
          //para no duplicar código, eliminamos la X en el caso de que sea un NIE
          $str = preg_replace('/^X/i', '', $str);
          //calculamos que letra corresponde al número del DNI o NIE
          $stack = 'TRWAGMYFPDXBNJZSQVHLCKE';
          $pos = substr($str, 0, 8) % 23;
          if (strtoupper( substr($str, 8, 1) ) == substr($stack, $pos, 1) )
              return true;
    }

     // El formato es el de un CIF
    else if (preg_match('/[A-HK-NPQS][0-9]{7}[A-J0-9]/i', $str)) //CIF
    {
          $sum = 0;
          //sumar los digitos en posiciones pares
          for ($i=2; $i<strlen($str)-1; $i+=2)
          {
              $sum += substr($str, $i, 1);
          }
          //Multiplicar los digitos en posiciones impares por 2 y sumar los digitos del resultado
          for ($i=1; $i<strlen($str)-1; $i+=2)
          {
              $t = substr($str, $i, 1) * 2;
              //agrega la suma de los digitos del resultado de la multiplicación
              $sum += ($t>9)?($t-9):$t;
          }
          //Restamos el último digito de la suma actual a 10 para obtener el control
          $control = 10 - ($sum % 10);

          //El control puede ser un número o una letra
           if ( substr($str, 8, 1) == $control ||
               strtoupper(substr($str, 8, 1)) == substr('JABCDEFGHI', $control, 1 ))
           {
              return true;
              }
        return false;
    }
    return false;
}

?>      