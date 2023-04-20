<?php

namespace App\Helpers;

class Status
{

     public static $statusArray =
     [
        'defect'=>'Брак',
        'liquid'=>'Ликвид',
        'default'=>'Не обработан',
    ];


    public static function getStatus($key)
    {
        return self::$statusArray[$key];
    }
}
