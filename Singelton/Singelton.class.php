<?php
// ----------------------------------------------------------------------------
// Singleton_class_php
//
//
//
// Date : 27/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------

class MyClass {

  // singleton instance
  private static $instance;

  // private constructor function
  // to prevent external instantiation
  private __construct() { }

  // getInstance method
  public static function getInstance() {

    if(!self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;

  }                   
}
?>
