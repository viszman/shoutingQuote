<?php


namespace App\Module\Utility;


class Utils
{
    public static function makeCommon(string $someString)
    {
        return mb_strtolower(str_replace([' ', '-'], '', $someString));
    }
}
