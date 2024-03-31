<?php

namespace App\Helpers;

class FunctionsHelper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function timeToBrazil(string $time)
    {
        return date("H:i", strtotime($time)); // Saída: 00:00
    }
}
