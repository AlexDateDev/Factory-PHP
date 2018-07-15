<?php
// ----------------------------------------------------------------------------
// Singleton_class
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>
<?php
/**
 * Example
 */

include "MSingleton.php";

/**
 * class Singleton
 *
 * Example child of singleton factory
 *
 * Notice:
 *  If call test method twice, Singleton __construct
 *  must be called once, and test method twice
 *  output must be: * Construct called * * test called * * test called *
 *
 */
class Singleton extends MSingleton {

    protected function __construct() {
    echo " * Construct called *", PHP_EOL;
    }

    protected function __clone() {}

    public function test() {
    echo " * test called * ";
    }

}

Singleton::getInstance()->test();
Singleton::getInstance()->test();

?>


<?php

/**
 * class MSingleton
 *
 * Singletons parent factory
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, If not, see <http://www.gnu.org/licenses/>.
 *
 * @version 0.1
 * @author Artem Bondarenko <artem.ria@gmail.com>
 */

class MSingleton {
    /**
     * Singleton children storage
     *
     * @static
     * @var array
     * @access private
     */
    private static $instances = array();


    /**
     * Get current singleton child instance
     *
     * @static
     * @access public
     * @return object
     */
    public static function getInstance() {
    $class = get_called_class();

        if ( !isset(self::$instances[$class]) ) {
        self::$instances[$class] = new $class;
    }

    return self::$instances[$class];
    }

}


