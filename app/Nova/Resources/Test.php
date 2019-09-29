<?php

namespace App\Nova\Resources;

use App\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Test extends Resource
{

    public static $model = \App\Test\Models\Test::class;

    public static $title = 'name';

    public static function label()
    {
        return 'Тесты';
    }

    public static $search = ['name'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->rules('required'),
            Textarea::make('Описание', 'desc')->rules('required'),
            Image::make('Фото(превью)', 'img')->creationRules('required'),
            BelongsTo::make('Категория теста', 'category', TestCategory::class)
                ->nullable(false),
            HasMany::make('Вопросы теста', 'questions', Question::class),
            HasMany::make('Возможные результаты теста', 'results', TestResult::class)
        ];
    }
}
