<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\Split;
use Laravel\Nova\Dashboard;

class SplitTesing extends Dashboard
{
    public static function label()
    {
        return 'Аналитика';
    }


    public function cards()
    {
        return [
            (new Split())->width('1/2'),
        ];
    }

    public static function uriKey()
    {
        return 'split-tesing';
    }
}
