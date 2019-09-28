<?php

namespace App\Nova\Resources;

use App\Nova\Utils\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

final class TestCategory extends Resource
{

    public static $model = \App\Test\Models\TestCategory::class;

    public static $title = 'name';

    public static $search = ['name'];

    public static function label()
    {
        return 'Категории тестов';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->rules('required'),
        ];
    }
}
