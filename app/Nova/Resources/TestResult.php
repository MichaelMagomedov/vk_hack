<?php

namespace App\Nova\Resources;

use App\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;

final class TestResult extends Resource
{

    public static $model = \App\Test\Models\TestResult::class;

    public static $title = 'text';

    public static $displayInNavigation = false;

    public static $search = ['text'];

    public static function label()
    {
        return 'Возможные результаты теста';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Number::make('Рейтинг ответа от', 'from')->rules('required'),
            Number::make('Рейтинг ответа до', 'to')->rules('required'),
            Textarea::make('Описание', 'text')->rules('required'),
            Image::make('Картинка ответа', 'img')->nullable()->creationRules('required'),
            BelongsTo::make('Тест', 'test', Test::class),
        ];
    }
}
