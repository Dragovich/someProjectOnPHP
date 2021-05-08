<?php

namespace TEST;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

class Utils {
    public static function dump(...$vars) {
        $file = fopen($_SERVER["DOCUMENT_ROOT"] . "/log.txt", 'a');
        $time = date("H:i:s ");
        fwrite($file, $time . str_repeat("=", 30) . "\n");
        foreach ($vars as $var) {
            fwrite($file, print_r($var, true) . "\n\n");
        }
        fclose($file);
    }
}
