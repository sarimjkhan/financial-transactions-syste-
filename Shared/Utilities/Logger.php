<?php
class Logger {
    public static function log($value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public static function logAndDie($value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        die;
    }
}
?>