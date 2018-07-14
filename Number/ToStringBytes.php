<?php
// ----------------------------------------------------------------------------
// ToStringBytes
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un valor numerico como BYTES
         *
         * @param $size
         *   A size expressed as a number of bytes with optional SI size and unit
         *   suffix (e.g. 2, 3K, 5MB, 10G).
         * @return    An integer representation of the size.
         *
         * @version         3.0        => 24-06-2008
         */
        static function ToStrBytes($size)
        {
            $match = null;
              $suffixes = array(
                '' => 1,
                'k' => 1024,
                'm' => 1048576, // 1024 * 1024
                'g' => 1073741824, // 1024 * 1024 * 1024
                  );
              if (preg_match('/([0-9]+)\s*(k|m|g)?(b?(ytes?)?)/i', $size, $match))
              {
                return $match[1] * $suffixes[strtolower($match[2])];
              }
              return '';
        }
?>
