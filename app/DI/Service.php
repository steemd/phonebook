<?php
namespace App\DI;

class Service {

    private static $map = array();

    public static function set($name, $data) {
        self::$map[$name] = $data;
    }

    public static function get($name) {
        if (isset(self::$map[$name])) {
            return self::$map[$name];
        } else {
            return false;
        }
    }
        
}