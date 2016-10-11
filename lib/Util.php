<?php 
class Util {
    /**
     * Convert foo-bar to fooBar
     * http://stackoverflow.com/a/38581647/373722
     */
    public static function dashcaseToCamelCase($str) {
      // Remove underscores, capitalize words, squash, lowercase first.
      return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $str))));
    }

    /**
     * Convert foo-bar to FooBar
     * http://stackoverflow.com/a/38581647/373722
     */
    public static function dashcaseToBookCase($str) {
      // Remove underscores, capitalize words, squash, lowercase first.
      return ucfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $str))));
    }
}
?>
