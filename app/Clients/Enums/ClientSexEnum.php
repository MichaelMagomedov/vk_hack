<?php

namespace App\CLients\Enums;

class ClientSexEnum
{
    const TYPE_MEN = 2;
    const TYPE_WOMEN = 1;
    const TYPE_NOT = 0;

    public static $lable = [
        self::TYPE_MEN => 'Мужчина',
        self::TYPE_WOMEN => 'Женщина',
        self::TYPE_NOT => 'Не определено'
    ];
}
