<?php

namespace App\Test\Enums;

class QuestionTypesEnum
{
    const TYPE_SINGE = 1;
    const TYPE_MULTIPLE = 2;
    const TYPE_TEXT = 3;

    public static $lables = [
        self::TYPE_SINGE => 'Один ответ',
        self::TYPE_MULTIPLE => 'Множественный ответ',
        self::TYPE_TEXT => 'Текстовы отет'
    ];
}
